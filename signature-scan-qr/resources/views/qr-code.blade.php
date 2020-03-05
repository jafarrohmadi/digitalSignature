@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <img
                            src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(600)->generate('https://checklist.ayooproject.com/user/login')) !!} ">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
