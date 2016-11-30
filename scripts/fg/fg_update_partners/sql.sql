/*Страны*/
SELECT `type`,`contentType`,`pagetitle`,`longtitle`,`description`,`alias`,`link_attributes`,`published`,`pub_date`,
`unpub_date`,`parent`,`isfolder`,`introtext`,`content`,`richtext`,`template`,`menuindex`,`searchable`,`cacheable`,
`createdby`,`createdon`,`editedby`,`editedon`,`deleted`,`deletedby`,`publishedon`,`publishedby`,`menutitle`,`donthit`,
`privateweb`,`privatemgr`,`content_dispo`,`hidemenu`,`class_key`,`context_key`,`content_type`,`uri`,`uri_override`,
`hide_children_in_tree`,`show_in_tree`,`properties`
FROM `modx_site_content` WHERE `parent` = 1692
UNION
/*Города*/
SELECT `type`,`contentType`,`pagetitle`,`longtitle`,`description`,`alias`,`link_attributes`,`published`,`pub_date`,
`unpub_date`,`parent`,`isfolder`,`introtext`,`content`,`richtext`,`template`,`menuindex`,`searchable`,`cacheable`,
`createdby`,`createdon`,`editedby`,`editedon`,`deleted`,`deletedby`,`publishedon`,`publishedby`,`menutitle`,`donthit`,
`privateweb`,`privatemgr`,`content_dispo`,`hidemenu`,`class_key`,`context_key`,`content_type`,`uri`,`uri_override`,
`hide_children_in_tree`,`show_in_tree`,`properties`
FROM `modx_site_content` WHERE `id` IN (SELECT `id` FROM `modx_site_content` WHERE `parent` = 1692)
UNION
/*Партнёры по городам*/
SELECT `type`,`contentType`,`pagetitle`,`longtitle`,`description`,`alias`,`link_attributes`,`published`,`pub_date`,
`unpub_date`,`parent`,`isfolder`,`introtext`,`content`,`richtext`,`template`,`menuindex`,`searchable`,`cacheable`,
`createdby`,`createdon`,`editedby`,`editedon`,`deleted`,`deletedby`,`publishedon`,`publishedby`,`menutitle`,`donthit`,
`privateweb`,`privatemgr`,`content_dispo`,`hidemenu`,`class_key`,`context_key`,`content_type`,`uri`,`uri_override`,
`hide_children_in_tree`,`show_in_tree`,`properties`
FROM `modx_site_content` WHERE `id` IN (SELECT `id` FROM `modx_site_content` WHERE `parent` IN(SELECT `id` FROM `modx_site_content` WHERE `parent` = 1692))
