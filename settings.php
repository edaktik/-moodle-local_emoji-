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
 * Default alternative texts for Emoji emoticon images
 *
 * @package    local
 * @subpackage emoji
 * @copyright  Moodle DevCamp 2018 {@link https://www.moodle-dach.eu}
 * @author     Andreas Grähn (andreas.graehn@edu-werkstatt.de)
 * @author     Amr Hourani (amr.hourani@id.ethz.ch)
 * @author     Andreas Hruska (andreas.hruska@edaktik.at)
 * @author     Loca Bösch (luca.boesch@bfh.ch)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// Ensure the configurations for this site are set
if ( $hassiteconfig ){
    
    // Create the new settings page
    $settings = new admin_settingpage( 'local_emoji', 'Emoji' );
    
    $standardlink = '<a href="'.new moodle_url('/local/emoji/convert.php?id=s').'">'.new lang_string('usestandard', 'local_emoji').'</a>';
    
    $settings->add(new admin_setting_heading('usestandard', new lang_string('usestandard', 'local_emoji'), $standardlink));
    
    
    $fancylink = '<a href="'.new moodle_url('/local/emoji/convert.php?id=f').'">'.new lang_string('usefancy', 'local_emoji').'</a>';
    
    $settings->add(new admin_setting_heading('usefancy', new lang_string('usefancy', 'local_emoji'), $fancylink));
    
    $resetlink = '<a href="resetemoticons.php">'.new lang_string('emoticonsreset', 'admin').'</a>';
    
    $settings->add(new admin_setting_heading('configintro', new lang_string('emoticonsreset', 'admin'), $resetlink));
    

    $ADMIN->add('appearance', $settings);
    
    // Create
    $ADMIN->add( 'localplugins', $settings );
}
