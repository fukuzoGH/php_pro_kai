<?php

//if(isset($_POST['add'])==true)
if( filter_input( INPUT_POST, 'add' ) == true ){
	header('Location:staff_add.php');
	exit();
}

//if(isset($_POST['edit'])==true)
if( filter_input( INPUT_POST, 'edit' ) == true ){
	//if(isset($_POST['staffcode'])==false)
        if( filter_input( INPUT_POST, 'staffcode' ) == false ){
		header('Location:staff_ng.php');
		exit();
	}
	//$staff_code=$_POST['staffcode'];
        $staff_code = filter_input( INPUT_POST, 'staffcode' );
        
	header('Location:staff_edit.php?staffcode=' . $staff_code );
	exit();
}

//if(isset($_POST['delete'])==true)
if( filter_input( INPUT_POST, 'delete' ) == true ){
	//if(isset($_POST['staffcode'])==false)
        if( filter_input( INPUT_POST, 'staffcode' ) == false )
	{
		header('Location:staff_ng.php');
		exit();
	}
	//$staff_code=$_POST['staffcode'];
        $staff_code = filter_input( INPUT_POST, 'staffcode' );
        
	header('Location:staff_delete.php?staffcode=' . $staff_code);
	exit();
}

?>