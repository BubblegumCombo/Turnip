<?php

	include("functions.php");

	include("views/header.php");

    if ($_GET['page'] == 'timeline') {
        
        include ("views/timeline.php");
        
    } else if ($_GET['page'] == 'yourprices') {
        
        include("views/yourprices.php");
    } else {
        
	
	include("views/home.php");
        
    }

	include("views/footer.php");



?>