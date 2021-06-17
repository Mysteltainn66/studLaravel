@extends('layouts.backend', ['pageSlug' => 'photos'])

@section('content')
    @push('js-all')
        <style>
            .pictures {
                -webkit-column-count: 25;
                -moz-column-count: 25;
                column-count: 25;
                -webkit-column-gap: 1em;
                -moz-column-gap: 1em;
                column-gap: 1em;
                margin-bottom: -1em;
            }
            a {
                display: inline-block;
            }

            img {
                display: block;
                height: 100%;
                width: 100%;
                margin-bottom: 1em;
            }
            .full {
                display: none;
                position: fixed;
                left: 0;
                top: 0;
                right: 0;
                bottom: 0;
                padding: 8%;
                background: #CCC center no-repeat;
                background: rgba(0, 0, 0, 0.5) center no-repeat;
                background-size: auto 500px;
                background-origin: content-box;
            }
            a:focus + .full {
                display: block;
                z-index: 999999;

            }
        </style>
    @endpush
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

                    <thead class="text-primary">
                    <tr>
                        <th><input type="checkbox" id="chkCheckAll"></th>
                        <th>ID</th>
                        <th>Preview</th>
                        <th></th>
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
                    <tr class="pictures">
                        <td><input type="checkbox" name="ids" class="checkBoxClass" value=""></td>
                        <td>{{ $photo->id }}</td>
                        <td style="height: 0px">
                            <a href="#{{ $photo->path }}">
                                <img class="img-to-show" src="{{ asset('/storage/photos') . '/' . $photo->path}}" style="width: 120px; height: auto;" >
                            </a>
                            <a id="{{ $photo->id }}" href="#" class="full" style="background-image:url({{ asset('/storage/photos') . '/' . $photo->path}})"></a>
                        </td>
                        <td>
                            <a href="{{ asset('/storage/photos') . '/' . $photo->path}}">
                                <button type="button" class="btn btn-outline-secondary btn-sm" title="Open original image">
                                    <i class="far fa-file-image"></i>
                                </button>
                            </a>
                        </td>
                        <td>{{ $photo->name }}</td>
                        <td>{{ $photo->category_id }}</td>
                        <td>{{ $photo->user_id }}</td>
                        <td>{{ $photo->created_at }}</td>
                        <td>{{ $photo->updated_at }}</td>
                        <td>
                            <a href="{{ route('admin.photos.edit', $photo->id) }}">
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

        </div>
        <div class="float-right">
            <a href="{{ route('admin.photos.create') }}">
                <button type="button" class="btn btn-info btn-lg">Create</button>
            </a>
            <button type="button" class="btn btn-danger btn-lg" id="deleteAllSelectedRecords">Delete</button>
        </div>
    </div>
@endsection
