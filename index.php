<?php

	include("functions.php");

	include("views/header.php");

    if (isset($_GET['page']) == 'timeline') {
        
        include ("views/timeline.php");
        
    } else if (isset($_GET['page']) == 'yourprices') {
        
        include("views/yourprices.php");
    } else {
        
	
	include("views/home.php");
        
    }

	include("views/footer.php");



?>