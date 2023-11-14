# 2.0.0 (`2023111401`)

## ภาษาไทย
- รองรับมูเดิลเวอร์ชัน 3.9 ถึง 4+
- คลาสสำหรับปฏิทินเปลี่ยนให้สืบทอดจากเกรกอเรียนแทนที่ต้องเขียนใหม่ทั้งหมด
- ตัดการตั้งค่าสำหรับผู้ดูแลระบบออก รูปแบบวันที่ให้จัดการผ่านสตริงของภาษาที่กำหนดเอง
- เพิ่มการทดสอบโคดอัตโนมัติผ่าน PHPUnits
- เพิ่มการทดสอบและเผยแพร่โดยอัตโนมัติผ่าน GitHub Actions

## English
- Support from Moodle 3.9 (LTS) to Moodle 4+.
- Calendar structure class to extend Gregorian calendar type instead of default base type and implementing from scratch.
- Removed admin settings, all customised date formats should be done through custom language strings.
- Added PHPUnits.
- Added GitHub Action workflows for automation pull request check and releasing.
