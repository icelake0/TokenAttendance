@extends('layouts.app')

@section('content')
<?php $page_title='Classes Created for Course'; ?>
<link href="{{asset('css/jquery.fancybox.min.css')}}" rel="stylesheet">
  <div class="col-sm-12">
    <div class="white-box">
        <h3 class="box-title m-b-0">Classes</h3>
        <p class="text-muted m-b-30">This table is a list of all classes crated for the course</p>
        <div class="table-responsive">
           @include('partials.courseinfo',['course'=>$course])
            <table id="table1" class="table table-striped my-data-table">
              <thead>
                <tr>
                      <th>id</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Created Buy</th>
                      <th class="text-center">Action</th>
                </tr>
              </thead>
              </tbody>
                    @foreach($classes as $classe)
                    <tr>
                      <td>{{$classe->id}}</td>
                      <td>{{$classe->date}}</td>
                      <td>{{$classe->time}}</td>
                      <td>{{App\User::find($classe->created_by)->name}}</td>
                      <td class="text-center">
                           <a class="btn btn-sm btn-success" href="route('courses.show',['course'=>$course->id])}}">
                            <i class="fa fa-eye"></i> View</a>
                          <a class="btn btn-sm btn-warning" href="route('courses.edit',['course'=>$course->id])}}">
                            <i class="fa fa-pencil"></i> Update</a>
                          <a class="btn btn-sm btn-info" href="route('courses.classes',['course'=>$course->id])}}"><i class="fa fa-table"></i> Classes</a>
                          <a target="_blank" class="btn btn-sm btn-primary" href="{{route('courses.printtokens',['classe'=>$classe->id])}}">
                            <i class="fa fa-print"></i> Print Tokrns
                          </a>
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