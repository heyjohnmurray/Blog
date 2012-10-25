<?php
	function create_link($string){
	   $slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $string));
	   return $slug;
	}
?>