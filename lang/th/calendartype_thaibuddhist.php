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
 * Strings for component 'calendartype_thaibuddhist', language 'th'.
 *
 * @package calendartype_thaibuddhist
 * @copyright 2017 Ponlawat Weerapanpisit (ponlawat_w@cmu.ac.th)
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['name'] = 'พุทธศักราชไทย';
$string['pluginname'] = 'ปฏิทินแบบพุทธศักราชไทย';

$string['months'] = ';มกราคม;กุมภาพันธ์;มีนาคม;เมษายน;พฤษภาคม;มิถุนายน;กรกฎาคม;สิงหาคม;กันยายน;ตุลาคม;พฤศจิกายน;ธันวาคม';
$string['shortmonths'] = ';ม.ค.;ก.พ.;มี.ค.;เม.ย.;พ.ค.;มิ.ย.;ก.ค.;ส.ค.;ก.ย.;ต.ค.;พ.ย.;ธ.ค.';
$string['days'] = 'อาทิตย์;จันทร์;อังคาร;พุธ;พฤหัสบดี;ศุกร์;เสาร์';
$string['shortdays'] = 'อา.;จ.;อ.;พ.;พฤ.;ศ.;ส.';

$string['time'] = '{$a} น.';
$string['year'] = 'พ.ศ. {$a}';

$string['setting_rewritethaiformat'] = 'เขียนทับรูปแบบวันเวลาในภาษาไทย';
$string['setting_rewritethaiformat_description'] = 'เปลี่ยนรูปแบบการแสดงผลวันที่และเวลาของภาษาไทยที่ถูกกำหนดในไฟล์ภาษา core_langconfig (ปัญหาจากค่าเดิมของระบบคือค่าเริ่มต้นไม่มีการเว้นช่องไฟระหว่างวันที่และเดือน)';
$string['setting_force24h'] = 'บังคับใช้เวลาแบบ 24 ชั่วโมง';
$string['setting_force24h_description'] = 'เปลี่ยนให้ทั้งเว็บไซต์ใช้เวลาแบบ 24 ชั่วโมงทั้งหมด (00:00 ถึง 23:59 ไม่ใช้ AM, PM)';
$string['setting_displaybe'] = 'แสดง พ.ศ.';
$string['setting_displaybe_description'] = 'แสดงคำว่า พ.ศ. ทุกครั้ง (เช่น พ.ศ. 2559)';