
@component('mail::message')
    # สวัสดี คุณ {{ $data->teacher_name }},

    เราได้รับข้อมูลการลงทะเบียนเข้าร่วมงานของคุณ {{ $data->team_name }} เรียบร้อยแล้ว โดยมีข้อมูลดังนี้

    @component('mail::table')
        | คอลัมน์         | ข้อมูล          |
        | ------------- | ------------- |
        | ชื่อ - นามสกุล   | {{$data["prefix"]}} {{$data["name"]}} {{$data["surname"]}} |
        | อายุ          | {{$data["อาชีพ"]}} |
        | อาชีพ          | {{$data["career"]}} |
        | จังหวัด         | {{$data["province"]}} |
        | E-mail Address| {{$data["email"]}} |
    @endcomponent

    {{$data}}
@endcomponent
