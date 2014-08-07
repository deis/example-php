Powered by <?php
	header("Content-Type:text/plain");
	$var = getenv("POWERED_BY");
	if (!$var) {
		echo("Deis");
	} else {
		echo("$var");
	}
?>
