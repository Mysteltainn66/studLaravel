@extends('layouts.backend', ['pageSlug' => 'photos'])

@section('content')
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
            <h4 class="card-title">Users</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive ps">
                <table class="table tablesorter">

                    <thead class=" text-primary">
                    <tr>
                        <th><input type="checkbox" id="chkCheckAll"></th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category ID</th>
                        <th>User ID</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th class="text-center"></th>
                    </tr>
                    </thead>
                    <tbody id="table-body">
                    <tr>
                        <td><input type="checkbox" name="ids" class="checkBoxClass" value=""></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-center">
                            <form action="#" method="POST">
                                <button type="submit" class="btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>

                    </tbody>
                </table>
@endsection
