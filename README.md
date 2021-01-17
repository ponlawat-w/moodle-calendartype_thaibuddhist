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

## การใช้งาน

### 1) การตั้งค่าปฏิทินรายบุคคล (ของแต่ละบัญชีผู้ใช้)
ผู้ใช้งานแต่ละบัญชีสามารถเลือกปฏิทินของตัวเองได้ ว่าต้องการแสดงผลเป็น ค.ศ. (เกรกอเรียน) หรือ พ.ศ.

**ขั้นตอนการตั้งค่า**
1. คลิกที่มุมบนขวาของหน้าจอ » ค่าที่ต้องการ » Calendar preferences
2. Preferred calendar เลือก "ปฏิทินพุธศักราชไทย"

*การตั้งค่านี้จะมีผลเฉพาะกับบัญชีตัวเองเท่านั้น หากเข้าสู่ระบบด้วยบัญชีอื่นจะยังเห็นปฏิทินเป็นแบบเดิมที่ระบบได้ตั้งไว้*

### 2) การตั้งค่าปฏิทินของระบบ
การตั้งค่านี้จะมีผลกับ*ผู้ใช้ใหม่*และ*ผู้ใช้ที่ไม่ได้เข้าสู่ระบบ*เท่านั้น ผู้ใช้ที่เคยสรา้งบัญชีแล้วจะมีการตั้งค่าตามข้อที่ 1

**ขั้นตอนการตั้งค่า**
1. ไปที่ การบริหารไซต์ » การแสดงผลของเว็บ » ปฏิทิน
2. ประเภทปฏิทิน เลือก "พุทธศักราชไทย"

*ผู้ใช้ที่เพิ่งสมัครใหม่จะแสดงผลเป็นปฏิทินตามที่เลือก อย่างไรก็ดีผู้ใช้เดิมจะไม่เปลี่ยนตามไปด้วย*

*ในการให้ผู้ใช้เดิมทั้งหมดเปลี่ยนมาใช้ พ.ศ. แบบบังคับ จำเป็นต้องแก้ที่ฐานข้อมูลโดยตรง (ยังไม่มีปลักอินในการบังคับเปลี่ยนทีละหลายคน) โดยใส่คำสั่ง SQL ดังต่อไปนี้ (`mdl_` อาจไม่เหมือนกันตามการตั้งค่าแต่ละเว็บไซต์)*
```sql
UPDATE mdl_user SET calendartype = 'thaibuddhist';
```

### 3) การตั้งค่าปฏิทินของรายวิชา
แต่ละวิชาอาจจะมีการแสดงผลปฏิทินไม่เหมือนกันได้ เช่น ในกระบวนวิชาภาษาอังกฤษอาจให้แสดงผลเป็นปฏิทิน ค.ศ. (เกรกอเรียน) แค่วิชาอื่นใช้ พ.ศ. เป็นต้น การตั้งค่าปฏิทินที่รายวิชานี้จะไม่มีผลกับค่าปฏิทินของรายบัญชีหรือของระบบ

**ขั้นตอนการตั้งค่า**
1. ไปที่รายวิชา
2. แก้ไขการตั้งค่า » การแสดงผล
3. Force calendar เลือก "พุทธศักราชไทย"

### ลำดับการแสดงผลปฏิทินของ Moodle
เนื่องจาก Moodle สามารถตั้งค่าปฏิทินได้หลายที่ ซึ่งแต่ละที่อาจมีการใช้ประเภทปฏิทินไม่เหมือนกัน โดย Moodle มีการจัดลำดับการแสดงผลดังนี้
1. หากมีการตั้งค่าปฏิทินที่*รายวิชา* ให้ใช้ประเภทปฏิทินที่รายวิชานั้นกำหนดเสมอ
2. หากไม่มีการตั้งค่าปฏิทินที่รายวิชา ให้ใช้ประเภทปฏิทินที่*บัญชีผู้ใช้กำหนด*ด้วยตัวเอง
3. หากผู้ใช้ไม่ได้เลือกประเภทปฏิทินที่กำหนด ให้ใช้ประเภทปฏิทินตาม*การตั้งค่าของระบบ*
4. หากไม่มีการตั้งค่าปฏิทินของระบบ ให้ใช้ปฏิทินแบบเกรกอเรียน (ค.ศ.) เสมอ

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

