<?php

namespace RedCraftPE\uPortals;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;

class Main extends PluginBase {
  
  private static $instance;
  
  private static $eventListener;
  
  public function onEnable(): void {
  
    self::$instance = $this;
  
    $this->eventListener = new PortalsListener($this);
  }
  public function onLoad(): void {
  
    if (!is_dir($this->getDataFolder())) {

      @mkdir($this->getDataFolder());
    }
    if (!file_exists($this->getDataFolder() . "portals.yml")) {

      $this->saveResource("portals.yml");
      $this->portals = new Config($this->getDataFolder() . "portals.yml", Config::YAML);
    } else {

      $this->portals = new Config($this->getDataFolder() . "portals.yml", Config::YAML);
    }
    $this->portals->reload();
  }
  public static function getInstance(): self {
  
    return self::$instance;
  }
}
