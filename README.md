# Concrete5-Packages

## Custom ID for Layout-Areas and Blocks
enable a inputfield for a custom id in your layout-area and block  custom style toolbar.

## Button Block
add Buttons to your page.
you can define Button Styles in your page_theme.php with
```
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
```
