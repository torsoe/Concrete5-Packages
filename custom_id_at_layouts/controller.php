<?php
namespace Concrete\Package\CustomIdAtLayouts;

use Concrete\Core\Package\Package as C5Package,
	Environment as C5Environment,
	Route as C5Route;


defined('C5_EXECUTE') or die('Access Denied.');



class Controller extends c5Package{


	protected $pkgHandle = 'custom_id_at_layouts';
	protected $appVersionRequired = '5.7.1';
	protected $pkgVersion = '0.5';

	public function getPackageName(){
		return t("Custom ID");
	}

	public function getPackageDescription(){
		return t("Enable Custom Id in Custom Styles");
	}



	public function on_start() {
		$this->enableCustomId();
	}

	
	public function install(){
		$pkg = parent::install();
	}


	public function uninstall(){
		parent::uninstall();
	}


	public function upgrade() {
		parent::upgrade();
	}


	/*
	*
	*
	*
	*/

	private function enableCustomId(){
		$env = C5Environment::get();
		$env->overrideCoreByPackage('blocks/core_area_layout/controller.php', $this);
		$env->overrideCoreByPackage('elements/custom_style.php', $this);

		c5Route::register('/ccm/system/dialogs/block/design/submit','\Concrete\Package\CustomIdAtLayouts\Controller\Dialog\Block\Design::submit');
		c5Route::register('/ccm/system/dialogs/block/design/reset','\Concrete\Package\CustomIdAtLayouts\Controller\Dialog\Block\Design::reset');
		c5Route::register('/ccm/system/dialogs/block/design','\Concrete\Package\CustomIdAtLayouts\Controller\Dialog\Block\Design::view');
	}
}



