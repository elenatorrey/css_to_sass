<?php
// Cascade CMS SOAP WSDL URL
$soapURL = "https://its-wcms-up01.its.rochester.edu:8443/ws/services/AssetOperationService?wsdl";
$config = include(__DIR__ . '/../config.php');
$apiKey = $config['cascade_api_key'];
// Authentication Details
$auth = array(
    'apiKey'   => $apiKey    // Replace with your API key
);

// File Details
$siteName = "SON";           // Replace with the exact site name
$cssFilePath = "/assets/css/custom.css"; // Path to the CSS file in Cascade CMS
$localCssPath = "custom.css";  // Path to the local CSS file


    $client = new SoapClient($soapURL, array('trace' => 1, 'location' => str_replace('?wsdl', '', $soapURL)));

 
    $identifier = array(
        'path' => array('path' => $cssFilePath, 'siteName' => $siteName),
        'type' => 'file'
    );

    $destinationIdentifier = array(
	// ID or path of the destination
	'id' => '2b49da0eac19047656deb75d843eeb33',
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
