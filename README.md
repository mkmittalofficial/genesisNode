# genesisNode


Following are the functions in index.php  file:
  1. Create Genesis Node 
	  function createGenesisNode($ownername,$ownerId);
  
  2. Create set of Child Nodes
		3. Create a child node of particular node
       4. Encryption And Decryption (in createNode.php);		
		function createChildNode($ownerId, $nodeValue);
	
  5. Verify owner node 
	  function verifyOwner($ownerId, $referenceNodeId);
	
  6. Edit value of Node 
	  function editNode($ownerId,$referenceNodeId, $newNodeValue);
	
  7. Transfer ownership of particular node 
	  function transferOwner($prevOwnerId,$newOwnerId, $referenceNodeId);
	
  8. Find Longest Chain from genesis node: findLongestChain(1,$ownerId)
		9. Find Longest Chain from any node
	  	function findLongestChain($nodeId,$referenceNodeId);
	
  10. Merge 2 nodes 
	function mergeNodes($referenceNodeId1, $referenceNodeId2);
