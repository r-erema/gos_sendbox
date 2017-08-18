SELECT
  uas_user_login AS Логин,
  uas_order_number AS `Номер заказа`,
  uas_action_type AS `Тип запроса`,
  uas_action_time AS `Время запроса`,
  uas_res_title AS `Название документа или поисковый запрос`
FROM nr_users_activity_statistics
WHERE uas_order_id = 25046