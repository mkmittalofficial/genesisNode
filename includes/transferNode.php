<?php
	include_once("includes/dbcon.php");
	include_once("includes/encryptNode.php");
	
	function transferNodeOwner($prevOwnerId,$newOwnerId, $referenceNodeId)
	{
			$sql = 'SELECT * FROM genesis WHERE referenceNodeId = '.$referenceNodeId.'';
			$result = mysqli_query($con,$sql);
			$rows = mysqli_fetch_array($result);
			/* Data Decryption */
			$data = decrypt($rows['data']);
			$object  = json_decode($data, true);
			$nodeValue = $object[0]['nodeValue'];
			/* fetching OwnerName */
			$sql = 'SELECT ownerName FROM OWNER WHERE id = '.$newOwnerId.'';
			$result = mysqli_query($con,$sql);
			$row = mysqli_fetch_array($result);
			$ownerName = $row['ownerName'];
			$timestamp=date("Y-m-d h:r:i");
			/* JSON Storing Technique */
			$data = "{ownerId: ".$newOwnerId.", nodeValue: ".$nodeValue.", OwnerName: ".$ownerName."}";
			/* Encrypt Data */
			$edata = encrypt($data);
			$sql = 'UPDATE genesis SET data = "'.$edata.'" WHERE referenceNodeId = "'.$referenceNodeId.'"';
			if(mysqli_query($con,$sql))
				return 1;
			else
				return 0;
	}
	
	mysqli_close($con);
?>