<?php
// This file is part of Moodle - https://moodle.org/
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
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Plugin upgrade steps are defined here.
 *
 * @package     calendartype_thaibuddhist
 * @category    upgrade
 * @copyright   2023 Ponlawat Weerapanpisit <ponlawat_w@outlook.co.th>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Execute calendartype_thaibuddhist upgrade from the given old version
 *
 * @param int $oldversion
 * @return bool
 */
function xmldb_calendartype_thaibuddhist_upgrade($oldversion) {
    if ($oldversion < 2023111401) {
        unset_config('rewritethaiformat', 'calendartype_thaibuddhist');
        unset_config('force24h', 'calendartype_thaibuddhist');
        unset_config('displaybe', 'calendartype_thaibuddhist');
        upgrade_plugin_savepoint(true, 2023111401, 'calendartype', 'thaibuddhist');
    }
    return true;
}
