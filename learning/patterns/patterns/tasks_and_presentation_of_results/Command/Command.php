<?php

namespace Command;

abstract class Command {
    abstract function execute(CommandContext $context);
}