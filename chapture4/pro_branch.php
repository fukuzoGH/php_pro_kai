<?php

//if(isset($_POST['disp'])==true)
if( filter_input( INPUT_POST, 'disp' ) == true ){
	//if(isset($_POST['procode'])==false)
        if( filter_input( INPUT_POST, 'procode' ) == false ) {
            //
            // 商品が選択されていないとき
            // オプションボタンが未選択
            //
            header( 'Location:pro_ng.php' );
            exit();
	}
        
	//$pro_code=$_POST['procode'];
        $pro_code = filter_input( INPUT_POST, 'procode' );
        
	header( 'Location:pro_disp.php?procode=' . $pro_code );
        
	exit();
}

//if(isset($_POST['add'])==true)
if( filter_input( INPUT_POST, 'add' ) == true ) {
	header( 'Location:pro_add.php' );
	exit();
}

//if(isset($_POST['edit'])==true)
if( filter_input( INPUT_POST, 'edit' ) == true ) {
    
	//if(isset($_POST['procode'])==false)
        if( filter_input( INPUT_POST, 'procode' ) == false ) {
		header( 'Location:pro_ng.php' );
		exit();
	}
        
	//$pro_code=$_POST['procode'];
        $pro_code = filter_input( INPUT_POST, 'procode' );
        
	header( 'Location:pro_edit.php?procode=' . $pro_code );
	exit();
        
}

//if(isset($_POST['delete'])==true)
if( filter_input( INPUT_POST, 'delete' ) == true ) {
    
	//if(isset($_POST['procode'])==false)
        if( filter_input( INPUT_POST, 'procode' ) == false ) {
            
		header( 'Location:pro_ng.php' );
		exit();
	}
        
	//$pro_code=$_POST['procode'];
        $pro_code = filter_input( INPUT_POST, 'procode' );
        
	header( 'Location:pro_delete.php?procode=' . $pro_code );
	exit();
}
