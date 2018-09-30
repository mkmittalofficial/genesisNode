<?php
	/* MySQLi Connection Calling Function */
	include_once("includes/dbcon");	
	/* 1. Create Genesis Node */
	function createGenesisNode($ownername,$ownerId)
	{
		include_once("includes/createOwner.php");
			if(createNode($ownerName, $ownerId) == 1)
			{
				$sql = 'INSERT INTO genesis VALUES("'.$id.'", "NULL", "1", "1", "'.$ownerId.'", "1", "1","'.$timestamp.'")';
				if(mysqli_query($con,$sql))
					return 1;
				else
					return 0;
			}
	}
	/* 
	Below Function Can do following things:
		2. Create set of Child Nodes
		3. Create a child node of particular node
        4. Encryption And Decryption (in createNode.php);		
	*/
	function createChildNode($ownerId, $nodeValue)
	{
		
		include_once("includes/createNode.php");
		$sql = "SELECT COUNT(*) FROM genesis WHERE genesisReferenceNodeId = ".$ownerId."";
		$result = mysqli_query($con,$sql);
		$nodeId = $result+1;
		$referenceNodeId = "#".$nodeId.$ownerId;
		$childReferenceNodeId = "#".($nodeId+1);
		$genesisReferenceNodeId = $ownerId;
		return createNode($ownerId, $nodeValue, $nodeNumer, $nodeId, $referenceNodeId, $childReferenceNodeId, $genesisReferenceNodeId)
	}
	/* 5. Verify owner node */
	function verifyOwner($ownerId, $referenceNodeId)
	{
		include_once("includes/getNodeData.php");
		$object  = getNodeValue($referenceNodeId);
        if($object[0]['ownerId'] == $ownerId)
			return 1;
		else
			return 0;
	}
	/* 6. Edit value of Node */
	function editNode($ownerId,$referenceNodeId, $newNodeValue)
	{
		/* Verify owner */
		if(verifyOwner($ownerId, $referenceNodeId) == 1)
		{
			include_once("includes/editNode.php");
			return editNodeFunc($ownerId, $newNodeValue, $referenceNodeId);
		}
		else
			return 0;
	}
	/* 7. Transfer ownership of particular node */
	function transferOwner($prevOwnerId,$newOwnerId, $referenceNodeId)
	{
		if(verifyOwner($ownerId, $referenceNodeId)==1)
			return transferNodeOwner($prevOwnerId,$newOwnerId, $referenceNodeId);
		else
			return 0;
	}
	/*	Below Function Can do following things:
			8. Find Longest Chain from genesis node: findLongestChain(1,$ownerId)
			9. Find Longest Chain from any node
	*/
	function findLongestChain($nodeId,$referenceNodeId)
	{
		$sql = 'SELECT COUNT(*) FROM genesis WHERE nodeValue > (SELECT nodeValue FROM genesis WHERE referenceNodeId = "'.$referenceNodeId.'")';
		$result = mysqli_query($con,$sql);
		return $result;
	}
	/* 10. Merge 2 nodes */
	function mergeNodes($referenceNodeId1, $referenceNodeId2)
	{
		include_once("includes/getNodeData.php");
		$object1  = getNodeValue($referenceNodeId1);
		$object2  = getNodeValue($referenceNodeId2);
        $nodeValue = $object1[0]['nodeValue'] + $object2[0]['nodeValue'];
		return createChildNode($object1[0]['ownerId', $nodeValue);
	}
?>