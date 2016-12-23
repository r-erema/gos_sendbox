<?php

	$config = require __DIR__ . '/../../config.php';
	/** @var PDO $pdo */
	//$pdo = require __DIR__ . '/../../db.php';

    $dumps = [
        '/home/gutsout/h/sandbox/scripts/normativka/tests/report/data/orders_21.sql',
        '/home/gutsout/h/sandbox/scripts/normativka/tests/report/data/orders_22.sql',
        '/home/gutsout/h/sandbox/scripts/normativka/tests/report/data/orders_23.sql',
        '/home/gutsout/h/sandbox/scripts/normativka/tests/report/data/orders_24.sql',
        '/home/gutsout/h/sandbox/scripts/normativka/tests/report/data/orders_25.sql',
        '/home/gutsout/h/sandbox/scripts/normativka/tests/report/data/orders_26.sql',
        '/home/gutsout/h/sandbox/scripts/normativka/tests/report/data/orders_27.sql'
    ];

    $start = 21;
	try {
	    foreach ($dumps as $sqlDumpFile) {
        //foreach (new DirectoryIterator(__DIR__ . '/data') as $fileInfo) {
            //if (!$fileInfo->isDot()) {
                //$sqlDumpFile = $fileInfo->getPathname();
                //$shellCommand = "timedatectl set-time \"2016-12-02 15:30:00\"";
                //echo shell_exec($shellCommand);
                //$shellCommand = "mysqladmin -u{$config['db']['user']} -p{$config['db']['password']} drop {$config['db']['db_name']} -f";
                //echo shell_exec($shellCommand);
                //$shellCommand = "echo \"create database {$config['db']['db_name']}\" | mysql -u{$config['db']['user']} -p{$config['db']['password']}";
//                echo shell_exec($shellCommand);
                $shellCommand = "timedatectl set-time \"2016-11-{$start} 01:00:00\"";
                echo shell_exec($shellCommand);
                echo "Start: {$sqlDumpFile} " . date ('Y-m-d H:i:s') . PHP_EOL;
                $shellCommand = "mysql -u{$config['db']['user']} -p{$config['db']['password']} {$config['db']['db_name']} < {$sqlDumpFile}";
                echo shell_exec($shellCommand);
                echo "Finished:" . date ('Y-m-d H:i:s') . PHP_EOL;
                $shellCommands = require __DIR__ . '/../../normativka-cli-init.php';
                $shellCommands .= "{$config['php']} {$config['normativka_portal_path']}/cli.php http://\${DOMAIN_NORMATIVKA}/services/track/ --cwd=\${PORTAL_ROOT_PATH}" . PHP_EOL;
                echo shell_exec($shellCommands);
                $shellCommands = require __DIR__ . '/../../normativka-cli-init.php';
                $shellCommands .= "{$config['php']} {$config['normativka_portal_path']}/cli.php http://\${DOMAIN_NORMATIVKA}/services/daily-summary/ --cwd=\${PORTAL_ROOT_PATH}" . PHP_EOL;
                echo shell_exec($shellCommands);
                //$shellCommand = "timedatectl set-time \"2016-12-02 16:00:00\"";
                //echo shell_exec($shellCommand);
                $start++;
            //}

        }
    } catch (Exception $e) {
	    $e = $e;
    }
    $r =1 ;

