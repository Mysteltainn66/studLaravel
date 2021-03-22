@extends('layouts.app')

@section('content')
            <div class="windowStatusForm">
                <div class="windowName">Dashboard</div>

                <div class="windowData">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Вы вошли в систему!
                </div>
            </div>
@endsection
