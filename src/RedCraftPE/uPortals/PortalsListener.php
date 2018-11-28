<?php

namespace RedCraftPE\uPortals;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerMoveEvent;

class PortalsListener implements Listener {

  private $plugin;

  public function __construct($plugin) {
  
    $this->plugin = $plugin;
    
    $plugin->getServer()->getPluginManager()->registerEvents($this, $plugin);
  }
  public function onMove(PlayerMoveEvent $event) {
  
    $player = $event->getPlayer();
  }
}
