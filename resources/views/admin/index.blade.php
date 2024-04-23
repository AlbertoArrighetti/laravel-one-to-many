@extends('layouts/app')

@section('content')
    <div class="container py-5">
        <h1 class="text-center mb-5">Admin Page</h1>

        <h4 class="pb-5 ">Welcome {{$user->name}}</h4>

        <div class="mb-5">
            View all the projects
            <a href="{{route('admin.projects.index')}}">here</a>
        </div>

        <div>
            Organize the Types of projects
            <a href="{{route('admin.types.index')}}">here</a>
        </div>

    </div>
@endsection