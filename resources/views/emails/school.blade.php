
@component('mail::message')
สวัสดี คุณ {{ $data->name }},

เราได้รับข้อมูลการลงทะเบียนเข้าร่วมงานของคุณ {{ $data->name }} เรียบร้อยแล้ว โดยมีข้อมูลดังนี้

# กรุณานำรหัสนี้ไปแสดง ณ จุดลงทะเบียนในวันงาน : {{$data->id}}

@component('mail::table')
| คอลัมน์         | ข้อมูล          |
| ------------- | ------------- |
| ชื่อ - นามสกุล   | {{$data->prefix}} {{$data->name}} {{$data->surname}} |
| อายุ           | {{$data->age}} |
| จังหวัด         | {{$data->province}} |
| E-mail Address| {{$data->email}} |
| โรงเรียน       | {{$data->school}} |
| จำนวนนักเรียน   | {{$data->follower}} |
@endcomponent
@endcomponent
