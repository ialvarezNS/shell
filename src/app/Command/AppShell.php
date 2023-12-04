<?php
namespace App\Command;

use App\Command\Command as CommandCommand;

class AppShell {
    public function run($commandName, array $arguments) {
        $command = $this->createCommand($commandName);
        
        if ($command !== null) {
            $command->execute($arguments);
        } else {
            echo "Comando no encontrado.";
        }
    }

    protected function createCommand($commandName): ? CommandCommand {
        $className = 'App\\Command\\' . ucfirst($commandName) . 'Command';

        if (class_exists($className)) {
            return new $className();
        }

        return null;
    }
} 