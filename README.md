## School of Nursing Website

Description

This codebase supports the School of Nursing web styling workflow using modular Sass structure, university-approved design tokens, and automated upload/publish PHP scripts for Cascade CMS integration.

## Visuals

The project folder structure is as follows:

```
son_css/
├── components/
│   ├── components.scss
│   ├── components.css
│   ├── upload_components.php
│   └── publish_components.php
├── custom/
│   ├── custom.scss
│   ├── custom.css
│   ├── upload_custom.php
│   └── publish_custom.php
├── menu/
│   ├── menu.scss
│   ├── menu.css
│   ├── upload_menu.php
│   └── publish_menu.php
├── newsroom/
│   ├── newsroom.scss
│   ├── newsroom.css
│   ├── upload_newsroom.php
│   └── publish_newsroom.php
├── node_modules/
│   └── @univmarcomm/rochester-design-tokens/
├── _variables.scss
├── .npmrc
├── package.json
└── package-lock.json
```

## Installation

Clone this repository. Replace your-username and YOUR_TOKEN_HERE with your gitlab username and access token(Edit Profile -> Access Tokens)
```
git clone https://<your-username>:YOUR_TOKEN_HERE@git.its.rochester.edu/Elena_Torrey/school-of-nursing-website.git
```

Make sure you have Node.js and PHP installed on your system.
Confirm installation: 
```
node -v
npm -v
```

Run the following command to install dependencies (sass and University design tokens):

```
npm install
```
Ensure you have PHP installed (required for uploading/publishing compiled CSS via scripts).
``` 
php -v
```
If not installed: 
```
brew install php
```

## API Key Setup
To upload or publish files to Cascade, you must set your own API key.

1. If it doesn't already exist, create a config.php file in the root of your project. Paste this in config.php: 
```
<?php
return [
    'cascade_api_key' => 'your-real-api-key-here'
];
?>
```
To get an API key, click the dropdown next to your avatar in the upper-right corner in Cascade. Select "API Key" from the menu, then click the "generate" link to create a new key.

2. Check if you have .gitignore file in the root folder of your project and it contains the config.php file. This protects your personal key from being shared.

## Usage

Each folder (components, custom, menu, newsroom) contains its own .scss file, which compiles into .css, and is then uploaded to Cascade via a PHP script.

## Compile CSS

Use the following npm scripts to compile individual Sass files:

```
npm run compile_components
npm run compile_custom
npm run compile_menu
npm run compile_newsroom
```

## Upload to Cascade

To upload the compiled CSS files using the PHP upload scripts:

```
npm run upload_components
npm run upload_custom
npm run upload_menu
npm run upload_newsroom
```

## Compile and Upload (combined)

```
npm run compile_upload_components
npm run compile_upload_custom
npm run compile_upload_menu
npm run compile_upload_newsroom
```

## Publish

Once uploaded, run the corresponding publish script:

```
npm run publish_components
npm run publish_custom
npm run publish_menu
npm run publish_newsroom
```

 Or, alternatively, you can use one command to do all threee things (compile, upload, and publsih):

## Compile, Upload, and Publish to Development Site (Sonhouse)

```
npm run components_sh
npm run custom_sh
npm run menu_sh
npm run newsroom_sh
```


## Compile, Upload, and Publish to Live Site

```
npm run components
npm run custom
npm run menu
npm run newsroom
```

## Git Workflow for Syncing Projects

1. Pull the latest changes (every time before working)
```
git pull origin main
```

2. Make your changes locally.

3. Stage your changes
```
git add .
```

Or, specific files:
```
git add components/components.scss custom/custom.scss
```

4. Commit your changes. Add a clear message describing what you did:
```
git commit -m "Updated menu styling"
```

5.Push your changes back to GitLab
```
git push origin main
```

**Always make sure to pull before you push, especially if it's been a while since your last update.**

