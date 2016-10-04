<?php

$f = fopen('file', 'r');
while ($line = fgets($f)) {
    echo $line;
}

class FileIterator implements Iterator {
    protected $f;
    protected $data;
    protected $key;

    public function __construct($file) {
        $this->f = fopen($file, 'r');
        if (!$this->f) {
            throw new Exception();
        }
    }

    public function __destruct() {
        fclose($this->f);
    }

    public function current() {
        return $this->data;
    }

    public function key() {
        return $this->key;
    }

    public function next() {
        $this->data = fgets($this->f);
        $this->key++;
    }

    public function valid() {
        return false !== $this->data;
    }

    public function rewind() {
        fseek($this->f, 0);
        $this->data = fgets($this->f);
        $this->key = 0;
    }
}

echo '<br>';
$fi = new FileIterator('file');
$fi->next();
echo $fi->current();
echo $fi->current();
echo $fi->current();
$fi->next();
echo $fi->current();
$fi->next();
echo $fi->current();

function getLines($file) {
    $f = fopen($file, 'r');
    if (!$f) {
        throw new Exception();
    }
    while ($line = fgets($f)) {
        yield $line;
    }
    fclose($f);
}

echo '<br />';
foreach (getLines('file') as $line) {
    echo $line;
}

function doStuff() {
    $last = 0;
    $current = 1;
    yield 1;
    while (true) {
        $current = $last + $current;
        $last = $current - $last;
        yield $current;
    }
}

echo '<br />';
$j = 0;
foreach (doStuff() as $i) {
    if ($j === 11) {
        break;
    }
    echo $i.' ';
    $j++;
}

class ArrObject implements IteratorAggregate {

    /**
     * ArrayObject constructor.
     * @param array $array
     */
    public function __construct(array $array) {
        $this->array = $array;
    }

    /**
     * @return Generator
     */
    public function getIterator() {
        foreach ($this->array as $key => $value) {
            yield $key => $value;
        }
    }

}

$ao = new ArrObject(['a' => 7, 'j' => 125, 'h' => -3]);
echo '<br />';
foreach ($ao as $a) {
    echo $a;
}


function createLog($file) {
    $f = fopen($file, 'a');
    while (true) {
        $line = yield;
        fwrite($f, $line);
    }
}

$log = createLog('log');
$log->send('first');
$log->send('second');
$log->send('third');

function fetchBytesFromFile($file) {
    $length = yield;
    $f = fopen($file, 'r');
    while (!feof($f)) {
        $length = yield fread($f, $length);
    }
    yield false;
}
function processBytesInBatch(Generator $byteGenerator) {
    $buffer = '';
    $bytesNeeded = 1000;
    while ($buffer .= $byteGenerator->send($bytesNeeded)) {
        list($lengthOfRecord) = unpack('N', $buffer);
        if (strlen($buffer) < $lengthOfRecord) {
            $bytesNeeded = $lengthOfRecord - strlen($buffer);
        }
        yield substr($buffer, 1, $lengthOfRecord);
        $buffer = substr($buffer, 0, $lengthOfRecord + 1);
        $bytesNeeded = 1000 - strlen($buffer);
    }
}
$gen = processBytesInBatch(fetchBytesFromFile('file'));
foreach ($gen as $record) {
    echo $record;

}