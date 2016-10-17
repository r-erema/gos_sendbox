<?php

namespace My\Full {

    class ClassName {

        public function __construct() {
            echo PHP_EOL . str_repeat('=', strlen(__FUNCTION__)) . PHP_EOL .
                'Class: ' . __CLASS__ . PHP_EOL .
                'Method: ' . __METHOD__ . PHP_EOL .
                'Namespace: ' . __NAMESPACE__ . PHP_EOL .
                str_repeat('=', strlen(__FUNCTION__)) . PHP_EOL;
        }

    }

    function functionName() {
        echo PHP_EOL . str_repeat('=', strlen(__FUNCTION__)) . PHP_EOL .
             'Function: ' . __FUNCTION__ . PHP_EOL .
             'Namespace: ' . __NAMESPACE__ . PHP_EOL .
             str_repeat('=', strlen(__FUNCTION__)) . PHP_EOL;
    }
    const CONSTANT = 87;
}

namespace My\Full\NSName {
    function func() {
        echo PHP_EOL . str_repeat('=', strlen(__FUNCTION__)) . PHP_EOL .
            'Function: ' . __FUNCTION__ . PHP_EOL .
            'Namespace: ' . __NAMESPACE__ . PHP_EOL .
            str_repeat('=', strlen(__FUNCTION__)) . PHP_EOL;
    }
}

namespace My\Full\NSName\SubNS {
    function func() {
        echo PHP_EOL . str_repeat('=', strlen(__FUNCTION__)) . PHP_EOL .
            'Function: ' . __FUNCTION__ . PHP_EOL .
            'Namespace: ' . __NAMESPACE__ . PHP_EOL .
            str_repeat('=', strlen(__FUNCTION__)) . PHP_EOL;
    }
}

namespace foo {
    use My\Full\ClassName as Another;
    use \My\Full\NSName as NS;
    use \My\Full\NSName;
    use function My\Full\functionName;
    use function My\Full\functionName as func;
    use const My\Full\CONSTANT;
    use ArrayObject;

    require_once __DIR__ . '/use_2.php';
    /*var_dump(new namespace\Another());
    var_dump(new Another());*/
    //var_dump(NS\SubNS\func());
    //var_dump(NSName\SubNS\func());
//    var_dump(new ArrayObject([1]));
    //functionName();
    func();
    var_dump(CONSTANT);
}