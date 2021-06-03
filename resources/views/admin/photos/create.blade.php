@extends('layouts.backend', ['pageSlug' => 'photos'])

@section('content')
    @php
        /** @var App\Categories $categories */
        /** @var App\User $users */
    @endphp
    @include('admin.users.includes.alert')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Publish New Photo</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.photos.store') }}" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="form-group">
                                <label for="photo">Photo</label>
                                <div class="col-md-6">
                                    <button class="btn btn-sm btn-success">
                                        Upload
                                        <input id="photo" type="file" class="form-control" name="photo" required>
                                    </button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text"
                                       class="form-control"
                                       id="name"
                                       name="name"
                                       minlength="3"
                                       aria-describedby="nameHelp">
                            </div>
                            <div class="form-group">
                                <label for="category_id">Category ID</label>
                                <select name="category_id"
                                        id="category_id"
                                        type="text"
                                        class="form-control"
                                        placeholder="Choose category"
                                        required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="user_id">User ID</label>
                                <select name="user_id"
                                        id="user_id"
                                        type="text"
                                        class="form-control"
                                        placeholder="Choose publisher"
                                        required>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Publish</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
