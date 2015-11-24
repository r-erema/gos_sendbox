<?php

class Runner {

    public static function init() {
        try {
            $conf = new Conf(dirname(__FILE__) . "/conf01.xml");
            print "user: {$conf->get('user')}\n";
            print "host: {$conf->get('host')}\n";
            $conf->set('pass', 'newpass22');
            $conf->write();
        } catch (FileException $e) {
            echo $e->getMessage();
        } catch (XmlException $e) {
        } catch (ConfException $e) {
        } catch (Exception $e) {
        }
    }
}