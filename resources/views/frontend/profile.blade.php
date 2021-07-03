@extends('layouts.app')

@section('content')
    <div class="profile-info">
        <div class="avatar">
            <img src="{{ asset('/storage/avatars') . '/' . $user->avatar_id }}" alt="avatar">
        </div>
        <div class="profileData">
            <table>
                <tbody>
                <tr>
                    <td>
                        {{ $user->name }}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="publication">
        <ul class="menu">
            <li>
                <button class="posts-btn">Posts</button>
            </li>
            <li>
                <button class="videos-btn">Videos</button>
            </li>
            <li>
                <button class="stories-btn">Stories</button>
            </li>
        </ul>
        <div class="public-tabs">
            @include('frontend.posts')
        </div>
    </div>
@endsection
