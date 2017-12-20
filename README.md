# moodle-calendartype_thaibuddhist (ภาษาไทย)

**English description is available below.**

ประเภทของปฏิทินบนมูเดิลสำหรับแสดงผลปีพุทธศักราช (พ.ศ.) แบบไทย

## การติดตั้ง

```
https://github.com/ponlawat-w/moodle-calendartype_thaibuddhist.git
```

1. ดาวน์โหลดไฟล์ .zip และแตกไฟล์ หรือโคลนจากกิท ไปยัง `โฟลเดอร์มูเดิลของคุณ/calendar/type/` ภายใต้ชื่อโฟลเดอร์ `thaibuddhist`

2. ตรวจสอบให้แน่ใจว่า ไฟล์ฟลักอินทั้งหมดอยู่ในโฟลเดอร์ `/calendar/type/thaibuddhist/` ไม่ใช่โฟลเดอร์ย่อยในนั้น

3. เข้าหน้ามูเดิลสำหรับผู้ดูแลระบบ ระบบจะเปิดหน้าติดตั้งปลักอินให้เองโดยอัตโนมัติ

4. หลังจากติดตั้งเสร็จ จะเป็นการตั้งค่าเริ่มต้นของปลักอิน

5. การเปลี่ยนแปลงการตั้งค่า ให้ไปที่ `การจัดการระบบ » จัดการโมดูล » ประเทภปฏิทิน (Calendar types) » ปฏิทินแบบพุทธศักราชไทย » การตั้งค่า`

## การตั้งค่า
มีตัวเลือกการตั้งค่าดังนี้

#### เขียนทับรูปแบบวันเวลาในภาษาไทย
เปลี่ยนรูปแบบการแสดงผลวันที่และเวลาของภาษาไทยที่ถูกกำหนดในไฟล์ภาษา core_langconfig หรือไม่ (ปัญหาจากค่าเดิมของระบบคือค่าเริ่มต้นไม่มีการเว้นช่องไฟระหว่างวันที่และเดือน)

#### บังคับใช้เวลาแบบ 24 ชั่วโมง
เปลี่ยนให้ทั้งเว็บไซต์ใช้เวลาแบบ 24 ชั่วโมงทั้งหมดหรือไม่ (00:00 ถึง 23:59 ไม่ใช้ AM, PM)

#### แสดง พ.ศ.
แสดงคำว่า พ.ศ. ทุกครั้งหรือไม่ (เช่น พ.ศ. 2559)

## ข้อจำกัด

การแสดงผลก่อนวันที่ 31 มีนาคม พ.ศ. 2483 จะไม่ถูกต้องตามปฏิทินราชการไทย

# moodle-calendartype_thaibuddhist (English)

## Installation

```
https://github.com/ponlawat-w/moodle-calendartype_thaibuddhist.git
```

Moodle calendar type to display date in Thai Buddhist Era

1. Download and extract .zip file or clone from GitHub to `YOUR_MOODLE_DIRECTORY/calendar/type/` under new folder named `thaibuddhist`

2. Make sure that all plugin files are in `/calendar/type/thaibuddhist` directory, not in sub-directory.

3. Log in as administrator, then Moodle should notify you to install the plugin automatically.

4. After installation, settings page will show.

5. To change settings, go to `Site Administration » Plugins » Calendar types » Thai Buddhist Calendar Type » Settings`

## Settings

The plugin can be configured by following options:

#### Overwrite format in Thai language
Overwrite date and time format in Thai language, which is originally configured in core_langconfig.

#### Force using 24-hour system
Force the entire site to use 24-hour time system

#### Display BE
Display "BE" (Buddhist Era) (e.g. 2559BE)

## Usage Limitation

Date before March, 31 2483BE (1940) will not be correctly displayed according to Official Thai Calendar System.