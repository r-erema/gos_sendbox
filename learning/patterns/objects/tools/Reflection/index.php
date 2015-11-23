<?php
require_once '../../basics/Chargeable.php';
require_once '../../basics/ShopProduct.php';
require_once '../../basics/CDProduct.php';
require_once 'ReflectionUtil.php';
$prod_class = new ReflectionClass('CDProduct');
/*echo '<pre>';
Reflection::export($prod_class);
echo '</pre>';*/

function classData(ReflectionClass $class) {
    $details = "";
    $name = $class->getName();
    if($class->isUserDefined()) {
        $details .= "$name -- klass opredelen polzovatelem\n";
    }
    if($class->isInternal()) {
        $details .= "$name -- vstroeniy klass\n";
    }
    if($class->isInterface()) {
        $details .= "$name -- eto interfeis\n";
    }
    if($class->isAbstract()) {
        $details .= "$name -- eto abstr. klass\n";
    }
    if($class->isFinal()) {
        $details .= "$name -- eto finalniy klass\n";
    }
    if($class->isInstantiable()) {
        $details .= "$name -- mogno sozdat' ekzemplyar klassa\n";
    } else {
        $details .= "$name -- nelzya sozdat' ekzemplyar klassa\n";
    }
    return $details;
}
//echo classData($prod_class);
var_dump($prod_class->getMethod('getPlayLength'));
echo '<pre>';

print \learning\patterns\objects\tools\Reflection\ReflectionUtil::getClassSource($prod_class);
echo '</pre>';