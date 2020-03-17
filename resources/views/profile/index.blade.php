@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-2 pt-3">
            <img class="rounded-circle" width="150" src="/storage/{{ $profile->image}}">
        </div>
        <div class="col-7 pt-3">
            <h3>{{$user->name}}</h3>
            <span><strong>0</strong> posts</span>
            @if($profile != null)
                <div class="pt-3">{{$profile->description}}</div>
                <a href="/profile/edit" class="pt-3">Update your profile!</a>
            @else
                <div><a href="/profile/create" class="pt-3">Create your profile!</a></div>
            @endif            
        </div>
    </div>
</div>
@endsection
