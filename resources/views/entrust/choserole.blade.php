@extends('layouts.app')

@section('content')
<?php $page_title='choose role'; ?>
<div class="col-md-3 col-xs-0">
</div>
<div class="col-md-6 col-sm-12">
    <div class="white-box">
        <h3 class="box-title m-b-0">Why are you here???</h3>
        <p class="text-muted m-b-30 font-13"> Bootstrap Elements </p>
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <form method='post' action='{{route("webauth.choserole")}}'>
                    @csrf
                    <div class="radio radio-info">
                        <input type="radio" name="role" id="radio5" value="teacher" required>
                        <label for="radio5"> Teacher </label><br>
                        Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary 
                    </div>
                    <div class="radio radio-info">
                        <input type="radio" name="role" id="radio5" value="student" required>
                        <label for="radio5"> Student</label><br>
                        Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary
                    </div>
                    <div class="radio radio-info">
                        <input type="radio" name="role" id="radio5" value="parent" required>
                        <label for="radio5"> Parent</label><br>
                        Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary
                    </div>
                    <button class="btn btn-block btn-info btn-lg btn-rounded">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-md-3 col-xs-0">
</div>
@endsection