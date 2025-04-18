<?php
// Cascade CMS SOAP WSDL URL
$soapURL = "https://its-wcms-up01.its.rochester.edu:8443/ws/services/AssetOperationService?wsdl";

// Authentication Details
$auth = array(
    'apiKey'   => 'c58322bf-0b6d-4156-a316-3c7b084a62dc'      // Replace with your API key
);

// File Details
$siteName = "SON";           // Replace with the exact site name
$cssFilePath = "/assets/css/custom.css"; // Path to the CSS file in Cascade CMS
$localCssPath = "/custom.css";  // Path to the local CSS file
$fileId = "15228444ac1904766a0632aebead830b";          // If you prefer using ID instead of path

try {

    $client = new SoapClient($soapURL, array('trace' => 1, 'location' => str_replace('?wsdl', '', $soapURL)));

 
    $identifier = array(
        'path' => array('path' => $cssFilePath, 'siteName' => $siteName),
        'type' => 'file'
    );

    $readParams = array(
        'authentication' => $auth,
        'identifier' => $identifier
    );

    $readResponse = $client->read($readParams);

    if ($readResponse->readReturn->success == "true") {
       
        $fileAsset = $readResponse->readReturn->asset->file;

        $fileAsset->text = file_get_contents(__DIR__ . $localCssPath);

        $editParams = array(
            'authentication' => $auth,
            'asset' => array('file' => $fileAsset)
        );


        $editResponse = $client->edit($editParams);

        if ($editResponse->editReturn->success == "true") {
            echo "✅ File successfully uploaded to Cascade CMS.";
        } else {
            echo "❌ Error occurred during file upload: " . $editResponse->editReturn->message;
        }
    } else {
        echo "❌ Error occurred while reading the file: " . $readResponse->readReturn->message;
    }
} catch (Exception $e) {
    echo "❌ Exception: " . $e->getMessage();
}
?>
