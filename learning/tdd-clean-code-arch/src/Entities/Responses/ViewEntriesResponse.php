<?php

namespace src\Entities\Responses;

use src\Entities\Entry;
use src\Entities\Views\EntryView;

class ViewEntriesResponse {

    /**
     * @var Entry[]
     */
    public $entries;

    public function addEntry(EntryView $entryView) {
        $this->entries[] = $entryView;
    }
}