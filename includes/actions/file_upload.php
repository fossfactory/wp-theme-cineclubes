<?php

// Directory where we're storing uploaded images
// Remember to set correct permissions or it won't work
require_once('Uploader.php');

$upload_dir = "../../../../uploads/cineclube";


$uploader = new FileUpload('uploadfile');


// Handle the upload
$result = $uploader->handleUpload($upload_dir);

if (!$result) {
  exit(json_encode(array('success' => false, 'msg' => $uploader->getErrorMsg())));  
}

echo json_encode(array('success' => true));

