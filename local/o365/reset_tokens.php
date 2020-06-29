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
 * @package local_o365
 * @author Lai Wei <lai.wei@enovation.ie>
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @copyright (C) 2020 onwards Microsoft, Inc. (http://microsoft.com/)
 */

require_once(__DIR__.'/../../config.php');
require_once($CFG->dirroot . '/local/o365/lib.php');
require_login();
require_capability('moodle/site:config', context_system::instance());

$confirm = optional_param('config', null, PARAM_INT);

$configuraitonpageurl = new moodle_url('/admin/settings.php', ['section' => 'local_o365', 's_local_o365_tabs' => 0]);
if ($confirm) {
    local_o365_reset_tokens();
    redirect($configuraitonpageurl, get_string('settings_reset_tokens_done', 'local_o365'));
} else {
    echo $OUTPUT->header();
    $confirmurl = new moodle_url('/local/o365/reset_tokens/php', ['confirm' => 1]);
    echo $OUTPUT->confirm(get_string('settings_confirm_reset_tokens', 'local_o365'), $confirmurl, $configuraitonpageurl);
    echo $OUTPUT->footer();
}


