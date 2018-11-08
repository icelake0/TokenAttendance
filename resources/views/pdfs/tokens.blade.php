<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<div style="width:100%;" >@include('partials.classeinfo',['classe'=>$classe])</div>
<h3 class="box-title">Tokens</h3>
<hr/>
@forEach($tokens as $key=>$token)
	@if($token->attendance)
	<strike>
		<span style="width:25%; display:inline-block; text-align: left; color: red;" >
    	{{$token->token}}
    	</span>
	</strike>
	@else
		<span style="width:25%; display:inline-block; text-align: left;" >
    	{{$token->token}}
    	</span>
	@endif
	@if(!(($key+1)%4))
		<hr/>
	@endif
@endforEach
