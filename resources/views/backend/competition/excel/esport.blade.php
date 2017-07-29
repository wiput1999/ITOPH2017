<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<table>
    <thead>
    <tr>
        <th>id</th>
        <th>team_name</th>
        <th>team_fb</th>
        <th>members</th>
        <th>school</th>
        <th>school_addr</th>
        <th>school_province</th>
        <th>teacher_prefix</th>
        <th>teacher_name</th>
        <th>teacher_surname</th>
        <th>teacher_phone</th>
        <th>teacher_email</th>
        <th>confirm</th>
        <th>remember</th>
        <th>created_at</th>
        <th>updated_at</th>
    </tr>
    </thead>
    <tbody>
    @foreach($datas as $data)
        <tr>
            <td>{{$data->id}}</td>
            <td>{{$data->team_name}}</td>
            <td>{{$data->team_fb}}</td>
            <td>
                @foreach($data->member as $member)
                    Name: "{{$member["prefix"] . $member["name"] . " " . $member["surname"]}}"<br>
                    Steam: "{{$member["steam"]}}"<br>
                    Facebook: "{{$member["facebook"]}}"<br>
                    Phone: "{{$member["phone"]}}"<br><br>
                @endforeach
            </td>
            <td>{{$data->school}}</td>
            <td>{{$data->school_addr}}</td>
            <td>{{$data->school_province}}</td>
            <td>{{$data->teacher_prefix}}</td>
            <td>{{$data->teacher_name}}</td>
            <td>{{$data->teacher_surname}}</td>
            <td>{{$data->teacher_phone}}</td>
            <td>{{$data->teacher_email}}</td>
            <td>@if($data->confirm == 0)
                    ยังไม่ได้ส่ง
                @elseif($data->confirm == 1)
                    เรียบร้อย
                @else
                    ลงทะเบียนซ้ำ
                @endif</td>
            <td>{{$data->remember}}</td>
            <td>{{$data->created_at}}</td>
            <td>{{$data->updated_at}}</td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <td colspan="3"><strong>Total:</strong> {{$datas->count()}}</td>
    </tr>
    </tfoot>
</table>
</body>
</html>
