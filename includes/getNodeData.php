<?php
	include_once("includes/dbcon.php");
	include_once("includes/encryptNode.php");
	
	function getNodeValue($referenceNodeId)
	{		
		$sql = "SELECT data FROM genesis WHERE referenceNodeId = ".$referenceNodeId."";
		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($result);
		/* Data Decryption */
		$data = decrypt($row['data']);
		$object  = json_decode($data, true);
		return $object;
	}
	mysqli_close($con);
?>