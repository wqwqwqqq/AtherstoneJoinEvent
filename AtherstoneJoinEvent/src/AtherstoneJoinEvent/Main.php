<?php

namespace AtherstoneJoinEvent;

use pocketmine\plugin\PluginBase;
use AtherstoneJoinEvent\Listeners\JoinListener;

class Main extends PluginBase {
    protected function onEnable(): void {
        $this->saveDefaultConfig();
        $this->registerEvents();
        $this->getLogger()->info("§aAtherstoneJoinEvent активирован!");
    }

    private function registerEvents(): void {
        $this->getServer()->getPluginManager()->registerEvents(
            new JoinListener($this), // Убедитесь, что класс подключён
            $this
        );
    }
}