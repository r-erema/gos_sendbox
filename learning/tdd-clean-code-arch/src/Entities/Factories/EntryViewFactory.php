<?php

namespace src\Entities\Factories;

use src\Entities\Entry;
use src\Entities\Views\EntryView;

interface EntryViewFactory {

    public function create(Entry $entry) : EntryView;

}