<?php
// Cascade CMS SOAP WSDL URL
$soapURL = "https://its-wcms-up01.its.rochester.edu:8443/ws/services/AssetOperationService?wsdl";

// Authentication Details
$auth = array(
    'apiKey'   => '3de8e1a9-c7e3-4ec1-a009-a80b537dfb77'      // Replace with your API key
);

// File Details
$siteName = "SON-sandbox";           // Replace with the exact site name
$cssFilePath = "/assets/css/components.css"; // Path to the CSS file in Cascade CMS
$localCssPath = "components.css";  // Path to the local CSS file
$fileId = "15228444ac1904766a0632aebead830b";          // If you prefer using ID instead of path


    $client = new SoapClient($soapURL, array('trace' => 1, 'location' => str_replace('?wsdl', '', $soapURL)));

 
    $identifier = array(
        'path' => array('path' => $cssFilePath, 'siteName' => $siteName),
        'type' => 'file'
    );

    $destinationIdentifier = array(
	// ID or path of the destination
	'id' => '420398edac19047648ae545a5873e375',
	'type' => 'destination'
    );


    $publishInformation = array
(
	'identifier' => $identifier,
 	'destinations' => array ($destinationIdentifier), // This is optional, not providing this will result in publishing to all enabled destinations available to authenticating user 
	'unpublish' => false // This is optional, default is false
);

$publishParams = array ('authentication' => $auth, 'publishInformation' => $publishInformation); 
$reply = $client->publish($publishParams);

if ($reply->publishReturn->success=='true')
	echo "Success: Published.";
else
	echo "Error occurred when publishing: " . $reply->publishReturn->message;
?>
