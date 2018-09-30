<?php
function encrypt($sData){
$id=(double)$sData*525325.24;
return base64_encode($id);
}

function decrypt($sData){
$url_id=base64_decode($sData);
$id=(double)$url_id/525325.24;
return $id;
}

?>
