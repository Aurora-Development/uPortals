<?php

namespace RedCraftPE\uPortals;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use RedCraftPE\uPortals\Commands\Portal;

class Main extends PluginBase {
  
  private static $instance;
  
  private $eventListener;
  
  private $portal;
  
  public function onEnable(): void {
  
    self::$instance = $this;
  
    $this->eventListener = new PortalsListener($this);
    $this->portal = new Portal();
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
  public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
  
    return $this->portal->onPortalCommand($sender, $command, $label, $args);
  }
  public static function getInstance(): self {
  
    return self::$instance;
  }
}
