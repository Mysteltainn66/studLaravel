@extends('layouts.backend', ['pageSlug' => 'photo-categories'])

@section('content')
{{--    @include('admin.users.includes.alert')--}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create New Category</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.categories.store') }}" autocomplete="off">
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
                                <input type="checkbox"
                                       id="is_active"
                                       name="is_active"
                                       aria-label="is_active"
                                       value="1"
                                    {{ old('is_active') ? 'checked="checked"' : '' }}
                                >
                                <label class="form-check-label" for="is_active"> Make a category active?</label>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
