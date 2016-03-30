<?php
	defined('C5_EXECUTE') or die("Access Denied.");
	$a = $b->getBlockAreaObject();

	$container = $formatter->getLayoutContainerHtmlObject();

	$customId =  new Concrete\Package\CustomIdAtLayouts\Src\Block\CustomId($b->getBlockID());
	if($customId->exist())
		$container->setAttribute('id',$customId->getName());


	foreach($columns as $column) {
		$html = $column->getColumnHtmlObject();
		$container->appendChild($html);
	}



	echo $container;
