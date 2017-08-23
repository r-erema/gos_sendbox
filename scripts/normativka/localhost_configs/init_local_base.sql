UPDATE `fn_users` SET `user_login` = CONCAT('!#X-', `user_login`), `user_email` = CONCAT('!#X-', `user_email`)
WHERE
    (`user_login` NOT LIKE '%@profigroup.by' AND `user_login` NOT LIKE '%@corp.profigroup.by'
    AND `user_login` NOT LIKE '%@normativka.by' AND `user_login` != 'anonymous' AND LENGTH(user_login) < 40 AND `user_login` <> 'eratut@mail.ru'
);

INSERT INTO `fn_users_groups` (`ug_id`, `ug_user_id`, `ug_group_id`) VALUES (NULL, '68129', '6'), (NULL, '68129', '8'), (NULL, '68129', '9'), (NULL, '68129', '10'), (NULL, '68129', '11');
INSERT INTO `fn_users_groups` (`ug_id`, `ug_user_id`, `ug_group_id`) VALUES
  (NULL, '175315', '3'),
  (NULL, '175315', '4'),
  (NULL, '175315', '5'),
  (NULL, '175315', '6'),
  (NULL, '175315', '7'),
  (NULL, '175315', '8'),
  (NULL, '175315', '9'),
  (NULL, '175315', '10'),
  (NULL, '175315', '11');


DELIMITER $$
CREATE FUNCTION fn_get_invoice_actually_paid_date(`inv_id` INT)
            RETURNS DATE
            LANGUAGE SQL
            BEGIN
                DECLARE paidDate DATE;
                DECLARE invoiceEndDate DATE;
                SET @precision = (SELECT IF(NOW() < '2016-07-01', 0, 2)); /* Окгругляем по разному в зависимости от старых и новых тем(деноминация) */
                SET @allDaysInclusively = (SELECT DATEDIFF(invoice_term_end, invoice_term_begin) + 1 FROM nr_invoices  WHERE invoice_id = inv_id);
                SET @sumOfDay = (SELECT ROUND(invoice_price / @allDaysInclusively, @`precision`) FROM nr_invoices  WHERE invoice_id = inv_id);
                SELECT
                  DATE_ADD(invoice_term_begin, INTERVAL CEIL(SUM(payment_value) / @sumOfDay) DAY), invoice_term_end
                INTO paidDate, invoiceEndDate
                FROM nr_invoices
                LEFT JOIN nr_payments ON payment_invoice_id = invoice_id
                WHERE invoice_id = inv_id;
              IF paidDate > invoiceEndDate THEN SET paidDate = invoiceEndDate; END IF;
              RETURN paidDate;
            END$$
DELIMITER ;

DELIMITER $$
CREATE FUNCTION fn_get_invoice_payments_receivables(`inv_id` INT)
            RETURNS DECIMAL(16,2)
            LANGUAGE SQL
            BEGIN
                DECLARE receivables DECIMAL(16,2);
                SELECT
                  invoice_price - IFNULL(SUM(payment_value), 0)
                INTO receivables
                FROM nr_invoices
                LEFT JOIN nr_payments ON payment_invoice_id = invoice_id
                WHERE invoice_id = inv_id
                GROUP BY invoice_id;
              IF receivables < 0 THEN SET receivables = 0; END IF;
              RETURN receivables;
            END$$
DELIMITER ;
DROP FUNCTION fn_get_invoice_actually_paid_date;
DROP FUNCTION fn_get_invoice_payments_receivables;