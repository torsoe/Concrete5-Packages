<?php
	defined('C5_EXECUTE') or die(_("Access Denied."));

	$form   = Core::make('helper/form');
	$ui     = Core::make('helper/concrete/ui');
	$al     = Core::make('helper/concrete/asset_library');
	$ps     = Core::make('helper/form/page_selector');

	$styles = $controller->getButtonBlockPresets();

?>



<fieldset>
	<legend><?php echo t('Button')?></legend>
	<div class="form-group">
		<?php echo $form->label('target', t('Linkziel'))?>
		<select name="intern" id="linkType" class="form-control">
			<option value="1" <?php echo ($intern ? 'selected="selected"' : '')?>><?php echo t('Interner Link')?></option>
			<option value="0" <?php echo (!$intern ? 'selected="selected"' : '')?>><?php echo t('Externer Link')?></option>
		</select>
	</div>
	<div class="form-group">
		<?php echo $form->label('text', t('Buttontext'))?>
		<?php echo $form->text('text', $text); ?>
	</div>
	<div id="linkExtern" <?php echo (!$intern ? '' : 'style="display: none"') ?>>
		<div class="form-group">
			<?php echo $form->label('url', t('Url'))?>
			<?php echo $form->text('url', $url); ?>
		</div>
		<div class="form-group">
			<?php echo $form->label('target', t('Target'))?>
			<?php echo $form->Select("target",array(
				''=>t('Im selben Fenster öffnen'),
				'_blank'=>t('Im neuen Fenster öffnen')
			),$target,""); ?>
		</div>
	</div>
	<div id="linkIntern" <?php echo ($intern ? '' : 'style="display: none"') ?>>
		<div class="form-group">
			<?php echo $form->label('internalLinkCID', t('Choose Page:'))?>
			<?php echo Loader::helper('form/page_selector')->selectPage('internalLinkCID', $internalLinkCID); ?>
		</div>
		<div class="form-group">
			<?php echo $form->label('target', t('Target'))?>
			<?php echo $form->Select("target",array(
				''=>t('Im selben Fenster öffnen'),
				'_blank'=>t('Im neuen Fenster öffnen')
			),$target,""); ?>
		</div>
	</div>
</fieldset>

<fieldset>
	<legend><?php echo t('Style')?></legend>
	<?php 

		if($styles['styles']){
			$_styles = array_merge(array(
				t('Bitte auswählen') => ''
			),$styles['styles']);
			echo '<div class="form-group">';
			echo $form->label('style', t('Buttonstil'));
			echo $form->Select("style", array_flip($_styles), $style, "");
			echo '</div>';
		}

		if($styles['sizes']){
			$_sizes = array_merge(array(
				t('Bitte auswählen') => ''
			),$styles['sizes']);
			echo '<div class="form-group">';
			echo $form->label('size', t('Buttongrösse'));
			echo $form->Select("size", array_flip($_sizes), $size, "");
			echo '</div>';
		}

		if($styles['align']){
			$_align = array_merge(array(
				t('Bitte auswählen') => ''
			),$styles['align']);
			echo '<div class="form-group">';
			echo $form->label('align', t('Buttonausrichtung'));
			echo $form->Select("align", array_flip($_align), $align, "");
			echo '</div>';
		}
	?>
</fieldset>

<fieldset>
	<legend><?php echo t('Options')?></legend>
	<div class="form-group">
		<?php echo $form->label('class', t('Zusätzliche Css-Klasse'))?>
		<?php echo $form->text('class', $class); ?>
	</div>
	<div class="form-group">
		<?php echo $form->label('id', t('Button ID'))?>
		<?php echo $form->text('id', $class); ?>
	</div>
</fieldset>




<script type="text/javascript">
	$(document).ready(function() {
		$('#linkType').on('change', function() {
			if($(this).val() === '0'){
				$('#linkExtern').show();
				$('#linkIntern').hide();
			}else{
				$('#linkExtern').hide();
				$('#linkIntern').show();
			}
		});
	});
</script>