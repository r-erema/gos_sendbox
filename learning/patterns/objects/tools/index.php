<?php
namespace firstns {
    class Test {
        public static function getNS() {
            return __NAMESPACE__;
        }
    }
}

namespace firstns\pod {
    class Test {
        public static function getNS() {
            return __NAMESPACE__;
        }
    }
}

namespace secondns\sub {
    class Test {
        public static function getNS() {
            return __NAMESPACE__;
        }
    }
}

namespace sub {
    class Test {
        public static function getNS() {
            return __NAMESPACE__;
        }
    }
}

namespace secondns {
    class Test {
        public static function getNS() {
            return __NAMESPACE__;
        }
    }
    echo sub\Test::getNS(); echo "<br>";
    echo \sub\Test::getNS();


}