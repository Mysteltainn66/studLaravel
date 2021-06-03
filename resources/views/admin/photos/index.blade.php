@extends('layouts.backend', ['pageSlug' => 'photos'])

@section('content')
    @include('admin.users.includes.alert')
    <div id="alert" hidden class="row justify-content-center">
        <div class="col-md-12">
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" onclick="closealert()"  aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <div id="response-text">

                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Photos</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive ps">
                <table class="table tablesorter">

                    <thead class=" text-primary">
                    <tr>
                        <th><input type="checkbox" id="chkCheckAll"></th>
                        <th>ID</th>
                        <th>Preview</th>
                        <th>Name</th>
                        <th>Category ID</th>
                        <th>User ID</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th></th>
                        <th class="text-center"></th>
                    </tr>
                    </thead>
                    <tbody id="table-body">

                    @foreach($photos as $photo)
                    <tr>
                        <td><input type="checkbox" name="ids" class="checkBoxClass" value=""></td>
                        <td>{{ $photo->id }}</td>
                        <td><img src="{{ asset('/storage/photos') . '/' . $photo->path}}" style="width: 120px; height: auto"></td>
                        <td>{{ $photo->name }}</td>
                        <td>{{ $photo->category_id }}</td>
                        <td>{{ $photo->user_id }}</td>
                        <td>{{ $photo->created_at }}</td>
                        <td>{{ $photo->updated_at }}</td>
                        <td>
                            <a href="#">
                                <button type="button" class="btn-sm btn-primary">Edit</button>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('admin.photos.destroy', $photo->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>

{{--            @if($users->total() > $users->count())--}}
{{--                <br>--}}
{{--                <div class="row justify-content-center">--}}
{{--                    <div class="col-md-12">--}}
{{--                        <div class="card">--}}
{{--                            <div class="card-body">--}}
{{--                                {{ $users->links() }}--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endif--}}
        </div>
        <div class="float-right">
            <a href="{{ route('admin.photos.create') }}">
                <button type="button" class="btn btn-info btn-lg">Create</button>
            </a>
            <button type="button" class="btn btn-danger btn-lg" id="deleteAllSelectedRecords">Delete</button>
        </div>
    </div>
@endsection
