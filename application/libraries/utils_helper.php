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
	function pprint()
	{
		return array_key_exists($item, $array) ? $array[$item] : $default;
	}
}