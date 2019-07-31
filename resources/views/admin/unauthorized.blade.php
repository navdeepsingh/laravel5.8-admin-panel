@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header"><i class="fa fa-ban"></i> Unathorized</div>

                    <div class="card-body">
                        You have no access to this page.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
