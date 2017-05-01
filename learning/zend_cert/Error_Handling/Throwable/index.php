<?php

class MyThrowable extends Error {}

try {
    throw new MyThrowable('MyThrowable');
} catch (MyThrowable $e) {
    echo $e->getMessage();
}
