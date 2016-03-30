<?php
namespace Concrete\Package\CustomIdAtLayouts\Controller\Dialog\Block;
use Concrete\Controller\Dialog\Block\Design as C5Design;

use Concrete\Core\Block\CustomStyle,
	Concrete\Core\Block\View\BlockView,
	Concrete\Core\Page\EditResponse,
	Concrete\Core\Page\Type\Composer\Control\BlockControl,
	Concrete\Core\Page\Type\Composer\FormLayoutSetControl,
	Concrete\Core\StyleCustomizer\Inline\StyleSet,
	Concrete\Package\CustomIdAtLayouts\Src\Block\CustomId as PackageCustomId;

class Design extends C5Design {

	public function reset(){
		return parent::submit();
	}

	public function submit(){
		if ($this->validateAction() && $this->canAccess()) {

			$b = $this->getBlockToEdit();
			$oldStyle = $b->getCustomStyle();
			if (is_object($oldStyle)) {
				$oldStyleSet = $oldStyle->getStyleSet();
			}

			$r = $this->request->request->all();
			$set = StyleSet::populateFromRequest($this->request);
			

			$pr = new EditResponse();
			if(is_object($set)){
				$set->save();
				$b->setCustomStyleSet($set);
			} else if ($oldStyleSet) {
				$b->resetCustomStyle();
			}

			if (isset($r['enableBlockContainer'])) {
				if ($r['enableBlockContainer'] === '-1') {
					$b->resetBlockContainerSettings();
				}
				if ($r['enableBlockContainer'] === '0' ||
					$r['enableBlockContainer'] === '1') {
					$b->setCustomContainerSettings($r['enableBlockContainer']);
				}
			}

			if ($this->permissions->canEditBlockCustomTemplate()) {
				$data = array();
				$data['bFilename'] = $r['bFilename'];
				$b->updateBlockInformation($data);
			}

			
			$pr->setPage($this->page);
			$pr->setAdditionalDataAttribute('aID', $this->area->getAreaID());
			$pr->setAdditionalDataAttribute('arHandle', $this->area->getAreaHandle());
			$pr->setAdditionalDataAttribute('originalBlockID', $this->block->getBlockID());

			if (is_object($oldStyleSet)) {
				$pr->setAdditionalDataAttribute('oldIssID', $oldStyleSet->getID());
			}

			if (is_object($set)) {
				$pr->setAdditionalDataAttribute('issID', $set->getID());
				$style = new CustomStyle($set, $b, $this->page->getCollectionThemeObject());
				$css = $style->getCSS();
				if ($css !== '') {
					$pr->setAdditionalDataAttribute('css', $style->getStyleWrapper($css));
				}
			}

			$pr->setAdditionalDataAttribute('bID', $b->getBlockID());

			
			$newID = trim($r['customId']);
			if($b->getBlockID() == $this->block->getBlockID()){
				$oldId = new PackageCustomId($b->getBlockID());

				if($oldId->exist()){
					if($newID){
						if($newID != $oldId->getName()){
							$oldId->set(array(
								'bID'=>$b->getBlockID(),
								'name'=>$newID
							))->save();
						}

					}else{
						$oldId->reset();
					}
				}else{
					if($newID){
						$oldId->set(array(
							'bID'=>$b->getBlockID(),
							'name'=>$newID
						))->save();
					}
				}

			}else{
				if($newID){
					$oldId = new PackageCustomId();
					$oldId->set(array(
						'bID'=>$b->getBlockID(),
						'name'=>$newID
					))->save();
				}
			}

			$pr->setMessage(t('Design updated.'));
			$pr->outputJSON();
		}
	}

	public function view(){
		return parent::view();
	}
}

