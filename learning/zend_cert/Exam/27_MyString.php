<?php
namespace MyFramework\String;
function strlen($str) {
    return \strlen($str) * 2; // return double the string length
}
print strlen("Hello world!");
