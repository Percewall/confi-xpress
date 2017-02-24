<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('pprint'))
{
	/**
	 * Element
	 *
	 * Lets you determine whether an array index is set and whether it has a value.
	 * If the element is empty it returns NULL (or whatever you specify as the default value.)
	 *
	 * @param	string
	 * @param	array
	 * @param	mixed
	 * @return	mixed	depends on what the array contains
	 */
	function pprint($var, $pretty = false)
	{
		if (!defined('STDIN'))
			if ($pretty)
				echo '<pre style="border:1px solid #444444; background:#cccccc; padding: 10px; '
				. 'margin:15px;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;'
				. 'font-family: verdana">';
			else
				echo '<pre>';
		echo psprint($var);
		if (!defined('STDIN'))
			echo '</pre>';
	}

	/**
	 * Convenience function for quick string conversion variables/objects/arrays
	 *
	 * @param mixed $var
	 */
	function psprint($var)
	{
		$str = "";
		switch (gettype($var)) {
			case 'array':
				ob_start();
				print_r($var);
				$str = ob_get_contents();
				ob_end_clean();
				break;
			case 'object':
				ob_start();
				print_r($var);
				$str = ob_get_contents();
				ob_end_clean();
				//if (is_subclass_of($var, 'php\core\Object')) {
				//$str = self::__toString();
				/* } else {
				  $str = sprintf("Object ID#%s - No __toString() method.", spl_object_hash($var));
				  } */
				break;
			default:
				$str = strval($var);
		}
		return $str;
	}
}