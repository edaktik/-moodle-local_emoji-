<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Local plugin providing a custom set of emoticons for Moodle
 *
 * The images in /pix folder are public domain, see README.txt for more info
 *
 * @package    local
 * @subpackage emoji
 * @copyright  2018 Moodle DACH 2018
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();
require_once('../config.php');
// Ensure the configurations for this site are set
if ( $hassiteconfig ){
    
    $images = array("angry", "approve", "biggrin", "blackeye", "blush", "clown", "cool", "dead", "egg", "evil", "heart", "kiss", "martin", "mixed", "no", "sad", "shy", "sleepy", "smiley", "surprise", "thoughtful", "tongueout", "wideeyes", "wink", "yes");
    
    
    // Create the new settings page
    $settings = new admin_settingpage( 'local_emoji', 'Emoji' );
    
    $standardlink = '<a href="'.new moodle_url('/local/emoji/convert.php?id=s').'">'.new lang_string('usestandard', 'local_emoji').'</a>';
    
                   
    $standardlink .= '<br />';
    
    foreach($images as $value){
        $standardlink .= '<img src="'.new moodle_url('/local/emoji/s/'.$value.'.svg').'"> ';
    }
            
            
    $settings->add(new admin_setting_heading('usestandard', new lang_string('usestandard', 'local_emoji'), $standardlink));
    
    
    $fancylink = '<a href="'.new moodle_url('/local/emoji/convert.php?id=f').'">'.new lang_string('usefancy', 'local_emoji').'</a>';
    
    
    $fancylink.= '<br />';
    
    foreach($images as $value){
        $fancylink.= '<img src="'.new moodle_url('/local/emoji/f/'.$value.'.svg').'"> ';
    }
    
    
    
    $settings->add(new admin_setting_heading('usefancy', new lang_string('usefancy', 'local_emoji'), $fancylink));
    
    $resetlink = '<a href="resetemoticons.php">'.new lang_string('emoticonsreset', 'admin').'</a>';
    
    $settings->add(new admin_setting_heading('configintro', new lang_string('emoticonsreset', 'admin'), $resetlink));
    

    $ADMIN->add('local_emoji', $settings);
    
    // Create
    $ADMIN->add( 'localplugins', $settings );
}
