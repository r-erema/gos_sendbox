<meta charset="utf-8">
<?php
$xml = file_get_contents('news.xml');
$xmlParser = xml_parser_create();
xml_parser_set_option($xmlParser, XML_OPTION_CASE_FOLDING, false);
xml_parser_set_option($xmlParser, XML_OPTION_SKIP_WHITE, false);

const TITLE = 'title';
const ITEM = 'item';

$html = '';
$watcher = [
    ITEM => [
        'handleNow' => false,
        'putContent' => false
    ],
    TITLE => [
        'handleNow' => false,
        'putContent' => true
    ]
];
$putContentNow = false;
xml_set_element_handler($xmlParser, function ($parser, $name, $attributes) use (&$html, &$watcher, &$putContentNow) {
    switch ($name) {
        case ITEM :
            $html .= '<div style="margin: 20px;">' . PHP_EOL;
            $watcher[ITEM]['handleNow'] = true;
            break;
        case TITLE :
            $html .= "\t<h3>";
            $watcher[TITLE]['handleNow'] = true;
            break;
    }
    $putContentNow = isset($watcher[$name]['putContent']) ? $watcher[$name]['putContent'] : false;
}, function ($parser, $name)  use (&$html, &$watcher) {
    if (isset($watcher[$name]['handleNow']) && $watcher[$name]['handleNow']) {
        switch ($name) {
            case ITEM :
                $html .= '</div>' . PHP_EOL;
                break;
            case TITLE :
                $html .= '</h3>' . PHP_EOL;
                break;
        }
        $watcher[$name]['handleNow'] = false;
    }
});

xml_set_character_data_handler($xmlParser, function ($parser, $data)  use (&$html, &$watcher, &$putContentNow) {
    if ($putContentNow) {
        $html .= trim($data);
    }
});

xml_parse($xmlParser, $xml);
echo $html;