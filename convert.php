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
 * Resets the emoticons mapping into the default value
 *
 * @package    local_emoji
 * @copyright  Moodle DevCamp 2018 {@link https://www.moodle-dach.eu}
 * @author     Andreas Grähn (andreas.graehn@edu-werkstatt.de)
 * @author     Amr Hourani (amr.hourani@id.ethz.ch)
 * @author     Andreas Hruska (andreas.hruska@edaktik.at)
 * @author     Luca Bösch (luca.boesch@bfh.ch)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require('../../config.php');
require_once($CFG->libdir.'/adminlib.php');

admin_externalpage_setup('resetemoticons');

$confirm = optional_param('confirm', false, PARAM_BOOL);
$event = optional_param('id', 's', PARAM_RAW);

if ($event == 's') {
    $eventstr = 'usestandard';
} else {
    $eventstr = 'usefancy';
}

/**
 * Helper method preparing the stdClass with the emoticon properties
 *
 * @param string|array $text or array of strings
 * @param string $imagename to be used by {@link pix_emoticon}
 * @param string $altidentifier alternative string identifier, null for no alt
 * @param string $altcomponent where the alternative string is defined
 * @param string $imagecomponent to be used by {@link pix_emoticon}
 * @return stdClass
 */
function prepare_emoticon_object($text, $imagename, $altidentifier = null,
                                           $altcomponent = 'core_pix', $imagecomponent = 'local_emoji') {
    return (object)array(
        'text'           => $text,
        'imagename'      => $imagename,
        'imagecomponent' => $imagecomponent,
        'altidentifier'  => $altidentifier,
        'altcomponent'   => $altcomponent,
    );
}

/**
* Helper method preparing the stdClass with the emoticon properties
*
* @param string|array $text or array of strings
* @param string $imagename to be used by {@link pix_emoticon}
* @param string $altidentifier alternative string identifier, null for no alt
* @param string $altcomponent where the alternative string is defined
* @param string $imagecomponent to be used by {@link pix_emoticon}
* @return stdClass
*/
function default_emoticons($e) {
    return array(
        prepare_emoticon_object(":-)", $e.'/smiley', 'smiley'),
        prepare_emoticon_object(":)", $e.'/smiley', 'smiley'),
        prepare_emoticon_object(":-D", $e.'/biggrin', 'biggrin'),
        prepare_emoticon_object(";-)", $e.'/wink', 'wink'),
        prepare_emoticon_object(":-/", $e.'/mixed', 'mixed'),
        prepare_emoticon_object("V-.", $e.'/thoughtful', 'thoughtful'),
        prepare_emoticon_object(":-P", $e.'/tongueout', 'tongueout'),
        prepare_emoticon_object(":-p", $e.'/tongueout', 'tongueout'),
        prepare_emoticon_object("B-)", $e.'/cool', 'cool'),
        prepare_emoticon_object("^-)", $e.'/approve', 'approve'),
        prepare_emoticon_object("8-)", $e.'/wideeyes', 'wideeyes'),
        prepare_emoticon_object(":o)", $e.'/clown', 'clown'),
        prepare_emoticon_object(":-(", $e.'/sad', 'sad'),
        prepare_emoticon_object(":(", $e.'/sad', 'sad'),
        prepare_emoticon_object("8-.", $e.'/shy', 'shy'),
        prepare_emoticon_object(":-I", $e.'/blush', 'blush'),
        prepare_emoticon_object(":-X", $e.'/kiss', 'kiss'),
        prepare_emoticon_object("8-o", $e.'/surprise', 'surprise'),
        prepare_emoticon_object("P-|", $e.'/blackeye', 'blackeye'),
        prepare_emoticon_object("8-[", $e.'/angry', 'angry'),
        prepare_emoticon_object("(grr)", $e.'/angry', 'angry'),
        prepare_emoticon_object("xx-P", $e.'/dead', 'dead'),
        prepare_emoticon_object("|-.", $e.'/sleepy', 'sleepy'),
        prepare_emoticon_object("}-]", $e.'/evil', 'evil'),
        prepare_emoticon_object("(h)", $e.'/heart', 'heart'),
        prepare_emoticon_object("(heart)", $e.'/heart', 'heart'),
        prepare_emoticon_object("(y)", $e.'/yes', 'yes', 'core'),
        prepare_emoticon_object("(n)", $e.'/no', 'no', 'core'),
        prepare_emoticon_object("(martin)", $e.'/martin', 'martin'),
        prepare_emoticon_object("( )", $e.'/egg', 'egg'),
    );
}


if (!$confirm or !confirm_sesskey()) {
    echo $OUTPUT->header();
    echo $OUTPUT->heading(get_string('confirmation', 'admin'));
    echo $OUTPUT->confirm(get_string($eventstr, 'local_emoji'),
            new moodle_url(new moodle_url('/local/emoji/convert.php'), array('confirm' => 1, 'id' => $event)),
        new moodle_url('/admin/settings.php', array('section' => 'local_emoji')));
    echo $OUTPUT->footer();
    die();
}

set_config('emoticons', json_encode(default_emoticons($event)));
redirect(new moodle_url('/admin/settings.php', array('section' => 'local_emoji')));
