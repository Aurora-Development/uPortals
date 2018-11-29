<?php

namespace RedCraftPE\uPortals\Commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat;

use RedCraftPE\uPortals\Main;
use RedCraftPE\Commands\SubCommands\Wand;
use RedCraftPE\Commands\SubCommands\Help;
use RedCraftPE\Commands\SubCommands\Pos1;
use RedCraftPE\Commands\SubCommands\Pos2;
use RedCraftPE\Commands\SubCommands\Edit;
use RedCraftPE\Commands\SubCommands\Set;

class Portal {
  
  private $wand;
  private $help;
  private $pos1;
  private $pos2;
  private $edit;
  private $set;
  
  public function __construct() {
  
    $this->wand = new Wand();
    $this->help = new Help();
    $this->pos1 = new Pos1();
    $this->pos2 = new Pos2();
    $this->edit = new Edit();
    $this->set = new Set();
  }

  public function onPortalCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
  
    if ($sender->hasPermission("portals.command")) {
    
      if (!$args) {
      
        return $this->help->onHelpCommand($sender, $args);
      } else {

        switch($args[0]) {
        
          case "wand":
            
            return $this->wand->onWandCommand($sender);
          break;
          case "help":
            
            return $this->help->onHelpCommand($sender, $args);
          break;
          case "pos1":
            
            return $this->pos1->onPos1Command($sender);
          break;
          case "pos2":
            
            return $this->pos2->onPos2Command($sender);
          break;
          case "edit":
            
            return $this->edit->onEditCommand($sender, $args);
          break;
          case "set":
            
            return $this->set->onSetCommand($sender, $args);
          break;
        }
      }
    } else {
    
      $sender->sendMessage(TextFormat::RED . "You do not have permissions to run this command.");
      return true;
    }
  }
}
