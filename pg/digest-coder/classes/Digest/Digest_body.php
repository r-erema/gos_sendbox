<?php
/**
 * Created by PhpStorm.
 * User: R.Yaroma
 * Date: 25.04.14
 * Time: 11:43
 */

require_once "patterns.php";
require_once "photos.php";
require_once "classes/Parser/Parser.php";
require_once "smarty/libs/Smarty.class.php";

class Digest_body {

    public $data;
    public $parser;
    public $text;
    public $smarty;
    public $authors_photos;

    public $blocks_patterns;
    public $analytics_arts_portals_patterns;
    public $analytics_arts_patterns;
    public $reg_info_portals_patterns;
    public $reg_info_arts_patterns;
    public $ann_analytics_portals_pattern;
    public $videoch_pattern;

    public function __construct($text){
        global $blocks;
        global $photos;
        global $analytics_arts_portals;
        global $analytics_arts;
        global $reg_info_portals;
        global $reg_info_arts;
        global $ann_analytics_portals;
        global $videochannel;

        $this->authors_photos = $photos;
        $this->blocks_patterns = $blocks;
        $this->analytics_arts_portals_patterns = $analytics_arts_portals;
        $this->analytics_arts_patterns = $analytics_arts;
        $this->reg_info_portals_patterns = $reg_info_portals;
        $this->ann_analytics_portals_pattern = $ann_analytics_portals;
        $this->reg_info_arts_patterns = $reg_info_arts;
        $this->videoch_pattern = $videochannel;

        $this->text = $text;

        $this->parser = new Parser($this->text);

        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir('templates/');
        $this->smarty->setCompileDir('compiled_templates/');
        $this->smarty->caching = Smarty::CACHING_OFF;
        $this->smarty->force_compile;
        $this->smarty->debugging = false;

        try{
            $this->generateBlocks();

            $this->generateAnalyticsArtsPortals();
            $this->generateAnalyticsArtsArts();
            $this->splitAnalyticsArtsArts();

            $this->generateRegInfoPortals();
            $this->generateRegInfoArts();
            $this->splitRegInfoArts();

            $this->generateAnnAnalyticsPortals();
            $this->generateAnnAnalyticsArts();
            $this->splitAnnAnalyticsArts();

        //    $this->generateVideochannel();

            $this->assign();
        }catch(Exception $e){
            print_r($e->getMessage());
        }
    }

    public function generateBlocks(){
        $this->parser->parseText($this->text, $this->blocks_patterns);
        $this->data = $this->parser->getParsedText();
    }

    public function generateAnalyticsArtsPortals(){
        if(!isset($this->data['analytics_arts']))
            throw new Exception('Блок "Анонс аналитических материалов" не существует');
        $this->parser->parseText($this->data['analytics_arts'][1], $this->analytics_arts_portals_patterns);
        $this->data['analytics_arts'] = $this->parser->getParsedText();
    }

    public function generateRegInfoPortals(){
        if(!isset($this->data['reg_info']))
            throw new Exception('Блок "Нормативно-правовая информация" не существует');
        $this->parser->parseText($this->data['reg_info'][0], $this->reg_info_portals_patterns);
        $this->data['reg_info'] = $this->parser->getParsedText();
    }

    public function generateAnnAnalyticsPortals(){
        if(!isset($this->data['ann_analytics']))
            throw new Exception('Блок "Анонс аналитических материалов" не существует');
        $this->parser->parseText($this->data['ann_analytics'][1], $this->ann_analytics_portals_pattern);
        $this->data['ann_analytics'] = $this->parser->getParsedText();
    }

    public function generateAnalyticsArtsArts(){
        if(!isset($this->data['analytics_arts']))
            throw new Exception('Блок "Анонс аналитических материалов" не существует');
        foreach($this->data['analytics_arts'] as $portal_name => $portal){
            $portal[2] = trim($portal[2]);
            $this->parser->parseText($portal[2], $this->analytics_arts_patterns, true);
            $this->data['analytics_arts'][$portal_name] = $this->parser->getParsedText();
            $this->data['analytics_arts'][$portal_name]['arts'] = $this->data['analytics_arts'][$portal_name]['arts'][0];
        }
    }

    public function generateAnnAnalyticsArts(){
            if(!isset($this->data['ann_analytics']))
                throw new Exception('Блок "Анонс аналитических материалов" не существует');
            foreach($this->data['ann_analytics'] as $portal_name => $portal){
                $portal[2] = trim($portal[2]);
                $this->parser->parseText($portal[2], $this->analytics_arts_patterns, true);
                $this->data['ann_analytics'][$portal_name] = $this->parser->getParsedText();
                $this->data['ann_analytics'][$portal_name]['arts'] = $this->data['ann_analytics'][$portal_name]['arts'][0];
        }
    }

    public function generateRegInfoArts(){
        if(!isset($this->data['reg_info']))
            throw new Exception('Блок "Нормативно-правовая информация" не существует');
        foreach($this->data['reg_info'] as $portal_name => $portal){
            $portal[2] = trim($portal[2]);
            $this->parser->splitText($this->reg_info_arts_patterns['arts'], $portal[2], true);

            $this->data['reg_info'][$portal_name] = $this->parser->getParsedText();
            $this->data['reg_info'][$portal_name]['arts'] = array_chunk($this->data['reg_info'][$portal_name], 3);
            foreach($this->data['reg_info'][$portal_name] as $item_key => $item){
                if(is_numeric($item_key)) {
                    unset($this->data['reg_info'][$portal_name][$item_key]);
                }
            }
        }
    }

    public function splitAnalyticsArtsArts(){
        if(!isset($this->data['analytics_arts']))
            throw new Exception('Блок "Аналитический материал" не существует');
        foreach($this->data['analytics_arts'] as $portal_name => $portal){
            foreach($portal['arts'] as $id => $art){
                $this->parser->splitText("\r\n", $art);
                $this->parser->deleteFromParsedText('');
                $this->parser->renameParsedTextItem(0, 'author');
                $this->parser->renameParsedTextItem(1, 'link');
                $this->parser->renameParsedTextItem(2, 'title');
                $this->data['analytics_arts'][$portal_name]['arts'][$id] = $this->parser->getParsedText();
                $this->data['analytics_arts'][$portal_name]['arts'][$id]['photo'] = $this->getAuthorFoto($this->data['analytics_arts'][$portal_name]['arts'][$id]['author']);
                foreach($this->data['analytics_arts'][$portal_name]['arts'][$id] as $item_key => $item){
                    if(is_numeric($item_key)) {
                        $this->data['analytics_arts'][$portal_name]['arts'][$id]['paragraphs'][$item_key] = $item;
                        unset($this->data['analytics_arts'][$portal_name]['arts'][$id][$item_key]);
                    }
                }
            }
        }
    }

    public function splitAnnAnalyticsArts(){
        if(!isset($this->data['ann_analytics']))
            throw new Exception('Блок "Анонс аналитических материалов" не существует');
        foreach($this->data['ann_analytics'] as $portal_name => $portal){
            foreach($portal['arts'] as $id => $art){
                $this->parser->splitText("\r\n", $art);
                $this->parser->deleteFromParsedText('');
                $this->parser->renameParsedTextItem(0, 'author');
                $this->parser->renameParsedTextItem(1, 'link');
                $this->parser->renameParsedTextItem(2, 'title');
                $this->data['ann_analytics'][$portal_name]['arts'][$id] = $this->parser->getParsedText();
                $this->data['ann_analytics'][$portal_name]['arts'][$id]['photo'] = $this->getAuthorFoto($this->data['ann_analytics'][$portal_name]['arts'][$id]['author']);
                foreach($this->data['ann_analytics'][$portal_name]['arts'][$id] as $item_key => $item){
                    if(is_numeric($item_key)) {
                        $this->data['ann_analytics'][$portal_name]['arts'][$id]['paragraphs'][$item_key] = $item;
                        unset($this->data['ann_analytics'][$portal_name]['arts'][$id][$item_key]);
                    }
                }
            }
        }
    }

    public function isMarkedParagraph($paragraph){
        if(preg_match('#[●•](?:\t| ).+\s#u', $paragraph))
            return true;
        return false;
    }

    public function splitRegInfoArts(){
        if(!isset($this->data['reg_info']))
            throw new Exception('Блок "Нормативно-правовая информация" не существует');
        foreach($this->data['reg_info'] as $portal_name => $portal){
            foreach($portal['arts'] as $id => $art){
                $this->data['reg_info'][$portal_name]['arts'][$id]['title'] = $this->data['reg_info'][$portal_name]['arts'][$id][0];
                unset($this->data['reg_info'][$portal_name]['arts'][$id][0]);
                $this->data['reg_info'][$portal_name]['arts'][$id]['link'] = $this->data['reg_info'][$portal_name]['arts'][$id][1];
                unset($this->data['reg_info'][$portal_name]['arts'][$id][1]);
                $this->parser->splitText("\r\n", $art[2]);
                $this->parser->deleteFromParsedText('');
                $this->data['reg_info'][$portal_name]['arts'][$id]['paragraphs'] = $this->parser->getParsedText();
                foreach( $this->data['reg_info'][$portal_name]['arts'][$id]['paragraphs'] as $key => $paragraph){
                    if($this->isMarkedParagraph($paragraph)){
                        $this->data['reg_info'][$portal_name]['arts'][$id]['paragraphs']['marked'][] = preg_replace('#[●•](?:\t| )(.+)#u', '$1', $paragraph);
                        unset($this->data['reg_info'][$portal_name]['arts'][$id]['paragraphs'][$key]);
                    }
                }
            }
        }
    }

    public function generateVideochannel() {
        if(!isset($this->data['videochannel']))
            throw new Exception('Блок "Видеоканал" не существует');
        $this->parser->parseText($this->data['videochannel'][1], $this->videoch_pattern);
        $this->data['videochannel'] = $this->parser->getParsedText();
    }

    public function renameArtItem($old_name,$new_name){
        foreach($this->parsed_text as $key => $item)
            if($key == $old_name) {
                $this->parsed_text[$new_name] = $this->parsed_text[$old_name];
                unset($this->parsed_text[$old_name]);
            }
    }

    public function getAuthorFoto($author_name){
        foreach($this->authors_photos as $author => $photo)
            if($author == trim($author_name))
                return $photo;
        print_r("Нет связи между именем автора $author_name и фото<br>\n");
        return 'no-photo.jpg';
    }

    public function assign(){
        $this->smarty->assign('data', $this->data);
    }
}