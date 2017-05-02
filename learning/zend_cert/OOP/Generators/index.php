<?php

/*function gen() {
    echo 'One';
    yield 'Two';
    echo 'Three';
    yield 'Four';
    echo 'Five';
}

$generator = gen();

foreach ($generator as $value) {
    echo $value;
}*/

/*function tableGenerator($data) {
    if (!is_object($data) && !is_array($data)) {
        return;
    }

    $i = 0;
    yield $i => '<table>' . PHP_EOL;
    $i++;

    foreach ($data as $values) {
        $return = '<tr>' . PHP_EOL;
        foreach ($values as $value) {
            $return .= "<td>{$value}</td>" . PHP_EOL;
        }
        $return .= '</tr>' . PHP_EOL;
        $i++;
        yield $i => $return;
    }
    $i++;
    yield $i => '</table>' . PHP_EOL;
}

$table = tableGenerator([
    ['One', 'Two', 'Three'],
    [1, 2, 3],
    ['I', 'II', 'III'],
    ['a', 'b', 'c']
]);

foreach ($table as $key => $row) {
    echo $row;
}*/

class DataModel {

    protected $data = [];

    public function __construct(array $data) {
        $this->data = $data;
    }


    public function &getIterator() {
        foreach ($this->data as $key => &$value) {
            yield $key => $value;
        }
    }

    public function getData(): array {
        return $this->data;
    }
}

$dm = new DataModel(['One', 'Two', 'Three']);

$gen = $dm->getIterator();
foreach ($gen as $key => &$value) {
    $value = strtoupper($value);
}
$gen->rewind();
foreach ($gen as $key => &$value) {
    $value = strtoupper($value);
}