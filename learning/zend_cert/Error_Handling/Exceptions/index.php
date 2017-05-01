<?php

namespace Exceptions {
    class MyException extends \Exception {}
    class MyException2 extends \Exception {}
}

namespace MyNS {

    use Exceptions\MyException;
    use Exceptions\MyException2;

    set_exception_handler(function ($e) {echo $e->getMessage() . PHP_EOL; echo 'set_exception_handler worked' . PHP_EOL;});
    $exceptionNumber = 3;//mt_rand(1,2);
    try {
        if ($exceptionNumber == 1) {
            throw new MyException('Exc1');
        } elseif ($exceptionNumber == 2) {
            throw new MyException2('Exc2');
        }
    } catch (MyException2 $e) {
        echo '\Exception2';
    } catch (MyException $e) {
        echo '\Exception1';
    } finally {
        $exceptionNumber = null;
        var_dump($exceptionNumber);
    }
}