@extends('layouts.app')

@section('content')
    <div class="avatar">
        <img src="{{ asset('/storage/avatars') . '/' . $user->avatar_id }}" alt="avatar">
    </div>
    <div class="profileData" style="width: 300px">
        <form enctype="multipart/form-data" action="{{ route('profile.settings.store') }}" method="POST">
            @csrf
            <label style="margin-bottom: 15px;">Update {{ $user->name }}'s Profile Image</label>
            <input style="margin-bottom: 15px;" id="avatar" type="file" class="form-control" name="avatar">
            <button type="submit">Update</button>
        </form>
    </div>
@endsection




