@extends('layouts.backend', ['pageSlug' => 'users'])

@section('content')
    @include('admin.users.includes.alert')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Manage Photo</div>

                    <div class="card-body">
                        <form action="{{ route('admin.photos.update', $photo->id) }}" method="POST" >
                            @csrf
                            @method('PATCH')
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Category ID</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{ $photo->id }}</td>
                                    <td>
                                        <input name="name" value="{{ $photo->name }}"
                                               id="name"
                                               type="text"
                                               class="form-control"
                                               minlength="3"
                                               required>
                                    </td>
                                    <td>
                                        <select name="category_id"
                                                id="category_id"
                                                type="text"
                                                class="form-control"
                                                placeholder="Choose category"
                                                required>
                                            @php /** @var App\Categories $categories */ @endphp
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>

                                    <td>
                                        <button type="submit" class="btn-sm btn-primary">Save</button>
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
