@extends('layouts.app')

@section('content')
<?php $page_title='Course Search Result'; ?>
<link href="{{asset('css/jquery.fancybox.min.css')}}" rel="stylesheet"
  <div class="col-sm-12">
    <div class="white-box">
        <h3 class="box-title m-b-0">Course Search Result</h3>
        <p class="text-muted m-b-30">here is a list of courses matching your search, select the one that best match 
        the one you are looking for then register</p>
        <div class="table-responsive">
            <table id="table1" class="table table-striped my-data-table">
              <thead>
                <tr>
                      <th>Code</th>
                      <th>Title</th>
                      <th>Unit</th>
                      <th>Section</th>
                      <th>Semester</th>
                      <th>Lecturer</th>
                      <th class="text-center">Action</th>
                </tr>
              </thead>
              </tbody>
                    @foreach($courses as $course)
                    <tr>
                      <td>{{$course->code}}</td>
                      <td>{{$course->title}}</td>
                      <td>{{$course->unit}}</td>
                      <td>{{$course->section}}</td>
                      <td>{{($course->semester==1)?'First Semester':'Second Semester'}}</td>
                      <td>
                      	{{$course->course_lecturer()->title.' '.$course->course_lecturer()->user->name}}
                      </td>
                      <td class="text-center">
                          <a class="btn btn-sm btn-info" href="{{route('courses.studentregister',['course'=>$course->id])}}"><i class="fa fa-plus"></i> Register</a>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="{{ asset('plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{ asset('js/jquery.fancybox.min.js')}}"></script>
@endsection
