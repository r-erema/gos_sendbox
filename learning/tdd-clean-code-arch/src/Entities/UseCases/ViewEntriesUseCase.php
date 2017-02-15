<?php

namespace src\Entities\UseCases;

use src\Entities\Factories\EntryViewFactory;
use src\Entities\Repositories\EntryRepository;
use src\Entities\Requests\ViewEntriesRequest;
use src\Entities\Responses\ViewEntriesResponse;

class ViewEntriesUseCase {

    /**
     * @var EntryRepository
     */
    private $entryRepository;

    /**
     * @var EntryViewFactory
     */
    private $entryViewFactory;

    /**
     * ViewEntriesUseCase constructor.
     * @param EntryRepository $entryRepository
     * @param EntryViewFactory $entryViewFactory
     */
    public function __construct(EntryRepository $entryRepository, EntryViewFactory $entryViewFactory) {
        $this->entryRepository = $entryRepository;
        $this->entryViewFactory = $entryViewFactory;
    }

    public function process(ViewEntriesRequest $request, ViewEntriesResponse $response) {

        $entries = $this->entryRepository->findAllPaginated($request->getOffset(), $request->getLimit());

        if (!$entries) {
            return;
        }

        foreach ($entries as $entry) {
            $entryView = $this->entryViewFactory->create($entry);
            $response->addEntry($entryView);
        }

    }

}