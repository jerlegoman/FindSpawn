<?php
/*
__PocketMine Plugin__
name=TOspawn
version=1.0
apiversion=12
author=Jerlegoman
class=spaplus
*/
class spaplus implements Plugin {
private $api;
public function __construct(ServerAPI $api,$server = false) {
$this->api = $api;
}
public function init() {
$this->api->addHandler("player.action", array($this, "eventHandle"), 50);
$this->api->addHandler("player.equipment.change", array($this, "eventHandler"), 50);
}
public function eventHandle($data, $event) {
switch ($event) {
case "player.action":
$player = $data["player"];
$item = $player->getSlot($player->slot);
if($item->getid()==345){
$player->teleport($this->api->level->getspawn());
$player->sendChat("[FindSpawn] You have arrived at Spawn!");
}

Break;

case "player.equipment.change":
if($item->getid()==345){
$player->sendChat("Tap and Hold on the screen to tp to spawn!");
}
Break;
}
}
public function __destruct(){}
}
?>
