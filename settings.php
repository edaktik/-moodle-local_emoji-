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

// Ensure the configurations for this site are set
if ( $hassiteconfig ){
    
    // Create the new settings page
    // - in a local plugin this is not defined as standard, so normal $settings->methods will throw an error as
    // $settings will be NULL
    $settings = new admin_settingpage( 'local_emoji',  new lang_string('emojis', 'local_emoji'));
    
    // Create
    $ADMIN->add( 'localplugins', $settings );
    
    $ADMIN->add(new admin_setting_emoticons());
    $ADMIN->add('appearance', new admin_externalpage('resetemoticons', new lang_string('emoticonsreset', 'admin'),
            new moodle_url('/admin/resetemoticons.php'), 'moodle/site:config', true));
  
}
