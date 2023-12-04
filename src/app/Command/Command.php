<?php
namespace App\Command;

interface Command {
    public function execute(array $arguments);
}