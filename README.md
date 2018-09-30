# genesisNode
```
Language: PHP
Database: Mysql
Programming Style: Modular 
```
## To Execute run "index.php" file. Which contains following are the functions:
  ### 1. Create Genesis Node:
  	```
	function createGenesisNode($ownername,$ownerId);
 	``` 	  
  ### 2. Create set of Child Nodes:
  ```
  	function createChildNode($ownerId, $nodeValue);
  ```
  ### 3. Create a child node of particular node:
  ```
 	 function createChildNode($ownerId, $nodeValue);
  ```
  
  ### 4. Encryption And Decryption (in includes/encryptNode.php):		
 	 ```
	 function encrypt($Data);
	 function decrypt($Data);
	 ```
  ### 5. Verify owner node:
  	```
	  function verifyOwner($ownerId, $referenceNodeId);
	```  
  ### 6. Edit value of Node: 
        ```
	  function editNode($ownerId,$referenceNodeId, $newNodeValue);
	```  
  ### 7. Transfer ownership of particular node: 
        ```
	  function transferOwner($prevOwnerId,$newOwnerId, $referenceNodeId);
	```  
  ### 8. Find Longest Chain from genesis node: findLongestChain(1,$ownerId):
  	```
	function findLongestChain($nodeId,$referenceNodeId);
	```
  ### 9. Find Longest Chain from any node:
        ```
    	function findLongestChain($nodeId,$referenceNodeId);
	```
  ### 10. Merge 2 nodes values: 
  	```
	function mergeNodes($referenceNodeId1, $referenceNodeId2);
	```
	

	
