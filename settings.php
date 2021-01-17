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
 * Thai Buddhist calendar type settings.
 *
 * @package calendartype_thaibuddhist
 * @copyright 2017 Ponlawat Weerapanpisit (ponlawat_w@cmu.ac.th)
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

$settings->add(new admin_setting_configcheckbox(
    'calendartype_thaibuddhist/rewritethaiformat',
    get_string('setting_rewritethaiformat', 'calendartype_thaibuddhist'),
    get_string('setting_rewritethaiformat_description', 'calendartype_thaibuddhist'),
    1, 1, 0));

$settings->add(new admin_setting_configcheckbox(
    'calendartype_thaibuddhist/force24h',
    get_string('setting_force24h', 'calendartype_thaibuddhist'),
    get_string('setting_force24h_description', 'calendartype_thaibuddhist'),
    1, 1, 0));

$settings->add(new admin_setting_configcheckbox(
    'calendartype_thaibuddhist/displaybe',
    get_string('setting_displaybe', 'calendartype_thaibuddhist'),
    get_string('setting_displaybe_description', 'calendartype_thaibuddhist'),
    1, 1, 0));
