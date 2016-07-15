# abit
Thriveweb Starter theme - Custom WP

Starter theme for wordpress underdevelopment.
Version 1.0 


<p>Wordpress theme for <a href="http://thriveweb.com.au">Thrive Web</a>.</p>

<h3>Included:</h3>

<ul>
<li><a href="http://gulpjs.com/">Gulp</a>: build system</li>
<li><a href="http://browsersync.io/">Browsersync</a>: for auto browser-refreshing and syncing.</li>
<li><a href="http://sass-lang.com/">Sass</a> with <a href="https://github.com/floridoo/gulp-sourcemaps">Sourcemaps</a></li>
<li><a href="http://simplaio.github.io/rucksack/">Rucksack</a> with Autoprefixer</li>
<li><a href="https://github.com/Jinksi">Revcheck</a> Check your git webhook status</li>
</ul>

<h3>Dependencies:</h3>

<ul>
<li><a href="https://nodejs.org/en/">Node</a> &amp; <a href="https://docs.npmjs.com/getting-started/installing-node">npm</a></li>
</ul>

<h3>Installation:</h3>

<ul>
<li>Clone or download the repo into your theme folder</li>
<li>Open terminal and <code>cd</code> to this directory</li>
<li><code>npm install</code></li>
<li>When it has finished, run <code>npm start</code></li>
<li>Open http://localhost:3000 in your browser</li>
<li>Make a change and watch it refresh</li>
</ul>

<h3>Options:</h3>

<ul>
<li>Browsersync is set to work via <code>flex.dev</code> as a proxy. You will need to change this ( e.g. use <code>localhost:8888</code> for MAMP ). You can change this setting in <code>gulpfile.js</code></li>
<li>Open http://localhost:3001 in your browser for more Browsersync settings</li>
<li>Revcheck: terminal into theme dir <code>revcheck -a</code></li>
</ul>

<h3>Deploying with <a href="https://github.com/LeanMeanFightingMachine/dploy">DPLOY</a>:</h3>

<ul>
<li>Install DPLOY globally: <code>npm install dploy -g</code></li>
<li>Add <code>dploy.yaml</code> to <code>.gitignore</code></li>
<li>Edit the ftp credentials in <code>dploy.yaml</code></li>
<li>Run <code>dploy</code> in terminal</li>
<li>DPLOY will upload the latest changes by comparing the version on the server with the git repository</li>
</ul>
