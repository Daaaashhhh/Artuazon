@extends ('students.layout')

@section('content')

<p>Welcome <b>{{Auth::user()->name}}</b></p>
@auth
<a class="btn btn-primary" href="{{route('password')}}">Change Password</a>
<a class="btn btn-danger" href="{{route('logout')}}">Logout</a>
@endauth
@guest
<a class="btn btn-primary" href="{{route('login')}}">Login</a>
<a class="btn btn-info" href="{{route('logout')}}">Register</a>
@endguest

<div class="pull-left">
        <h2>Student Crud Step by Step</h2>
</div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('students.create')}}">Add new grades</a>
            </div>
        </div>
    </div>

    @if ($message= Session::get('success'))
    
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Filipino</th>
            <th>English</th>
            <th>Math</th>
            <th>Science</th>
            <th width="280px">Action</th>
            
        </tr>
        @foreach($students as $student)
        <tr>
            <td>{{++$i}}</td>
            <td>{{$student->Filipino}}</td>
            <td>{{$student->English}}</td>
            <td>{{$student->Math}}</td>
            <td>{{$student->Science}}</td>

            <td>
                <form action="{{ route('students.destroy',$student->id)}}" method="POST">
                    <a class="btn btn-info" href="{{route('students.edit',$student->id)}}">Show</a>
                    <a class="btn btn-primary" href="{{route('students.edit',$student->id)}}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">DELETE</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>