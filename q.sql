SELECT `nr_orders`.*,
  count(DISTINCT nr_codes.code_id) AS `codes_count`,
  min(nr_codes.code_activation_time) AS `min_activation_time`,
  min(nr_codes.code_deactivation_time) AS `min_deactivation_time`,
  min(nr_codes.code_activated_user_id) AS `min_activated_user_id`,
  /*min(if(nr_invoices.invoice_payment_id IS NULL,0,1)) AS `is_payed`,*/
  `actions`.`actions_count`,
  `actions`.`library:search`,
  `actions`.`library:document:open`,
  IFNULL(`currentWeek`.`currentWeek`, 0) AS `currentWeek`,
  IFNULL(`currentMonth`.`currentMonth`, 0) AS `currentMonth`,
  IFNULL(`allTimes`.`allTime`, 0) AS `allTime`
FROM `nr_orders`
  LEFT JOIN `nr_codes` ON nr_codes.code_order_id = nr_orders.order_id
  /*LEFT JOIN `nr_invoices` ON nr_invoices.invoice_order_id = nr_orders.order_id*/
  LEFT JOIN
  (SELECT count(*) AS `actions_count`,
          sum(al_action = 'library:search') AS `library:search`,
          sum(al_action = 'library:document:open') AS `library:document:open`,
     `nr_action_log`.`al_order_id`,
     `nr_action_log`.`al_date`
   FROM `nr_action_log`
   WHERE (al_action IN ('library:search',
                        'library:document:open'))
   GROUP BY `al_order_id`) AS `actions` ON nr_orders.order_id = actions.al_order_id
  LEFT JOIN
  (SELECT al_order_id, COUNT(DATE_FORMAT(al_date, '%Y-%m-%d')) AS `currentWeek`
   FROM `nr_action_log`
   WHERE (al_action IN ('library:search',
                        'library:document:open'))
         AND (al_date >= '2016-01-04 00:00:00')
         AND (al_date <= '2016-01-10 23:59:59')
   GROUP BY `al_order_id`) AS `currentWeek` ON nr_orders.order_id = currentWeek.al_order_id
  LEFT JOIN
  (SELECT al_order_id, COUNT(DATE_FORMAT(al_date, '%Y-%m-%d')) AS `currentMonth`
   FROM `nr_action_log`
   WHERE (al_action IN ('library:search',
                        'library:document:open'))
         AND (al_date >= '2016-01-01 00:00:00')
         AND (al_date <= '2016-01-31 23:59:59')
   GROUP BY `al_order_id`) AS `currentMonth` ON nr_orders.order_id = currentMonth.al_order_id
  LEFT JOIN
  (SELECT al_order_id, al_date, COUNT(DATE_FORMAT(al_date, '%Y-%m-%d')) AS `allTime`
   FROM `nr_action_log`
   WHERE (al_action IN ('library:search',
                        'library:document:open')
     AND al_date >= (SELECT min(nr_codes.code_activation_time) FROM nr_codes WHERE nr_codes.code_order_id = al_order_id)
   )
   GROUP BY `al_order_id`) AS `allTimes` ON nr_orders.order_id = allTimes.al_order_id
GROUP BY `nr_orders`.`order_id`
HAVING (actions_count > 0) LIMIT 20