@extends('layouts.app')

@section('content')
<?php $page_title='add subject'; ?>
<div class="col-md-3 col-xs-0">
</div>
<div class="col-md-6 col-sm-12">
    <div class="white-box">
        <h3 class="box-title m-b-0">add the subjects you can teach</h3>
        <p class="text-muted m-b-30 font-13"> Bootstrap Elements </p>
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <form method='post' action='{{ route("webauth.addsubjects") }}'>
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputphone">Number Of Subjects</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-number"></i></div>
                            <input type="number" min='1' class="form-control" placeholder="Number Of subjects" name='number' id='number_of_subjects' value=1> 
                        </div>
                        <span id='subjects_inputs'>
                        <label for="exampleInputphone">Subject</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-book"></i></div>
                            <input type="text" class="form-control" placeholder="Subject" name='subjects[0]' required> 
                        </div>
                    </div>
                    </span>
                   	 <button class="btn btn-block btn-info btn-lg btn-rounded">Submit</button>
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
        $("#number_of_subjects").keyup(function(){
            $("#subjects_inputs").html("");
            var number_of_inputs=(Number)($("#number_of_subjects").val());
            for(i=1; i<=number_of_inputs; i++){
                $("#subjects_inputs").append('<label for="exampleInputphone">Subject</label><div class="input-group"><div class="input-group-addon"><i class="ti-user"></i></div><input type="text" class="form-control" placeholder="Subject" name="subjects['+i+']" required> </div>');
            }
        });
    });
</script>
@endsection