# abit
Thriveweb Starter theme - Custom WP

Starter theme for wordpress underdevelopment.
Version 1.0 

Included:

Gulp: build system
Browsersync: for auto browser-refreshing and syncing.
Sass with Sourcemaps
Rucksack with Autoprefixer

Dependencies:
Node & npm

Installation:
Clone or download the repo into your theme folder
Open terminal and cd to this directory
npm install
When it has finished, run npm start
Open http://localhost:3000 in your browser
Make a change and watch it refresh

Options:
Browsersync is set to work via flex.dev as a proxy. You will need to change this ( e.g. use localhost:8888 for MAMP ). You can change this setting in gulpfile.js
Open http://localhost:3001 in your browser for more Browsersync settings
Deploying with DPLOY:

Install DPLOY globally: npm install dploy -g
Add dploy.yaml to .gitignore
Edit the ftp credentials in dploy.yaml
Run dploy in terminal
DPLOY will upload the latest changes by comparing the version on the server with the git repository
