<?php
namespace Concrete\Package\CustomIdAtLayouts\Block\CoreAreaLayout;

use \Concrete\Block\CoreAreaLayout\Controller as C5CoreAreaLayout;

class Controller extends C5CoreAreaLayout{


	public function view(){
		//$b = $this->getBlockObject();
		$this->render('/../../../packages/custom_id_at_layouts/blocks/core_area_layout/templates/view_with_id');
		return parent::view();
	}

}
