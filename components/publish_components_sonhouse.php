<?php
// Cascade CMS SOAP WSDL URL
$soapURL = "";
$config = include(__DIR__ . '/../config.php');
$apiKey = $config['cascade_api_key'];
// Authentication Details
$auth = array(
    'apiKey'   => $apiKey    // Replace with your API key
);

// File Details
$siteName = "SON";           // Replace with the exact site name
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
	'id' => '2b4b7ff7ac19047656deb75d6bd22dbb',
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
