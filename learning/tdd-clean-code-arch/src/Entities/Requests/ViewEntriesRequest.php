<?php

namespace src\Entities\Requests;

class ViewEntriesRequest {

    public function getOffset() {
        return 0;
    }

    public function getLimit() {
        return 5;
    }

}