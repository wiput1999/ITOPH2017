@component('mail::message')
# สวัสดี คุณ {{$name}},

เราได้รับข้อมูลการลงทะเบียนเข้าแข่งขัน การประกวดโครงงานเทคโนโลยีสารสนเทศระดับมัธยมศึกษาตอนปลาย ของทีม {{ $data->team_name }} เรียบร้อยแล้ว โดยมีข้อมูลดังนี้

@component('mail::table')
| คอลัมน์         | ข้อมูล          |
| ------------- | ------------- |
| อาจารย์ควบคุมทีม | {{$data["teacher_prefix"]}} {{$data["teacher_name"]}} {{$data["teacher_surname"]}} |
| เบอร์โทรศัพท์อาจารย์ควบคุมทีม | {{$data["teacher_phone"]}} |
| E-mail อาจารย์ควบคุมทีม | {{$data["teacher_email"]}} |
| โรงเรียน       | {{$data["school"]}} |
    @php
        $count = 1
    @endphp
    @foreach($data->member as $member)
        | ชื่อสมาชิก คนที่ {{$count}} | {{$member["prefix"]}} {{$member["name"]}} {{$member["surname"]}} |
        @php
            $count++
        @endphp
    @endforeach
@endcomponent
@endcomponent
