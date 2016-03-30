# Concrete5-Packages

## 	Custom id at layout Areas
enable a inputfield for a custom id for layouts in the custom style inline toolbar.

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
