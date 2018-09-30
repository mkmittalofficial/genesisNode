<?php
	include_once("includes/dbcon.php");
	include_once("includes/encryptNode.php");
	
	function validate($nodeValue, $ownerId)
	{		
			$sql = 'SELECT * FROM OWNER WHERE id = '.$ownerId.'';
			$result = mysqli_query($con,$sql);
			$row = mysqli_fetch_array($result);
			if(($row['sum']-$nodeValue)>0)
				return 1;
			else
				return 0;
	}
	
	function createNode($ownerId, $nodeValue, $nodeNumer, $nodeId, $referenceNodeId, $childReferenceNodeId, $genesisReferenceNodeId)
	{
		if(validate($nodeValue, $ownerId)==1)
		{
			$sql = 'SELECT ownerName FROM OWNER WHERE id = '.$ownerId.'';
			$result = mysqli_query($con,$sql);
			$row = mysqli_fetch_array($result);
			$ownerName = $row['ownerName'];
			$timestamp=date("Y-m-d h:r:i");
			/* JSON Storing Technique */
			$data = "{ownerId: ".$ownerId.", nodeValue: ".$nodeValue.", OwnerName: ".$ownerName."}";
			/* Encrypt Data */
			$edata = encrypt($data);
			$sql = 'INSERT INTO genesis VALUES("'.$id.'", "'.$edata.'", "'.$nodeNumer.'", "'.$nodeId.'", "'.$referenceNodeId.'", "'.$childReferenceNodeId.'", "'.$genesisReferenceNodeId.'","'.$timestamp.'")';
			if(mysqli_query($con,$sql))
				return 1;
			else
				return 0;
		}
		else
			return 0;
	}
	
	mysqli_close($con);
?>