<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Refresh" content="3;URL=index.php" />
<?php
include 'style/Mobile_Detect.php';
$detect = new Mobile_Detect();
if ($detect->isMobile() OR $detect->isTablet())
{
	echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"style/mobile_style.css\" media=\"screen\" />";
}
else
{
	echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"style/style.css\" media=\"screen\" />";
}
?>
<title>Mayenne Granits</title>
<script>

</script>


<style>
</style>
</head>

<body>

	<div id="page" >
		<h1 id="centrer_titre">Mayenne <br /> Granits</h1>
		<br /> <br /> <br /><br /> <br /> <br />
		<h2 style="margin-bottom:20%;">Identifiant ou mot de passe incorrect. <br /> <br /> Vous allez être redirigé automatiquement.</h2>
	</div>

</body>
</html>
