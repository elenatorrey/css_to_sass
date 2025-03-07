#!/bin/bash
echo "Compiling SCSS..."
sass custom.scss custom.css

echo "Uploading CSS to Cascade CMS..."
php upload_custom.php