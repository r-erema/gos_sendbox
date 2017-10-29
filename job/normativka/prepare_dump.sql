/*forums*/
UPDATE `fn_users` SET `user_login` = CONCAT('!#X-', `user_login`), `user_email` = CONCAT('!#X-', `user_email`)
WHERE
    (`user_login` NOT LIKE '%@profigroup.by' AND `user_login` NOT LIKE '%@corp.profigroup.by'
    AND `user_login` NOT LIKE '%@normativka.by' AND `user_login` != 'anonymous' AND LENGTH(user_login) < 40 AND `user_login` <> 'eratut@mail.ru'
);
SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE TABLE `fn_messages`;
TRUNCATE TABLE `fn_errors_log`;
TRUNCATE TABLE `fn_priv_messages`;
TRUNCATE TABLE `fn_news`;
TRUNCATE TABLE `fn_message_log`;
TRUNCATE TABLE `fn_topics`;
TRUNCATE TABLE `fn_notice`;
TRUNCATE TABLE `fn_search_queries`;
TRUNCATE TABLE `fn_users_place`;
TRUNCATE TABLE `fn_read_messages`;
TRUNCATE TABLE `fn_articles`;
TRUNCATE TABLE `fn_favorites`;
TRUNCATE TABLE `fn_massspam`;
TRUNCATE TABLE `fn_validate`;
TRUNCATE TABLE `fn_vote_users`;
TRUNCATE TABLE `fn_topics_rate`;
TRUNCATE TABLE `fn_smiles`;
TRUNCATE TABLE `fn_vote_q`;
TRUNCATE TABLE `fn_photogallery_tags`;
TRUNCATE TABLE `fn_vote_a`;
TRUNCATE TABLE `fn_bans`;
TRUNCATE TABLE `fn_uploaded_files_rubrics`;
TRUNCATE TABLE `fn_stats`;
TRUNCATE TABLE `fn_test_questions`;
TRUNCATE TABLE `fn_test_answers`;
TRUNCATE TABLE `fn_rand_texts`;
TRUNCATE TABLE `fn_countries`;
TRUNCATE TABLE `fn_tests`;
SET FOREIGN_KEY_CHECKS = 1;

/*normativka*/
UPDATE `fn_users` SET `user_login` = CONCAT('!#X-', `user_login`), `user_email` = CONCAT('!#X-', `user_email`)
WHERE
    (`user_login` NOT LIKE '%@profigroup.by' AND `user_login` NOT LIKE '%@corp.profigroup.by'
    AND `user_login` NOT LIKE '%@normativka.by' AND `user_login` != 'anonymous' AND LENGTH(user_login) < 40 AND `user_login` <> 'eratut@mail.ru'
);
SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE TABLE `nr_users_activity_statistics`;
TRUNCATE TABLE `nr_statistics`;
TRUNCATE TABLE `fn_user_pm`;
TRUNCATE TABLE `nr_auth_info`;
TRUNCATE TABLE `nr_qa_answers`;
TRUNCATE TABLE `nr_action_log`;
TRUNCATE TABLE `fn_users_place`;
TRUNCATE TABLE `nr_auth_sessions`;
TRUNCATE TABLE `fn_errors_log`;
TRUNCATE TABLE `nr_qa_questions`;
TRUNCATE TABLE `nr_support_tickets`;
TRUNCATE TABLE `nr_discount_codes`;
TRUNCATE TABLE `nr_package_doc_log`;
TRUNCATE TABLE `nr_tracking`;
TRUNCATE TABLE `nr_notify_msgs`;
TRUNCATE TABLE `fn_validate`;
TRUNCATE TABLE `nr_notify_status`;
TRUNCATE TABLE `fn_pass_retrives`;
TRUNCATE TABLE `nr_trial_users_phones`;
TRUNCATE TABLE `nr_trial_requests`;
TRUNCATE TABLE `nr_auth_autologin`;
TRUNCATE TABLE `nr_support_messages`;
TRUNCATE TABLE `nr_documents_files`;
TRUNCATE TABLE `nr_certificate_sessions`;
TRUNCATE TABLE `nr_documents_folders`;
TRUNCATE TABLE `nr_transactions`;
TRUNCATE TABLE `fn_bans`;
TRUNCATE TABLE `fn_search_queries`;
TRUNCATE TABLE `fn_rand_texts`;
TRUNCATE TABLE `fn_priv_messages`;
TRUNCATE TABLE `fn_massspam`;
TRUNCATE TABLE `fn_news`;
SET FOREIGN_KEY_CHECKS = 1;