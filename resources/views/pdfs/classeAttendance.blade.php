<style>
    table, th, td {
    border: 1px solid black;
    }
</style>
@include('partials.classeinfo',['classe'=>$classe])
<h3>Attendance</h3>
<table class="table table-bordered" width='100%'>
    <thead>
        <tr>
        	<th>Reg Number </th>
            <th>Attendance</th>              
        </tr>
    </thead>
    <tbody>
    	@foreach($students as $student)
        <tr>
            <td>{{$student->reg_number}}</td>
             <td>{!!($student->attendances->count())?'+':'-'!!}</td>
        </tr>
        @endforeach
    </tbody>
</table>