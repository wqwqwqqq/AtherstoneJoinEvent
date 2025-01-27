<?php

namespace AtherstoneJoinEvent\Listeners;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\world\sound\NoteInstrument;
use pocketmine\world\sound\NoteSound;
use AtherstoneJoinEvent\Main;

class JoinListener implements Listener {
    
    public function __construct(private Main $plugin) {}

    public function onJoin(PlayerJoinEvent $event): void {
        $player = $event->getPlayer();
        $world = $player->getWorld();

        // Кастомный звук улучшения
        $sound = new NoteSound(
            NoteInstrument::BELL(),
            25, // Высота (F#5)
            1.5 // Усиленная громкость
        );

        // Эффект частиц (опционально)
        $world->addParticle($player->getPosition(), new \pocketmine\world\particle\FlameParticle());

        // Воспроизведение звука
        $player->broadcastSound($sound, [$player]);
        
        // Сообщение с форматом
        $player->sendTitle(
            "§l§6Добро пожаловать!",
            "§eНа сервер Atherstone",
            20, 60, 20
        );
    }
}