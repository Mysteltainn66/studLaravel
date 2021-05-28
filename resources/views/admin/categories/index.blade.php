@extends('layouts.backend', ['pageSlug' => 'photo-categories'])

@section('content')
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
                    url:"{{ route('admin.categories.destroySelected') }}",
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
            <h4 class="card-title">Categories</h4>
        </div>
        <div>

        </div>
        <div class="card-body">
            <div class="table-responsive ps">
                <table class="table tablesorter">

                    <thead class=" text-primary">
                    <tr>
                        <th><input type="checkbox" id="chkCheckAll"></th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Is Active?</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th></th>
                        <th class="text-center"></th>
                    </tr>
                    </thead>
                    <tbody id="table-body">
                    @foreach($categories as $category)
                        @php /** @var App\Categories $categories */ @endphp
                        <tr id="sid{{ $category->id }}">
                            <td><input type="checkbox" name="ids" class="checkBoxClass" value="{{ $category->id }}"></td>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->is_active }}</td>
                            <td>{{ $category->created_at }}</td>
                            <td>{{ $category->updated_at }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.categories.edit', $category->id) }}">
                                    <button type="button" class="btn-sm btn-primary">Edit</button>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            @if($categories->total() > $categories->count())
                <br>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                {{ $categories->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="float-right">
            <a href="{{ route('admin.categories.create') }}">
                <button type="button" class="btn btn-info btn-lg">Create</button>
            </a>
            <button type="button" class="btn btn-danger btn-lg" id="deleteAllSelectedRecords">Delete</button>
        </div>
    </div>
@endsection
