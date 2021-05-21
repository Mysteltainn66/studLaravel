@extends('layouts.backend', ['pageSlug' => 'users'])

@section('content')
    @include('admin.users.includes.alert')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Manage User</div>

                    <div class="card-body">
                        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" >
                            @csrf
                            @method('PATCH')
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th class="text-center">Admin?</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>
                                        <input name="name" value="{{ $user->name }}"
                                               id="name"
                                               type="text"
                                               class="form-control"
                                               minlength="3"
                                               required>
                                    </td>
                                    <td>
                                        <input name="phone" value="{{ $user->phone }}"
                                               id="phone"
                                               type="text"
                                               class="form-control"
                                               minlength="3"
                                               required>
                                    </td>
                                    <td>
                                        <input name="email" value="{{ $user->email }}"
                                               id="email"
                                               type="text"
                                               class="form-control"
                                               minlength="3"
                                               required>
                                    </td>
                                    <td class="text-center">
{{--                                        <input name="is_admin"--}}
{{--                                               id="is_admin"--}}
{{--                                               type="checkbox"--}}
{{--                                               class="text-center"--}}
{{--                                               value="{{ $user->is_admin }}"--}}
{{--                                               @if($user->is_admin == true)--}}
{{--                                               checked="checked"--}}
{{--                                               @endif>--}}
                                        <input name="is_admin" value="{{ $user->is_admin }}"
                                               id="is_admin"
                                               type="text"
                                               class="form-control"
                                               minlength="1"
                                               required>
                                    </td>

                                    <td>
                                        <button type="submit" class="btn-sm btn-primary">Accept</button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
