@extends('layouts.backend', ['pageSlug' => 'dashboard'])

@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Welcome to Admin Dashboard</h1>
        </div>
    </div>

@endsection

@push('js')
    <script src="/js/admin/plugins/chartjs.min.js"></script>
    <script>
        $(document).ready(function() {
          demo.initDashboardPageCharts();
        });
    </script>
@endpush
