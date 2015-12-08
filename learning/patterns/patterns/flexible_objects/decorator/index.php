<?php

spl_autoload_register(function ($class) {
    require_once "classes/$class.php";
});

$tile = new Plains();
print $tile->getWealthFactor();

$tile = new DiamondDecorator(new Plains());
print $tile->getWealthFactor();

$tile = new PollutionDecorator(new DiamondDecorator(new Plains()));
print $tile->getWealthFactor();

echo '---------------------------------------------' . PHP_EOL;

$process = new AuthenticateRequest(
    new StructureRequest(
        new LogRequest(
            new MainProcess()
        )
    )
);

$process->process(new RequestHelper());