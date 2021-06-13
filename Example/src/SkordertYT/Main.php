<?php

declare(strict_types=1);

namespace SkordertYT;

use pocketmine\network\mcpe\protocol\DataPacket;
use pocketmine\network\mcpe\protocol\TextPacket;
use proxy\plugin\Plugin;
use proxy\utils\Log;

class Main extends Plugin{
	/**
	 * Called when the plugin is enabled
	 */
	public function onEnable() : void{
		Log::Warn("Enabled!");
	}

	/**
	 * @param DataPacket $packet
	 * @return bool
	 */
	public function handleServerDataPacket(DataPacket $packet) : bool{
		return true;
	}

	/**
	 * @param DataPacket $packet
	 * @return bool
	 */
	public function handleClientDataPacket(DataPacket $packet) : bool{
		if($packet instanceof TextPacket){
			$packet->decode();
			//way to create chat commands
			if($packet->message === "*help"){
				$this->proxy->getClient()->sendMessage("*connect (ip) (port)\nList Of Commands In How To Play");//need pack
				return false;
			}
		}
		return true;
	}
