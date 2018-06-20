Enjoy Emoji smilies for Moodle
========================

This plugin for Moodle 3.x provides two sets of SVG emoticons in order to replace
the standard GIF emoticons. It will modify the configuration in HTML Settings
 in order to use the icons provided by this plugin by changing "image component"
 to local_emoji and "image name" to s/name f/name or revert back to standard
 Moodle images. If you want to create your own SVG emoticon set the sourcefiles
 are provided as AI template files in the doc directory of this plugin.
 The smiley pictures have been released into the public domain by their author.


This project has been implemented on the Moodle DevCamp 2018
{@link https://www.moodle-dach.eu} by the following authors:

Andreas Grähn (andreas.graehn@edu-werkstatt.de)
Amr Hourani (amr.hourani@id.ethz.ch)
Andreas Hruska (andreas.hruska@edaktik.at)
Luca Bösch (luca.boesch@bfh.ch)

Installation
------------

1. Copy the plugin into /local/emoji/ folder of your Moodle 3.0 installation
2. Visit the Site administration home page to install the plugin
3. Go to Site administration > Appearance > HTML settings and register the
   smilies from this plugin you want to use (see details below).
4. Make sure you have enabled 'Display emoticons as images' filter

How to register emojis from this plugin
----------------------------------------

This plugin provides two sets of emojis
- standard (s)
- fancy (f)

To use one of the emoji sets from this plugin visit administration > local > emoji
and select the desired iconset or revert to default Moodle settings.
