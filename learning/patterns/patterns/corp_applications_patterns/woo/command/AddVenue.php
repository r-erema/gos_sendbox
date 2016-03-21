<?php

namespace woo\command;

use woo\controller\Request;
use woo\domain\Venue;

/**
 * Class AddVenue
 * @package woo\command
 */
class AddVenue extends Command{

    /**
     * @param Request $request
     * @return mixed
     * @throws \woo\base\AppException
     */
    public function doExecute(Request $request) {
        $name = $request->getProperty('value_name');
        if ($name === null) {
            $request->addFeedback("Имя не задано");
            return self::statuses('CMD_INSUFFICIENT_DATA');
        } else {
            $venueObj = new Venue(null, $name);
            $request->setObject('venue', $venueObj);
            $request->addFeedback("'{$name}' добавлено в ({$venueObj->getId()})'");
            return self::statuses('CMD_OK');
        }
    }

}