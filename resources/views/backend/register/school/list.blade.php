@extends('backend.layout')
@section('content')
    <div id="guest">
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="input-group">
                    <input class="search form-control" placeholder="Search" />
                    <div class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></div>
                </div>
            </div>
        </div>
        <table class="table table-hover table-nowrap table-responsive">
            <thead>
            <th class="sort" data-sort="id">id <i class="fa fa-sort" aria-hidden="true"></i></th>
            <th class="sort" data-sort="name">name <i class="fa fa-sort" aria-hidden="true"></i></th>
            <th class="sort" data-sort="age">Age <i class="fa fa-sort" aria-hidden="true"></i></th>
            <th class="sort" data-sort="school">School <i class="fa fa-sort" aria-hidden="true"></i></th>
            <th class="sort" data-sort="follower">Follower <i class="fa fa-sort" aria-hidden="true"></i></th>
            <th class="sort" data-sort="province">Province <i class="fa fa-sort" aria-hidden="true"></i></th>
            <th class="sort" data-sort="workshop">Workshop <i class="fa fa-sort" aria-hidden="true"></i></th>
            <th class="sort" data-sort="confirm">confirm <i class="fa fa-sort" aria-hidden="true"></i></th>
            <th class="sort" data-sort="created_at">created_at <i class="fa fa-sort" aria-hidden="true"></i></th>
            <th>action</th>
            </thead>
            <tbody class="list">
            @foreach($datas as $data)
                <tr>
                    <td class="id">{{$data->id}}</td>
                    <td class="name">{{$data->name}}</td>
                    <td class="age">{{$data->age}}</td>
                    <td class="school">{{$data->school}}</td>
                    <td class="follower">{{$data->follower}}</td>
                    <td class="province">{{$data->province}}</td>
                    <td class="workshop">{{$data->workshop}}</td>
                    <td class="confirm">{{$data->confirm}}</td>
                    <td class="created_at">{{$data->created_at}}</td>
                    <td>
                        <form action="{{URL::route('backend.register.school.destroy', $data->id)}}" method="post">
                            {!! csrf_field() !!}
                            {!! method_field('DELETE') !!}
                            <a href="{{URL::route('backend.register.school.show', $data->id)}}" class="btn btn-default btn-xs" data-toggle="tooltip"  title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <a href="{{URL::route('backend.register.school.edit', $data->id)}}" class="btn btn-default btn-xs" data-toggle="tooltip"  title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <button type="submit" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Delete"><i class="fa fa-times"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <p class="total"><strong>Total:</strong> {{$datas->count()}}</p>
        <a href="{{URL::route('schoolExcel')}}" class="btn btn-primary">Export</a>
        <a href="{{URL::route('backend.register.school.new')}}" class="btn btn-success">New</a>
    </div>
@endsection
@section('script')
    <script>
        var options = {
            valueNames: [ 'id', 'name', 'age', 'school', 'follower', 'province', 'workshop', 'confirm', 'created_at' ]
        };

        var guestList = new List('guest', options);

        $("th.sort").click(function () {
            var thClass = $(this).attr('class').split(" ");
            if (thClass[1] == "asc") {
                $(this).find(':first-child').removeClass("fa-sort").removeClass('fa-sort-desc').addClass("fa-sort-asc");
            } else {
                $(this).find(':first-child').removeClass("fa-sort").removeClass('fa-sort-asc').addClass("fa-sort-desc");
            }
        });
    </script>
@endsection
