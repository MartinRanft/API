<!doctype html>
<html>

<head>
		<title>Manipalation von Daten</title>
		
		<link href="./mycss/mystyle.css" type="text/css" rel="stylesheet">

		
</head>

<body>

	

	<div id="filmbox">
	
	<div id="boxheadline">
	
		<p>Realisierung eines Webinterfaces</p>
	
	</div>
	
	<div id="eingabefeld">
	
	<form action="./CSV.php" method="post" enctype="multipart/form-data">
	
		<table id="mytable">
		
			<tr>
				<td><input name="student_csv" type="file" accept=".csv" size="30" maxlength="30"></td>
				<td><button id='btn_go'>OK</button></td>					
			</tr>
		
		</table>

	</form>

	</div>	
		<div id="ausgabefeld">
            <?php
                require_once("./CSV.php");
            ?>
		</div>
	
	</div>
	
</body>
</html>