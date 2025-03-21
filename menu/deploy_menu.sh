#!/bin/bash
echo "Compiling SCSS..."
sass menu.scss menu.css

echo "Uploading CSS to Cascade CMS..."
php upload_menu.php