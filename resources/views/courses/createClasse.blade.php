@extends('layouts.app')

@section('content')
<?php $page_title='Create Class'; ?>
<div class="col-md-3 col-xs-0">
</div>
<div class="col-md-6 col-sm-12">
    <div class="white-box">
        <h3 class="box-title m-b-0">Create Class</h3>
        <p class="text-muted m-b-30 font-13">Create a class and generate tokens for student, You can select the number of tokens to generate</p>
        <div class="row">
            <div class="col-sm-12 col-xs-12">
            	@include('partials.courseinfo',['course'=>$course])
                <form method='post' class="form-horizontal" action="{{ route('courses.createclasse',['course'=>$course->id]) }}">
                    @csrf
                    <div class="form-group">
                        <label class="col-sm-12">Class Date</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control" placeholder="Date" name="date" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12">Class Time</label>
                        <div class="col-sm-12">
                            <input type="time" class="form-control" placeholder="Time" name="time" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12">Number OF Tokens</label>
                        <div class="col-sm-12">
                        	<p> <code class="text-warning">Note that this value is default to the number of registered students</code></p>
                            <input type="text" class="form-control" value="{{$course->students->count()}}" name="no_of_token" required>
                        </div>
                    </div>
                    <button class="btn btn-block btn-info btn-lg btn-rounded">Create Class And Generate Tokens</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-md-3 col-xs-0">
</div>
@endsection