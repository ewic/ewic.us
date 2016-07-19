# ewic.us main site

## TESTING BACKBONE.JS

Originally I wanted to do everything in aurelia, but I got really used to Backbone.js so I'm trying it out to see how viable it is as the primary JS framework.

## Description

This is my personal site and photo gallery framework.  This is also an exercise in working with node and npm and jspm, so there might be some funkiness involved as I experiment with some fun stuff.

## Objectives

* Implement a photo gallery api that automagically manages and serves up images and thumbnails.
* Implement a site framework that hooks into the photo gallery api and makes my pictures look super cool.

## Documentation

#### Requirements

* nodeJS - http://nodejs.org
* Node Package Manager (npm) - http://npmjs.com
* JSPM - http://jspm.io

### Installation instructions

#### Install server requirements

##### Install NodeJS

Rather than use Ubuntu's repo, which is always out of date, we use Node Version Manager (nvm).  This curl script will download and run the install script for NodeJS.

``` 
curl -o- https://raw.githubusercontent.com/creationix/nvm/v0.31.1/install.sh | bash
```

##### Install Node Package Manager

NodeJS has npm installed by default, but it's often out of date.  This will update npm.

`npm install npm -g`

##### Install JSPM

`npm install jspm -g`

#### Install Node Packages

Install node packages via

`npm install`

This command must be run from the root directory as well as the app directory.  This is because the root directory is where the server.js file is located, which depends on serve-static and the /app directory is where our actual aurelia app is located.

This will install the packages listed inside `package.json`.

Install jspm packages inside app/ with `jspm install`

### Installation Notes

#### Adding more dependencies

Dependencies are added via `npm install --save <package_name>`

This adds the package to the list of dependencies and installs that package into node_modules.  You can delete it from package.json -> dependencies if you change your mind later.

## Starting the whole shebang

Install Forever

`npm install -g forever`

Run the app using Forever

`forever start server.js`

## Additional notes

### Git Setup

#### .gitignore

Git ignore specifies files and folders that git will not commit to the repository.  This is stored in `.gitignore`.

Ignoring `node_modules` and `jspm_modules` because they should be installed by all the `node install` and `jspm install` commands that were run above.

## TODO

### App

* layout
* nav
* framework
* connection to gallery

### Gallery