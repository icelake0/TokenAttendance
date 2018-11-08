@extends('layouts.app')

@section('content')
<?php $page_title='add lecturers'; ?>
<div class="col-md-3 col-xs-0">
</div>
<div class="col-md-6 col-sm-12">
    <div class="white-box">
        <h3 class="box-title m-b-0">add lectures to course</h3>
        <p class="text-muted m-b-30 font-13">Provide a valid email of an already registered lecturer to give the lecturer access to this course.</p>
        <div class="row">
            <div class="col-sm-12 col-xs-12">
            	@include('partials.courseinfo',['course'=>$course])
                <form method='post' action='{{ route("courses.addlecturers",["course"=>$course->id]) }}'>
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputphone">Number Of Lecturers</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-number"></i></div>
                            <input type="number" min='1' class="form-control" placeholder="Number Of lecturers" name='number' id='number_of_lecturers' value=1> 
                        </div>
                        <span id='lecturers_inputs'>
                        <label for="exampleInputphone">Lecturer Email</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-book"></i></div>
                            <input type="text" class="form-control" placeholder="Lecturer Email" name='lecturers[0]' required> 
                        </div>
                    </div>
                    </span>
                   	 <button class="btn btn-block btn-info btn-lg btn-rounded">Add Lecturers</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-md-3 col-xs-0">
</div>
<script src="{{ asset('plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script>
   $(document).ready(function(){
        $("#number_of_lecturers").keyup(function(){
            $("#lecturers_inputs").html("");
            var number_of_inputs=(Number)($("#number_of_lecturers").val());
            for(i=1; i<=number_of_inputs; i++){
                $("#lecturers_inputs").append('<label for="exampleInputphone">Lecturer Email</label><div class="input-group"><div class="input-group-addon"><i class="ti-user"></i></div><input type="text" class="form-control" placeholder="Lecturer Email" name="lecturers['+i+']" required> </div>');
            }
        });
    });
</script>
@endsection