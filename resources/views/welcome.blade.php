@extends('app.master')

@section('title')
    Index Page
@endsection

@section('scripts')
	<script type="/js/index.js"></script>
@endsection

@section('styles')
	<script type="/css/main.css"></script>
@endsection

@include('sideber')

@section('content')
    <h1>Welcome TCO Trainings</h1>

    <ul>
        @foreach($users as $user)

            <li>{{$user['name']}} : {{$user['age']}}</li>
        @endforeach
    </ul>

@endsection 