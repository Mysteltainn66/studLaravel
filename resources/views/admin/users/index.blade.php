@extends('layouts.backend', ['pageSlug' => 'users'])

@section('content')
    @include('admin.users.includes.alert')
    @push('js-all')
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(function (e){
                $("#chkCheckAll").click(function (){
                    $(".checkBoxClass").prop('checked',$(this).prop('checked'));
                });

                $('#deleteAllSelectedRecords').click(function (e){
                    e.preventDefault();
                    var allids = [];
                    $("input:checkbox[name=ids]:checked").each(function (){
                        allids.push($(this).val());

                    });

                    $.ajax({
                        url:"{{ route('admin.users.destroySelected') }}",
                        type:'DELETE',
                        data:{
                            ids:allids,
                            _token:$("input[name=_token]").val()
                        },

                        success:function(response)
                        {
                            var allids = [];
                            $("input:checkbox[name=ids]:checked").each(function (){
                                allids.push($(this).val());
                            });
                            const tableBody = document.querySelector('#table-body');
                            allids.forEach(el=>{
                                tableBody.removeChild(document.querySelector('#sid'+el));


                            });

                            document.querySelector('#response-text').innerHTML = response.success;
                            document.querySelector('#alert').removeAttribute('hidden');
                        }
                    })
                });
            });

            function closealert(){
                document.querySelector('#alert').setAttribute('hidden','true');
            }

        </script>
    @endpush
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
                        <th>Phone</th>
                        <th>Email</th>
                        <th class="text-center">Admin?</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="table-body">
                    @foreach($users as $user)
                        @php /** @var App\User $user */ @endphp

                        <tr id="sid{{ $user->id }}">
                            <td><input type="checkbox" name="ids" class="checkBoxClass" value="{{ $user->id }}"></td>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="text-center">{{ $user->is_admin }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.users.edit', $user->id) }}">
                                    <button type="button" class="btn-sm btn-primary">Edit</button>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            @if($users->total() > $users->count())
                <br>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="float-right">
            <a href="{{ route('admin.users.create') }}">
                <button type="button" class="btn btn-info btn-lg">Create</button>
            </a>
            <button type="button" class="btn btn-danger btn-lg" id="deleteAllSelectedRecords">Delete</button>
        </div>
    </div>
@endsection


