<?php

namespace RedCraftPE\uPortals\Commands\SubCommands;

use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat;
use pocketmine\item\Item;

use RedCraftPE\uPortals\Main;

class Wand {

	public function onWandCommand(CommandSender $sender) {
	
		if ($sender->hasPermission("uportals.wand")) {
			
			$ench = Enchantment::getEnchantment(2);
			$enchInstance = new EnchantmentInstance($ench, 1);
			$wand = Item::get(Item::WOODEN_AXE)->setCustomName(TextFormat::BLUE . "Portal Wand")->addEnchantment($enchInstance));
			$sender->getInventory()->addItem($wand);
			$sender->sendMessage(TextFormat::GREEN . "The portal wand is in your inventory!");
			return true;
		} else {
		
			$sender->sendMessage(TextFormat::RED . "You do not have permissions to run this command.");
      			return true;
		}
		return false;
	}
}
