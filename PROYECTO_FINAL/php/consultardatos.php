<?php
if(!empty($_POST)){
	session_start();
	foreach($_POST as $field_name=>$val){
//		echo $field_name;
//		echo $val;
		$_SESSION['consultado']=$field_name;
		if(!empty($_SESSION['consultado'])){
			echo "true";
		}else{
			echo "false";
		}
}
}
?>