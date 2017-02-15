<?php

namespace src\Entities\Factories;

use src\Entities\Entry;
use src\Entities\Views\EntryView;
use src\Entities\Views\FakeEntryView;

class FakeEntryViewFactory implements EntryViewFactory {

    /**
     * @param Entry $entry
     * @return EntryView
     */
    public function create(Entry $entry): EntryView {
        $view = new FakeEntryView();
        $view->author = $entry->author;
        $view->text = $entry->text;
        return $view;
    }

}