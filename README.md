# PressForward Turnkey Theme 
This repository contains a Turnkey Wordpress theme optimized for use with the [PressForward Plugin](http://www.pressforward.org). 

## Features
+ A responsive slider
+ Redux Options Framework
+ Flat one-page design will multiple places to display recent posts from categories
+ Designed to optimize the [PressForward](http://www.pressforward.org) plugin and display content in a useful way for [PressForward publications](http://www.pressforward.org/partners)
 
## Theme Requirements
This standalone wordpress theme is based on [Brew](https://github.com/slightlyoffbeat/brew), a Bootstrap and HTML5 Wordpress theme by Dan Wild. 

## Installation
_**Please note:**_ There have been reports of a known issue with uploading the theme due to the size of the file. If you get an error regarding the upload size limit and downloaded the theme prior to July 13th, please re-download the theme and try again. If you continue to get an error, please upload the theme via your ftp client or clone the theme into your wp-content/themes directory using git rather than through the WordPress theme upload option. We are working on a fix for this and will update the installation instruction when this issue has been resolved. While PHP sometimes prevents the upload of the theme due to its size, uploading the theme through FTP still works and the theme will still be fully functional. 

This theme is not avaialable in the WordPress Directory but it is functional and can be installed by downloading or cloning this repository into the Themes directory of your WordPress install. Setup can be completed by using the PressForward Options Panel in the WordPress dashboard.  [See the setup guide](https://github.com/PressForward/PressForward-TurnKey-Theme/wiki) for more information on how to setup the theme. 

##Changelog
###Version 1.0
* Resolves error where the tracking code was not inserted into the footer of the site. 
* Adds ability to turn on and off homepage blocks from the PressForward Options panel. 
* Adds options to change the background color of individual blocks and the color of text and links on the homepage. 
* Adds option to control the number of columns on several blocks as well as the number of recent posts on the slider. 
* Fixes bug where "by" showed up regardless of what option was selected for the display of the author. 
* Adds ability to use text rather than a logo image file. 
* Implements various styling changes to the slider to prevent long titles from pushing the readmore button off the screen.
* Generalizes css classes on the homepage.

## Support
Setup instructions and details on the theme's functionality can be found on our [wiki](https://github.com/PressForward/PressForward-TurnKey-Theme/wiki). For more information about this theme contact the PressForward team at info@pressforward.org or submit an issue to this repository.  
 
Links to Documentation for Libraries Used and References: 
+ [FontAwesome](http://fortawesome.github.io/Font-Awesome/)
+ [Bones](http://themble.com/bones/)
+ [Bootstrap](http://getbootstrap.com/)
+ [Liquid Slider](http://liquidslider.com/)

