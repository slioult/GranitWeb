<?php session_start(); ?>

<?php
if(empty($_SESSION['login']))
{
	header('location:index.php');
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
function testing()
{
	var maVar = document.getElementById("testInput").value;
	var ligne = document.createElement('tr');
	var cel = document.createElement('td');
	var text = maVar
	var newtext = document.createTextNode(text);
	alert(newtext);
	var table = document.getElementById('maTable');
	
	cel.appendChild(newtext);
	ligne.appendChild(cel);
	table.appendChild(ligne);
	alert(table.count());
}
</script>


<style>
</style>
</head>

<body>

	<div id="page">
		
		
		<p><?php
		
			/*for ($i = 1; $i <= $_POST['countNatures']; $i++)
			{
				echo $_POST['nat'.$i];
			}
			spl_autoload_register('chargerClasse');
			
			$cmd = new Commande();
			
			function chargerClasse($classe)
			{
				require 'classes/'.$classe.'.classe.php';
			}*/
			
			echo $_POST['releve'];
			
			?></p>
		

	</div>

	<?php include("pied_de_page.php"); ?>

</body>
</html>
