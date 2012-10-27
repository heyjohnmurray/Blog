<?php
	function create_link($string){
	   $slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $string));
	   return $slug;
	}
	
	function post_preview_length($x){
		if(strlen($x)<=200){
			echo $x;
		}
		else{
			$y=substr($x,0,200) . ' ...';
			echo $y;
		}
	}
	
?>