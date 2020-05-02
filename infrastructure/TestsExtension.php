<?php

declare(strict_types=1);

namespace infrastructure;

use PHPUnit\Runner\BeforeTestHook;

class TestsExtension implements BeforeTestHook
{
    public function executeBeforeTest(string $test): void
    {
        if (self::isProjectManagerTests($test)) {
            require './other/ProjectManager/config/bootstrap.php';
        }
    }

    private static function isProjectManagerTests(string $test): bool
    {
        $part = explode('\\', $test)[1] ?? null;
        return $part === 'ProjectManager';
    }

}
