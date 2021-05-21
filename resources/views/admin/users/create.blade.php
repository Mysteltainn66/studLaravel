@extends('layouts.backend', ['pageSlug' => 'users'])

@section('content')
    @include('admin.users.includes.alert')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create New User</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.users.store') }}" autocomplete="off">
                            @csrf
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
                                <label for="phone">Phone</label>
                                <input type="text"
                                       class="form-control"
                                       id="phone"
                                       name="phone"
                                       minlength="10">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email"
                                       class="form-control"
                                       id="email"
                                       name="email"
                                       minlength="7">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password"
                                       class="form-control"
                                       id="password"
                                       name="password"
                                       minlength="6">
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <label for="is_admin">Give admin rights?</label>--}}
{{--                                <input type="text" --}}
{{--                                       class="form-control" --}}
{{--                                       id="is_admin" --}}
{{--                                       name="is_admin">--}}
{{--                            </div>--}}
                            <div class="form-group">
                                <input type="checkbox"
                                       id="is_admin"
                                       name="is_admin"
                                       aria-label="is_admin"
                                       value="1"
                                       {{ old('is_admin') ? 'checked="checked"' : '' }}
                                       >
                                <label class="form-check-label" for="is_admin"> Give admin rights?</label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
