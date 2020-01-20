# ProPXLS Starter Theme

Bootstrap + Timber + WordPress theme = ✨(magical results)

PP Starter is a ProPXLS starter theme for ultra quick WordPress theme development. Bootstrap is used for front-end. It includes some code and ideology from _s, aucor-starter, EA-Starter, WPrig and Sage. All the action and none of the fuzz part ðŸš€

This theme is meant to use as a master theme. Don't use it as a parent theme. Turn it into magic!

## Table of Contents

* ProPXLS Starter Theme
  * Table of Contents
  * What's in the Box - TO DO
  * System Requirements - TO DO 
  * Getting started - TO DO
  * Theme structure
  * Gulp Tasks
  * Read more

## Getting started
Search & replace following strings: 
- <%site-url%> -- Url used by BrowseSync
- <%site-theme-name%> -- Theme nicename (Used in style.css, configuration file, etc)
- <%site-textdomain%> -- Theme textdomain

## Theme structure
```
your-theme-name
├── acf-json
├── assets
│   ├── dist
│   └── src
│   │   ├── img
│   │   ├── js
│   │   └── scss
├── propxls
│   ├── lib
│   │   ├── App
│   │   │   ├── Acf.php
│   │   │   ├── Ajax.php
│   │   │   ├── EnqueueAssets.php
│   │   │   ├── Helpers.php
│   │   │   └── Routes.php
│   │   └── Setup
│   │   │   ├── CleanUp.php
│   │   │   ├── Menus.php
│   │   │   ├── PostTypes.php
│   │   │   ├── Taxonomies.php
│   │   │   ├── ThemeSupport.php
│   └── bootstrap.php
├── static
│   └── no-timber.html
├── templates
├── .gitignore
├── .stylelintrc.json
├── 404.php
├── archive.php
├── author.php
├── composer.json
├── composer.lock
├── config.json
├── footer.php
├── functions.php
├── gulpfile.js
├── header.php
├── index.php
├── package.json
├── page.php
├── README.md
├── screenshot.png
├── search.php
├── sidebar.php
├── single.php
└── style.css
```

## Gulp tasks

Use local Gulp to run tasks. Running yarn istall will install Gulp locally and we can use npx to run this.

`./node_modules/.bin/gulp css` - Build CSS bundle
OR
`npx gulp css` - Build CSS bundle

`./node_modules/.bin/gulp js` - Build JavaScript bundle
OR
`npx gulp js` - Build JavaScript bundle

`./node_modules/.bin/gulp images` - Process image assets
OR
`npx gulp images` - Process image assets

`./node_modules/.bin/gulp wppot` - Generate pot-files for WordPress localization
OR
`npx gulp wppot` - Generate pot-files for WordPress localization

`./node_modules/.bin/gulp dev` - Run "watch" task
OR
`npx gulp dev` - Run "watch" task

## Read more

* [Timber Documentation](https://timber.github.io/docs/)
* [Twig Documentation & Reference](https://twig.symfony.com/doc/3.x/)
* [The Twig for Timber Cheatsheet by Lara Schenck](http://notlaura.com/the-twig-for-timber-cheatsheet/)