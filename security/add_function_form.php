<?php
	$title = "Control Panel - Add Function";
	require '../security/headerInclude.php';
?>

	<h2>Add Function</h2>

	<form action="../security/index.php?action=SecurityProcessFunctionAddEdit" method="post">
		
            <label>Name:</label> <input type="text" name="Name" size="20" value="" maxlength="64" autofocus required ><br/> 
            <label>Description:</label> <input type="text" name="Description" size="20" value=""><br/> 
		
		<br/>
		
		<input type="submit" value="Submit" />

	</form>
	
<?php
	require '../security/footerInclude.php';
?>
