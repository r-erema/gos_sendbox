<?php

namespace Registry;

class Request {
    private $url;
    /**
     * Request constructor.
     * @param $url
     */
    public function __construct($url) {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getUrl() {
        return $this->url;
    }
}