@extends('layouts.appmaster')
@section('title', 'Login Passed')

@section('content')
	@if($model->getUsername() == 'NoahVandy')
		<h3>Welcome Noah</h3>
	@else
		<h3>Noah did not login</h3>
	@endif
	<br>
	<a href="{{url('login5')}}">Login Again</a>
@endsection