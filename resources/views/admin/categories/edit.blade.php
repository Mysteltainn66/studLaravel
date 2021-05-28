@extends('layouts.backend', ['pageSlug' => 'photo-categories'])

@section('content')
{{--    @include('admin.users.includes.alert')--}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Manage Category</div>

                    <div class="card-body">
                        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" >
                            @csrf
                            @method('PATCH')
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Is Active?</th>
                                    <th class="text-center"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>
                                        <input name="name" value="{{ $category->name }}"
                                               id="name"
                                               type="text"
                                               class="form-control"
                                               minlength="3"
                                               required>
                                    </td>
                                    <td>
                                        <input type="hidden" name="is_active" value="0">
                                        <input name="is_active"
                                               id="is_active"
                                               type="checkbox"
                                               value="1"
                                               {{ $category->is_active || old('is_active', 0) === 1 ? 'checked="checked"' : '' }}
                                               >
                                        <label class="form-check-label" for="is_active"> Make a category active?</label>
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
