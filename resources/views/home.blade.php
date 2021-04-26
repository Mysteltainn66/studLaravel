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

                    @if(Auth::user()->isAdmin())
                        Добро пожаловать в Центр Управления Систомой.
                    @else
                        Вы вошли в систему!
                    @endif
                </div>
            </div>
@endsection
