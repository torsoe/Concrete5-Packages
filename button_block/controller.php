<?php
namespace Concrete\Package\ButtonBlock;

use Concrete\Core\Package\Package as C5Package,
	Concrete\Core\Block\BlockType\BlockType as C5BlockType;


defined('C5_EXECUTE') or die('Access Denied.');

class Controller extends c5Package{


	protected $pkgHandle = 'button_block';
	protected $appVersionRequired = '5.7.1';
	protected $pkgVersion = '0.5';




	public function getPackageName(){
		return t("Button Block");
	}

	public function getPackageDescription(){
		return t("Add Buttons to you Page");
	}

	
	public function install(){
		$pkg = parent::install();
		$this->installBlocks();
	}


	public function uninstall(){
		parent::uninstall();
	}


	public function upgrade() {
		parent::upgrade();
		$this->installBlocks();
	}


	/*
	*
	*
	*
	*/
	private $blocks = array(
		'button'
	);
	private function installBlocks(){
		$pkg = C5Package::getByHandle('button_block');

		foreach ($this->blocks as $key => $block) {
			$exist = C5BlockType::getByHandle($block);
			if(!is_object($exist)) {
				$bt = C5BlockType::installBlockTypeFromPackage($block, $pkg);
			}
		}
	}

}

