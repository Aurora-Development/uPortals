<?php

namespace RedCraftPE\uPortals;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\event\player\PlayerInteractEvent;

class PortalsListener implements Listener {

  private $plugin;

  public function __construct($plugin) {
  
    $this->plugin = $plugin;
    
    $plugin->getServer()->getPluginManager()->registerEvents($this, $plugin);
  }
  public function onMove(PlayerMoveEvent $event) {
  
    $player = $event->getPlayer();
  }
  public function onInteract(PlayerInteractEvent $event) {
    
    $plugin = $this->plugin;
    $player = $event->getPlayer();
    $item = $event->getItem();
    $action = $event->getAction();
    $block = $event->getBlock();
    $blockX = $block->getX();
    $blockY = $block->getY();
    $blockZ = $block->getZ();
    $portalsArray = $plugin->portals->get("Portals", []);
    
    if ($item->getName() === TextFormat::BLUE . "Portal Wand") {
      
      if ($action === 1) {
      
        $portalsArray["pos1"] = $blockX . ", " . $blockY . ", " . $blockZ;
        $plugin->portals->set("Portals", $portalsArray);
        $plugin->portals->save();
        $player->sendMessage(TextFormat::GREEN . "Portal position 1 is now {$blockX}, {$blockY}, {$blockZ}");
      } else {
      
        $portalsArray["pos2"] = $blockX . ", " . $blockY . ", " . $blockZ;
        $plugin->portals->set("Portals", $portalsArray);
        $plugin->portals->save();
        $player->sendMessage(TextFormat::GREEN . "Portal position 1 is now {$blockX}, {$blockY}, {$blockZ}");
      }
    }
  }
}
