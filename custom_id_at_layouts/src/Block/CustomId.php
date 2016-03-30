<?php 
namespace Concrete\Package\CustomIdAtLayouts\Src\Block;

use Database as C5Database;


class CustomId{

	private $bID;
	private $id;
	private $name;
	private $query;

	public function __construct($bID = null){
		if($bID){
			$this->bID = $bID;

			$res = $this->getByBID($bID);
			
			if($res){
				$this->id = $res['id'];
				$this->name = $res['name'];
			}
		}
	}

	public function exist(){
		if($this->id){
			return true;
		}
		return false;
	}

	public static function getByBID($bID){
		$db = C5Database::connection();
		$res = $db->GetRow("Select id,name from StyleCustomizerInlineStyleIds where bID = $bID");

		if($res){
			return $res;
		}
		return false;
	}

	public function getName(){
		return $this->name;
	}


	public function setName($name){
		$this->name = $name;
		return $this;
	}


	public function set(array $data){
		foreach ($data as $key => $value) {
			$this->{$key} = $value;
		}

		return $this;
	}

	public function save(){
		if($this->exist())
			return $this->update();

		$db = C5Database::connection();
		$res = $db->Execute("INSERT INTO StyleCustomizerInlineStyleIds (bID, name) VALUES (?, ?) ",array($this->bID,trim($this->name)));
		return $res;
	}

	public function update(){
		$db = C5Database::connection();
		$res = $db->Execute("UPDATE StyleCustomizerInlineStyleIds set name=? WHERE id = ? AND bID=?",array(trim($this->name),$this->id,$this->bID));

		return $res;
	}

	public function reset(){
		$db = C5Database::connection();
		$res = $db->Execute("DELETE FROM StyleCustomizerInlineStyleIds WHERE id = ? AND bID=?",array($this->id,$this->bID));
		return $res;
	}



}