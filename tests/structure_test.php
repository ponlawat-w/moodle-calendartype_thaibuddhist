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
 * Thai Buddhist Calendar Test
 *
 * @package calendartype_thaibuddhist
 * @copyright 2023 Ponlawat Weerapanpisit (ponlawat_w@cmu.ac.th)
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace calendartype_thaibuddhist;

/**
 * Calendar type unit tests
 */
class structure_test extends \advanced_testcase {

    protected function setUp(): void {
        $this->setTimezone('Etc/UTC', 'Etc/UTC');
    }

    /**
     * Initialise a user with specific timezone
     *
     * @param string|int $timezone
     * @return void
     */
    private function inituserwithtimezone($timezone) {
        $this->setUser(
            $this->getDataGenerator()->create_user([
                'calendartype' => 'thaibuddhist',
                'timezone' => $timezone,
            ])
        );
    }

    /**
     * Get calendar instance
     *
     * @return \core_calendar\type_base
     */
    private function get_calendar() {
        return \core_calendar\type_factory::get_calendar_instance();
    }

    /**
     * Test getting calendar type name
     * @covers \calendartype_thaibuddhist\structure::get_name
     */
    public function test_get_name() {
        $this->resetAfterTest(true);
        $this->inituserwithtimezone('Asia/Bangkok');
        $this->assertEquals('thaibuddhist', $this->get_calendar()->get_name());
    }

    /**
     * Test converting timestamp to date string
     * @covers \calendartype_thaibuddhist\structure::test_timestamp_to_date_string
     */
    public function test_timestamp_to_date_string() {
        $this->resetAfterTest(true);

        $newyeartimestamp = 1704056400;

        $this->inituserwithtimezone(99);
        $this->assertEquals('2566', userdate(1672531200, '%Y'), 'Full BE year on UTC timezone');
        $this->assertEquals('65', userdate(1672531199, '%y'), 'Half BE year on UTC timezone');
        $this->assertEquals('2566', userdate($newyeartimestamp, '%Y'), 'Full BE year on UTC timezone');

        $this->inituserwithtimezone('Asia/Bangkok');
        $this->assertEquals('2566', userdate(1704041999, '%Y'), 'Full BE year on local timezone');
        $this->assertEquals('2567', userdate(1704042000, '%Y'), 'Full BE year on local timezone');
        $this->assertEquals('67', userdate(1704045600, '%y'), 'Half BE year on local timezone');
        $this->assertEquals('67', userdate(1704067200, '%y'), 'Half BE year on local timezone');
        $this->assertEquals('2567', userdate($newyeartimestamp, '%Y'), 'Full BE year on local timezone');
    }

    /**
     * Test converting timestamp to date array
     * @covers \calendartype_thaibuddhist\structure::test_timestamp_to_date_array
     */
    public function test_timestamp_to_date_array() {
        global $USER;

        $this->resetAfterTest(true);

        $this->inituserwithtimezone(99);
        $timestamp = 1672704000;
        $date = $this->get_calendar()->timestamp_to_date_array($timestamp, $USER->timezone);
        $this->assertEquals('3', $date['mday']);
        $this->assertEquals('1', $date['mon']);
        $this->assertEquals('2566', $date['year']);

        $this->inituserwithtimezone('Asia/Bangkok');
        $timestamp = 1704045600;
        $date = $this->get_calendar()->timestamp_to_date_array($timestamp, $USER->timezone);
        $this->assertEquals('1', $date['hours']);
        $this->assertEquals('0', $date['minutes']);
        $this->assertEquals('0', $date['seconds']);
        $this->assertEquals('1', $date['mday']);
        $this->assertEquals('1', $date['mon']);
        $this->assertEquals('2567', $date['year']);
    }

    /**
     * Test converting from gregorian
     * @covers \calendartype_thaibuddhist\structure::test_convert_from_gregorian
     */
    public function test_convert_from_gregorian() {
        $this->resetAfterTest(true);
        $this->inituserwithtimezone('Asia/Bangkok');

        $result = $this->get_calendar()->convert_from_gregorian(2023, 12, 31, 23, 59);
        $this->assertEquals('2566', $result['year']);
        $this->assertEquals('12', $result['month']);
        $this->assertEquals('31', $result['day']);
    }

    /**
     * Test converting to gregorian
     * @covers \calendartype_thaibuddhist\structure::test_convert_to_gregorian
     */
    public function test_convert_to_gregorian() {
        $this->resetAfterTest(true);
        $this->inituserwithtimezone('Asia/Bangkok');

        $gregorian = $this->get_calendar()->convert_to_gregorian(2567, 1, 1, 0, 0);
        $this->assertEquals('2024', $gregorian['year']);
        $this->assertEquals('1', $gregorian['month']);
        $this->assertEquals('1', $gregorian['day']);
    }
}
