<?php
// Cascade CMS SOAP WSDL URL
$soapURL = "";

$client = new SoapClient 
( 
	$soapURL, 
	array ('trace' => 1, 'location' => str_replace('?wsdl', '', $soapURL)) 
);
$config = include(__DIR__ . '/../config.php');
$apiKey = $config['cascade_api_key'];
// Authentication Details
$auth = array(
    'apiKey'   => $apiKey    // Replace with your API key
);


// File Details
$siteName = "SON";           // Replace with the exact site name
$cssFilePath = "/assets/css/newsroom.css"; // Path to the CSS file in Cascade CMS
$localCssPath = "/newsroom.css";  // Path to the local CSS file

try {
 
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


        $encodedData = file_get_contents(__DIR__ . $localCssPath);

        $fileAsset->text = $encodedData;
     
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
        echo "❌ Error occurred while reading the file: " . $editResponse->readReturn->message;
    }
} catch (Exception $e) {
    echo "❌ Exception: " . $e->getMessage();
}
?>
