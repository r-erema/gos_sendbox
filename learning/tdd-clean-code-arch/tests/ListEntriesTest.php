<?php

use \PHPUnit\Framework\TestCase;

use src\Entities\Repositories\FakeEntryRepository;
use \src\Entities\Factories\FakeEntryViewFactory;
use \src\Entities\Entry;
use \src\Entities\UseCases\ViewEntriesUseCase;
use src\Entities\Requests\FakeViewEntriesRequest;
use src\Entities\Responses\FakeViewEntriesResponse;

class ListEntriesTest extends TestCase {

    public function testEntriesNotExists() {
        $entries = [];
        $response = $this->processUseCase($entries);
        $this->assertEmpty($response->entries);
        /*$entryRepository = new FakeEntryRepository();
        $entryViewFactory = new FakeEntryViewFactory();
        $request = new FakeViewEntriesRequest();
        $response = new FakeViewEntriesResponse();
        $useCase = new ViewEntriesUseCase($entryRepository, $entryViewFactory);
        $useCase->process($request, $response);
        $this->assertEmpty($response->entries);*/
    }

    public function testCanSeeEntries() {
        $entries = [
            new Entry('testAuthor','test text')
        ];
        $response = $this->processUseCase($entries);
        $this->assertNotEmpty($response->entries);
        /*$entries = [];
        $entries[] = new Entry();
        $entryRepository = new FakeEntryRepository($entries);
        $entryViewFactory = new FakeEntryViewFactory();
        $request = new FakeViewEntriesRequest();
        $response = new FakeViewEntriesResponse();
        $useCase = new ViewEntriesUseCase($entryRepository, $entryViewFactory);
        $useCase->process($request, $response);
        $this->assertNotEmpty($response->entries);*/
    }

    /**
     * @param array $entities
     * @return FakeViewEntriesResponse
     */
    private function processUseCase(array $entities) {
        $entryRepository = new FakeEntryRepository($entities);
        $entryViewFactory = new FakeEntryViewFactory();
        $request = new FakeViewEntriesRequest();
        $response = new FakeViewEntriesResponse();
        $useCase = new ViewEntriesUseCase($entryRepository, $entryViewFactory);
        $useCase->process($request, $response);
        return $response;
    }
}