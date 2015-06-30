<?php  return array (
  'resourceClass' => 'modDocument',
  'resource' => 
  array (
    'id' => 1,
    'type' => 'document',
    'contentType' => 'text/html',
    'pagetitle' => 'Главная',
    'longtitle' => '',
    'description' => '',
    'alias' => 'index',
    'link_attributes' => '',
    'published' => 1,
    'pub_date' => 0,
    'unpub_date' => 0,
    'parent' => 0,
    'isfolder' => 0,
    'introtext' => '',
    'content' => '[[!include]]',
    'richtext' => 1,
    'template' => 1,
    'menuindex' => 0,
    'searchable' => 1,
    'cacheable' => 1,
    'createdby' => 1,
    'createdon' => 1435649764,
    'editedby' => 1,
    'editedon' => 1435665455,
    'deleted' => 0,
    'deletedon' => 0,
    'deletedby' => 0,
    'publishedon' => 0,
    'publishedby' => 0,
    'menutitle' => '',
    'donthit' => 0,
    'privateweb' => 0,
    'privatemgr' => 0,
    'content_dispo' => 0,
    'hidemenu' => 0,
    'class_key' => 'modDocument',
    'context_key' => 'web',
    'content_type' => 1,
    'uri' => '',
    'uri_override' => 0,
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'properties' => NULL,
    '_content' => '<html>
<head>
<title>MODX Revolution - Главная</title>
<base href="http://gutsout.web/learning/modx/site/" />
</head>
<body>
[[!include]]
</body>
</html>',
    '_isForward' => false,
  ),
  'contentType' => 
  array (
    'id' => 1,
    'name' => 'HTML',
    'description' => 'HTML content',
    'mime_type' => 'text/html',
    'file_extensions' => '.html',
    'headers' => NULL,
    'binary' => 0,
  ),
  'policyCache' => 
  array (
  ),
  'elementCache' => 
  array (
    '[[*pagetitle]]' => 'Главная',
  ),
  'sourceCache' => 
  array (
    'modChunk' => 
    array (
    ),
    'modSnippet' => 
    array (
      'include' => 
      array (
        'fields' => 
        array (
          'id' => 1,
          'source' => 0,
          'property_preprocess' => false,
          'name' => 'include',
          'description' => '',
          'editor_type' => 0,
          'category' => 0,
          'cache_type' => 0,
          'snippet' => '/**
 * @var $scriptProperties;
 */

$dood = $modx->getService(\'doodles\',\'Doodles\',$modx->getOption(\'doodles.core_path\',null,$modx->getOption(\'core_path\').\'components/doodles/\').\'model/doodles/\',$scriptProperties);
if (!($dood instanceof Doodles)) return \'\';

/* setup default properties */
$tpl = $modx->getOption(\'tpl\',$scriptProperties,\'rowTpl\');
$sort = $modx->getOption(\'sort\',$scriptProperties,\'name\');
$dir = $modx->getOption(\'dir\',$scriptProperties,\'ASC\');

$output = \'\';

$m = $modx->getManager();
$created = $m->createObjectContainer(\'Doodle\');
return $created ? \'Таблица создана.\' : \'Таблица не создана.\';

return $output;',
          'locked' => false,
          'properties' => 
          array (
          ),
          'moduleguid' => '',
          'static' => true,
          'static_file' => '[[++doodles.core_path]]/elements/snippets/snippet.doodles.php',
          'content' => '/**
 * @var $scriptProperties;
 */

$dood = $modx->getService(\'doodles\',\'Doodles\',$modx->getOption(\'doodles.core_path\',null,$modx->getOption(\'core_path\').\'components/doodles/\').\'model/doodles/\',$scriptProperties);
if (!($dood instanceof Doodles)) return \'\';

/* setup default properties */
$tpl = $modx->getOption(\'tpl\',$scriptProperties,\'rowTpl\');
$sort = $modx->getOption(\'sort\',$scriptProperties,\'name\');
$dir = $modx->getOption(\'dir\',$scriptProperties,\'ASC\');

$output = \'\';

$m = $modx->getManager();
$created = $m->createObjectContainer(\'Doodle\');
return $created ? \'Таблица создана.\' : \'Таблица не создана.\';

return $output;',
        ),
        'policies' => 
        array (
        ),
        'source' => 
        array (
        ),
      ),
    ),
    'modTemplateVar' => 
    array (
    ),
  ),
);