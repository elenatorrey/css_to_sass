<?php
function encodeFileToBase64($filePath) {
    if (file_exists($filePath)) {
        $fileData = file_get_contents($filePath);
        return base64_encode($fileData);
    } else {
        return "Error: File not found.";
    }
}

$css_base64 = encodeFileToBase64("custom.css");
echo $css_base64;
?>