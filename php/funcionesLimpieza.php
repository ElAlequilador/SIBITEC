<?php
	function valida_input($data) {
    	$data = trim($data);
    	$data = stripslashes($data);
    	$data = strip_tags($data);
    	return $data;
  	}
	
?>