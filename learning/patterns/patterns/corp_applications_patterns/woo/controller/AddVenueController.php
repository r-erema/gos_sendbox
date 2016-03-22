<?php

namespace woo\controller;

use woo\domain\Venue;

class AddVenueController extends PageController {

    public function process() {
        try {
            $request = $this->getRequest();
            $name = $request->getProperty('venue_name');
            if ($request->getProperty('submitted') === null) {
                $request->addFeedback('Выберите имя заведения');
                $this->forward('add_venue.php');
            } elseif ($name === null) {
                $request->addFeedback('Имя должно быть обяательно задано');
                $this->forward('add_venue.php');
            }
            $venue = new Venue(null, $name);
            $this->forward('ListVenues.php');
        } catch (\Exception $e) {
            $this->forward('error.php');
        }
    }

}