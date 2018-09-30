<?php
	include_once("includes/dbcon.php");
	
	function createNode($ownerName, $ownerId)
	{
		$timeOfCreation =date("Y-m-d h:r:i");
			
			$sql = 'INSERT INTO owner VALUES("'.$id.'", "'.$ownerId.'", "'.$ownerName.'", "0", "'.$timeOfCreation.'")';
			if(mysqli_query($con,$sql))
				return 1;
			else
				return 0;
		
	}
	
	mysqli_close($con);
?>