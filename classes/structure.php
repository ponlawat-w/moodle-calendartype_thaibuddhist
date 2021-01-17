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
 * Thai Buddhist Calendar
 *
 * @package calendartype_thaibuddhist
 * @copyright 2017 Ponlawat Weerapanpisit (ponlawat_w@cmu.ac.th)
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace calendartype_thaibuddhist;
use core_calendar\type_base;

defined('MOODLE_INTERNAL') || die();

/**
 * Thai Buddhist Calendar
 *
 * @package calendartype_thaibuddhist
 * @copyright 2017 Ponlawat Weerapanpisit (ponlawat_w@cmu.ac.th)
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class structure extends type_base {

    /**
     * Month names
     * string "months" is read and extracted to array by delimiter ";"
     * index 0 has to be left blank, 1 is January and so on
     *
     * @var array|bool
     */
    private static $months = false;

    /**
     * Month short names
     * string "shortmonths" is read and extracted to array by delimiter ";"
     * index 0 has to be left blank, 1 is January and so on
     *
     * @var array|bool
     */
    private static $shortmonths = false;

    /**
     * Day names
     * string "days" is read and extracted to array by delimiter ";"
     * index 0 is Sunday and so on
     *
     * @var array|bool
     */
    private static $days = false;

    /**
     * Day short names
     * string "shortdays" is read and extracted to array by delimiter ";"
     * index 0 is Sunday and so on
     *
     * @var array|bool
     */
    private static $shortdays = false;

    /**
     * structure constructor.
     * @throws \coding_exception
     */
    public function __construct() {
        $stringmanager = get_string_manager();
        if (!self::$months && $stringmanager->string_exists('months', 'calendartype_thaibuddhist')) {
            $months = explode(';', get_string('months', 'calendartype_thaibuddhist'));
            if (count($months) == 13) {
                self::$months = $months;
            }
        }
        if (!self::$shortmonths && $stringmanager->string_exists('shortmonths', 'calendartype_thaibuddhist')) {
            $shortmonths = explode(';', get_string('shortmonths', 'calendartype_thaibuddhist'));
            if (count($shortmonths) == 13) {
                self::$shortmonths = $shortmonths;
            }
        }
        if (!self::$days && $stringmanager->string_exists('days', 'calendartype_thaibuddhist')) {
            $days = explode(';', get_string('days', 'calendartype_thaibuddhist'));
            if (count($days) == 7) {
                self::$days = $days;
            }
        }
        if (!self::$shortdays && $stringmanager->string_exists('shortdays', 'calendartype_thaibuddhist')) {
            $shortdays = explode(';', get_string('shortdays', 'calendartype_thaibuddhist'));
            if (count($shortdays) == 7) {
                self::$shortdays = $shortdays;
            }
        }
    }

    /**
     * Returns the name of the calendar.
     *
     * This is the non-translated name, usually just
     * the name of the folder.
     *
     * @return string the calendar name
     */
    public function get_name() {
        return 'thaibuddhist';
    }

    /**
     * Returns a list of all the possible days for all months.
     *
     * This is used to generate the select box for the days
     * in the date selector elements. Some months contain more days
     * than others so this function should return all possible days as
     * we can not predict what month will be chosen (the user
     * may have JS turned off and we need to support this situation in
     * Moodle).
     *
     * @return array the days
     */
    public function get_days() {
        $days = array();

        for ($i = 1; $i <= 31; $i++) {
            $days[$i] = $i;
        }

        return $days;
    }

    /**
     * Returns a list of all the names of the months.
     *
     * @return array the month names
     */
    public function get_months() {
        $months = array();

        $date = new \DateTime('@1263556800');
        $date->setTimezone(new \DateTimeZone('UTC'));
        for ($i = 1; $i <= 12; $i++) {
            $date->setDate(2000, $i, 15);
            $months[$i] = self::$months ? self::$months[$i] : userdate($date->getTimestamp(), '%B', 'UTC');
        }

        return $months;
    }

    /**
     * Returns the minimum year for the calendar.
     *
     * @return int The minimum year
     */
    public function get_min_year() {
        return 2484;
    }

    /**
     * Returns the maximum year for the calendar
     *
     * @return int The maximum year
     */
    public function get_max_year() {
        return date('Y') + 593;
    }

    /**
     * Returns an array of years.
     *
     * @param int $minyear
     * @param int $maxyear
     * @return array the years
     */
    public function get_years($minyear = null, $maxyear = null) {
        if (is_null($minyear)) {
            $minyear = $this->get_min_year();
        }

        if (is_null($maxyear)) {
            $maxyear = $this->get_max_year();
        }

        $displaybe = get_config('calendartype_thaibuddhist', 'displaybe');

        $years = array();
        for ($i = $minyear; $i <= $maxyear; $i++) {
            $years[$i] = $displaybe ? get_string('year', 'calendartype_thaibuddhist', $i) : $i;
        }

        return $years;
    }

    /**
     * Returns a multidimensional array with information for day, month, year
     * and the order they are displayed when selecting a date.
     * The order in the array will be the order displayed when selecting a date.
     * Override this function to change the date selector order.
     *
     * @param int $minyear The year to start with
     * @param int $maxyear The year to finish with
     * @return array Full date information
     */
    public function get_date_order($minyear = null, $maxyear = null) {
        $dateinfo = array();
        $dateinfo['day'] = $this->get_days();
        $dateinfo['month'] = $this->get_months();
        $dateinfo['year'] = $this->get_years($minyear, $maxyear);

        return $dateinfo;
    }

    /**
     * Returns the number of days in a week.
     *
     * @return int the number of days
     */
    public function get_num_weekdays() {
        return 7;
    }

    /**
     * Returns an indexed list of all the names of the weekdays.
     *
     * The list starts with the index 0. Each index, representing a
     * day, must be an array that contains the indexes 'shortname'
     * and 'fullname'.
     *
     * @return array array of days
     */
    public function get_weekdays() {
        return array(
            0 => array(
                'shortname' => get_string('sun', 'calendar'),
                'fullname' => get_string('sunday', 'calendar')
            ),
            1 => array(
                'shortname' => get_string('mon', 'calendar'),
                'fullname' => get_string('monday', 'calendar')
            ),
            2 => array(
                'shortname' => get_string('tue', 'calendar'),
                'fullname' => get_string('tuesday', 'calendar')
            ),
            3 => array(
                'shortname' => get_string('wed', 'calendar'),
                'fullname' => get_string('wednesday', 'calendar')
            ),
            4 => array(
                'shortname' => get_string('thu', 'calendar'),
                'fullname' => get_string('thursday', 'calendar')
            ),
            5 => array(
                'shortname' => get_string('fri', 'calendar'),
                'fullname' => get_string('friday', 'calendar')
            ),
            6 => array(
                'shortname' => get_string('sat', 'calendar'),
                'fullname' => get_string('saturday', 'calendar')
            ),
        );
    }

    /**
     * Returns the index of the starting week day.
     *
     * This may vary, for example some may consider Monday as the start of the week,
     * where as others may consider Sunday the start.
     *
     * @return int
     */
    public function get_starting_weekday() {
        global $CFG;

        if (isset($CFG->calendar_startwday)) {
            $firstday = $CFG->calendar_startwday;
        } else {
            $firstday = get_string('firstdayofweek', 'langconfig');
        }

        if (!is_numeric($firstday)) {
            $startingweekday = CALENDAR_DEFAULT_STARTING_WEEKDAY;
        } else {
            $startingweekday = intval($firstday) % 7;
        }

        return get_user_preferences('calendar_startwday', $startingweekday);
    }

    /**
     * Returns the index of the weekday for a specific calendar date.
     *
     * @param int $year
     * @param int $month
     * @param int $day
     * @return int
     */
    public function get_weekday($year, $month, $day) {
        return intval(date('w', mktime(12, 0, 0, $month, $day, $year)));
    }

    /**
     * Returns the number of days in a given month.
     *
     * @param int $year
     * @param int $month
     * @return int the number of days
     */
    public function get_num_days_in_month($year, $month) {
        return intval(date('t', mktime(0, 0, 0, $month, 1, $year)));
    }

    /**
     * Get the previous month.
     *
     * If the current month is January, it will get the last month of the previous year.
     *
     * @param int $year
     * @param int $month
     * @return array previous month and year
     */
    public function get_prev_month($year, $month) {
        if ($month == 1) {
            return array(12, $year - 1);
        } else {
            return array($month - 1, $year);
        }
    }

    /**
     * Get the next month.
     *
     * If the current month is December, it will get the first month of the following year.
     *
     * @param int $year
     * @param int $month
     * @return array the following month and year
     */
    public function get_next_month($year, $month) {
        if ($month == 12) {
            return array(1, $year + 1);
        } else {
            return array($month + 1, $year);
        }
    }

    /**
     * Returns a formatted string that represents a date in user time.
     *
     * Returns a formatted string that represents a date in user time
     * <b>WARNING: note that the format is for strftime(), not date().</b>
     * Because of a bug in most Windows time libraries, we can't use
     * the nicer %e, so we have to use %d which has leading zeroes.
     * A lot of the fuss in the function is just getting rid of these leading
     * zeroes as efficiently as possible.
     *
     * If parameter fixday = true (default), then take off leading
     * zero from %d, else maintain it.
     *
     * @param int $time the timestamp in UTC, as obtained from the database
     * @param string $format strftime format
     * @param int|float|string $timezone the timezone to use
     *        {@link http://docs.moodle.org/dev/Time_API#Timezone}
     * @param bool $fixday if true then the leading zero from %d is removed,
     *        if false then the leading zero is maintained
     * @param bool $fixhour if true then the leading zero from %I is removed,
     *        if false then the leading zero is maintained
     * @return string the formatted date/time
     */
    public function timestamp_to_date_string($time, $format, $timezone, $fixday, $fixhour) {
        global $CFG;

        $time = (int)$time; // Moodle allows rubbish in input...

        if (empty($format)) {
            $format = get_string('strftimedaydatetime', 'langconfig');
        }

        if (get_config('calendartype_thaibuddhist', 'force24h')) {
            $format = str_replace('%I:%M', '%H:%M', $format);
            $format = str_replace('%p', '', $format);
        }

        if (get_config('calendartype_thaibuddhist', 'rewritethaiformat') && current_language() == 'th') {
            $format = str_replace('%A,', '', $format);
            $format = str_replace('%a,', '', $format);
            $format = str_replace('%d%b', '%d %b', $format);
            $format = str_replace('%d%B', '%d %B', $format);

            if (strpos($format, '%H:%M:%S')) {
                $format = str_replace('%H:%M:%S', get_string('time', 'calendartype_thaibuddhist', '%H:%M:%S'), $format);
            } else {
                $format = str_replace('%H:%M', get_string('time', 'calendartype_thaibuddhist', '%H:%M'), $format);
            }
        }

        if (self::$months) {
            $format = str_replace('%B', self::$months[(int)strftime('%m', $time)], $format);
        }
        if (self::$shortmonths) {
            $format = str_replace('%b', self::$shortmonths[(int)strftime('%m', $time)], $format);
        }
        if (self::$days) {
            $format = str_replace('%A', self::$days[(int)strftime('%w', $time)], $format);
        }
        if (self::$shortdays) {
            $format = str_replace('%a', self::$shortdays[(int)strftime('%w', $time)], $format);
        }

        if (!empty($CFG->nofixday)) { // Config.php can force %d not to be fixed.
            $fixday = false;
        } else if ($fixday) {
            $formatnoday = str_replace('%d', 'DD', $format);
            $fixday = ($formatnoday != $format);
            $format = $formatnoday;
        }

        // Note: This logic about fixing 12-hour time to remove unnecessary leading
        // zero is required because on Windows, PHP strftime function does not
        // support the correct 'hour without leading zero' parameter (%l).
        if (!empty($CFG->nofixhour)) {
            // Config.php can force %I not to be fixed.
            $fixhour = false;
        } else if ($fixhour) {
            $formatnohour = str_replace('%I', 'HH', $format);
            $fixhour = ($formatnohour != $format);
            $format = $formatnohour;
        }

        if (get_config('calendartype_thaibuddhist', 'displaybe')) {
            $year = strftime('%Y', $time) + 543;

            $format = str_replace('%Y',
                get_string('year', 'calendartype_thaibuddhist', $year),
                $format);
            $format = str_replace('%y',
                get_string('year', 'calendartype_thaibuddhist', substr($year, strlen($year) - 2, 2)),
                $format);
        } else {
            $format = str_replace('%Y', strftime('%Y', $time) + 543, $format);
            $format = str_replace('%y', substr(strftime('%Y', $time) + 543, strlen(strftime('%Y', $time) + 543) - 2, 2), $format);
        }

        $format = trim($format);
        $datestring = date_format_string($time, $format, $timezone);

        date_default_timezone_set(\core_date::get_user_timezone($timezone));

        if ($fixday) {
            $daystring  = ltrim(str_replace(array(' 0', ' '), '', strftime(' %d', $time)));
            $datestring = str_replace('DD', $daystring, $datestring);
        }
        if ($fixhour) {
            $hourstring = ltrim(str_replace(array(' 0', ' '), '', strftime(' %I', $time)));
            $datestring = str_replace('HH', $hourstring, $datestring);
        }

        \core_date::set_default_server_timezone();

        return $datestring;
    }

    /**
     * Given a $time timestamp in GMT (seconds since epoch), returns an array that
     * represents the date in user time.
     *
     * @param int $time Timestamp in GMT
     * @param float|int|string $timezone offset's time with timezone, if float and not 99, then no
     *        dst offset is applied {@link http://docs.moodle.org/dev/Time_API#Timezone}
     * @return array an array that represents the date in user time
     */
    public function timestamp_to_date_array($time, $timezone = 99) {
        $datearray = usergetdate($time, $timezone);
        $datearray['year'] += 543;
        return $datearray;
    }

    /**
     * Provided with a day, month, year, hour and minute in a specific
     * calendar type convert it into the equivalent Gregorian date.
     *
     * In this function we don't need to do anything except pass the data
     * back as an array. This is because the date received is Gregorian.
     *
     * @param int $year
     * @param int $month
     * @param int $day
     * @param int $hour
     * @param int $minute
     * @return array the converted date
     */
    public function convert_from_gregorian($year, $month, $day, $hour = 0, $minute = 0) {
        $date = array();
        $date['year'] = $year + 543;
        $date['month'] = $month;
        $date['day'] = $day;
        $date['hour'] = $hour;
        $date['minute'] = $minute;

        return $date;
    }

    /**
     * Provided with a day, month, year, hour and minute in a specific
     * calendar type convert it into the equivalent Gregorian date.
     *
     * In this function we don't need to do anything except pass the data
     * back as an array. This is because the date received is Gregorian.
     *
     * @param int $year
     * @param int $month
     * @param int $day
     * @param int $hour
     * @param int $minute
     * @return array the converted date
     */
    public function convert_to_gregorian($year, $month, $day, $hour = 0, $minute = 0) {
        $date = array();
        $date['year'] = $year - 543;
        $date['month'] = $month;
        $date['day'] = $day;
        $date['hour'] = $hour;
        $date['minute'] = $minute;

        return $date;
    }

    /**
     * This return locale for windows os.
     *
     * @return string locale
     */
    public function locale_win_charset() {
        return get_string('localewincharset', 'langconfig');
    }
}
