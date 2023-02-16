@extends('students.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Students</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{route('students.index')}}">Back</a>

        </div>
    </div>
</div>
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

<form action ="{{route('students.store')}}" method="POST">
    @csrf
    <div class="row">
    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="from-group">
                <strong>Filipino</strong>
                <input type="text" name="Filipino" class="form-control" placeholder="Filipino">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="from-group">
                <strong>English</strong>
                <input type="text" name="English" class="form-control" placeholder="English">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Math</strong>
                <input type="text" name="Math" class="form-control" placeholder="Math">
            </div>
        </div>  
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Science</strong>
                <input type="text" name="Science" class="form-control" placeholder="Science">
            </div>
        </div>  
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection