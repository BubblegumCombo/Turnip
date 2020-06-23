<?php

	session_start();

	/* $link = msqli_connect("shareddb-u.hosting.stackcp.net", "turnip-313333c155", "1lh5op5uiq", "turnip-313333c155");

	if (mysqli_connect_errno()) {

		print_r(mysqli_connect_error());
		exit();
	}
 */
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect("localhost", "root", "", "turnip");

	if (mysqli_connect_errno()) {

		print_r(mysqli_connect_error());
		exit();
	}

	if (isset($_GET['function'])) {
		if($_GET['function'] == "logout"){
			session_unset();
		}
	}

			function time_since($since) {
		    $chunks = array(
		        array(60 * 60 * 24 * 365 , 'year'),
		        array(60 * 60 * 24 * 30 , 'month'),
		        array(60 * 60 * 24 * 7, 'week'),
		        array(60 * 60 * 24 , 'day'),
		        array(60 * 60 , 'hour'),
		        array(60 , 'min'),
		        array(1 , 's')
		    );

		    for ($i = 0, $j = count($chunks); $i < $j; $i++) {
		        $seconds = $chunks[$i][0];
		        $name = $chunks[$i][1];
		        if (($count = floor($since / $seconds)) != 0) {
		            break;
		        }
		    }

		    $print = ($count == 1) ? '1 '.$name : "$count {$name}s";
		    return $print;
		}

		
	function displayPrice($type) {

		global $link;

		if ($type == 'public') {

			$whereClause = "";
	}

	$query = "SELECT * FROM turnips ".$whereClause." ORDER BY `datetime` DESC LIMIT  10";

	$result = mysqli_query($link, $query);
	
	if (mysqli_num_rows($result) == 0) {

		echo "There are no prices to display.";
	} else { 

		while ($row = mysqli_fetch_assoc($result)) {

			$userQuery = "SELECT * FROM users WHERE id = ".mysqli_real_escape_string($link, $row['userid'])." LIMIT 1";
			$userQueryResult = mysqli_query($link, $userQuery);
			$user = mysqli_fetch_assoc($userQueryResult);

			
			echo "<div class='prices'><p>".$user['email']." <span class='time'>". date ("l"). " " . time_since(time() - strtotime($row['datetime']))." ago </span></p>";

			echo "<p>".$row['price']. " bells</p>";

			echo "<p>Follow</p></div>";
		}
	}

}

function displayPriceBox() {

	if (isset($_SESSION['id'])) {
		if($_SESSION['id'] > 0){
			echo '<div class="form-inline">
				<div class="form-group">
				<textarea class="form-control" id="turnipContent"></textarea>
				</div>
				<button id="postPriceButton" class="btn btn-primary">Post Price</button>
				</div>';
		}

		
	}
}

?>

<!--
pass 1lh5op5uiq

server shareddb-u.hosting.stackcp.net

un turnip-313333c155
-->