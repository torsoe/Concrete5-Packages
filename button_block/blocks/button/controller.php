<?php
namespace Concrete\Package\ButtonBlock\Block\Button;

use Concrete\Core\Block\BlockController as c5BlockController,
	Core as c5Core,
	Page as c5Page;

use stdClass;

defined('C5_EXECUTE') or die(_("Access Denied."));


class Controller extends c5BlockController{

	protected $btTable = "btButtons";
	protected $btInterfaceWidth = "600";
	protected $btInterfaceHeight = "600";
	protected $btDefaultSet = 'basic';

	protected $buttonBlockPresets = array(
		'styles' => array(
			'stroke' => 'btn-stroke'
		),
		'sizes' => array(
			'small' => 'btn-small',
			'medium' => 'btn-medium', 
			'large' => 'btn-large'
		),
		'align' => array(
			'left'=> 'btn-left',
			'center'=> 'btn-center',
			'right'=> 'btn-right'
		)
	);		

	public function getBlockTypeName(){
		return t('Buttons');
	}

	public function getBlockTypeDescription(){
		return t('add buttons');
	}

	public function validate($data){
		$e = c5Core::make('error');

		/*if (!$data['field1']) {
			$e->add(t('You must put something in the field 1 box.'));
		}*/

		return $e;
	}

	public function save($data){

		parent::save($data);
	}

	public function view(){

	}

	public function edit(){

	}

	public function getButtonBlockPresets(){
		$c = c5Page::getCurrentPage();
		$pt = $c->getCollectionThemeObject();

		if(method_exists($pt,'getButtonBlockPresets')){
			return $pt->getButtonBlockPresets();
		}else{
			return $this->buttonBlockPresets;
		}

		return array();
	}




}
