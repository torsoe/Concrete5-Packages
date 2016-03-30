<?php defined('C5_EXECUTE') or die(_("Access Denied."));


if($intern){
	$_path =  Page::getCollectionPathFromID($internalLinkCID);
}else{
	$_path = $url;
}

$_class = ($size ? ' '.$size : '').($align ? ' '.$align : '').($style ? ' '.$style : '').($class ? ' '.$class : '');
$_target = ($target ? ' target="'.$target.'"' : "");
$_id = ($id ? ' id="'.$id.'"' : "");

?>
<div class="btn<?php echo $_class ?>">
<a href="<?php echo $_path ?>"<?php echo $_target.$_id ?>><?php echo $text ?></a>
</div>