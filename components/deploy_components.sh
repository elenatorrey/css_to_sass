#!/bin/bash
echo "Compiling SCSS..."
sass components.scss components.css

echo "Uploading CSS to Cascade CMS..."
php upload_components.php
php publish_components.php