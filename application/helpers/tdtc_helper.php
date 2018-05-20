<?php

function btn_edit($uri) {
	return anchor($uri, '<span class="glyphicon glyphicon-edit"></span>');
}
	
function btn_delete($uri) {
	return anchor(
			$uri, 
			'<span class="glyphicon glyphicon-remove"></span>', 
			array(
				'onclick' => "return confirm('You are about to delete a record. This cannot be undone. Are you sure?');",
			) // array end
		);
}	

function get_ol($array, $child = FALSE) {
	$str = '';
	
	if (count($array)) {
		$str .= $child == FALSE ? '<ol class="sortable">' : '<ol>';
		
		foreach ($array as $item) {
			$str .= '<li id="list_' . $item['id'] . '">';
			$str .= '<div>' . $item['name'] . '</div>';
			
			if (isset($item['children']) && count($item['children'])) {
				$str .= get_ol($item['children'], TRUE);
			}
			
			$str .= '</li>' . PHP_EOL;
		}
		
		$str .= '</ol>' . PHP_EOL;
	}
	
	return $str;
}

function get_menu($array, $prefix = NULL) {
	$str = '';
	
	foreach ($array as $item) {
			
		if (isset($item['children']) && count($item['children']) ) {
			$str .= '<li class="dropdown">' . PHP_EOL;
			$str .= '<a href=' . $item['linkAddr'];
			$str .= ' class="dropdown-toggle" data-toggle="dropdown">' . e($item['name']);
			$str .= '<b class="caret"></b></a>' . PHP_EOL;
				
			$str .= '<ul class="dropdown-menu">'. PHP_EOL;	
			$str .= get_menu($item['children'], $prefix);
			$str .= '</ul>' . PHP_EOL;
		}
		else {
			$str .= '<li><a href="' . $prefix . $item['linkAddr'] . '">' . e($item['name']) . '</a>';
		}
		
		$str .= '</li>' . PHP_EOL;
	}

	return $str;
}

function get_breadcrumb($array, $prefix = NULL) {
	$str = '';
	if (count($array)) {
		foreach ($array as $item) {
			if ($item['homeFlag']) {
				// '<li><a href="http://'
				$str .= '<li><a href="' . $item['linkAddr'] . '">' . e($item['name']) . '</a></li>' . PHP_EOL;
			}
			else 
			  $str .= '<li><a href="' . $prefix . $item['linkAddr'] . '">' . e($item['name']) . '</a></li>' . PHP_EOL;
		}
	}

	return $str;
	
}

function e($string) {
	return htmlentities($string, ENT_QUOTES, "utf-8");
}


/**
 * Dump helper. Functions to dump variables to the screen, in a nicley formatted manner.
 * @author Joost van Veen
 * @version 1.0
 */
if (!function_exists('dump')) {
	function dump ($var, $label = 'Dump', $echo = TRUE)
	{
		// Store dump in variable
		ob_start();
		var_dump($var);
		$output = ob_get_clean();

		// Add formatting
		$output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
		$output = '<pre style="background: #FFFEEF; color: #000; border: 1px dotted #000; padding: 10px; margin: 10px 0; text-align: left;">' . $label . ' => ' . $output . '</pre>';

		// Output
		if ($echo == TRUE) {
			echo $output;
		}
		else {
			return $output;
		}
	}
}


if (!function_exists('dump_exit')) {
	function dump_exit($var, $label = 'Dump', $echo = TRUE) {
		dump ($var, $label, $echo);
		exit;
	}
}



?>
