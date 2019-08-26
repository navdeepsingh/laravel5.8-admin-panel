@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">Total Signups: {{ $signups->total() }}</div>
                        <div class="float-right">Download CSV <a href="{{ url('/admin/signups-download') }}" title="Download CSV" target="_blank"><button class="btn btn-info btn-sm"><i class="fa fa-download" aria-hidden="true"></i></button></a></div>
                    </div>
                    <div class="card-body">
                        
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($signups as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a href="{{ url('/admin/signups', $item->id) }}">{{ $item->name }}</a></td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        @if ($item->redemption->outlet_id === null)
                                            <td>Not Redeemed Yet</td>
                                        @else
                                            <td><span class="text-success">Redeemed</span></td>
                                        @endif
                                        <td>
                                            <a href="{{ url('/admin/signups/' . $item->id) }}" title="View User"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            @if (Auth::check() && Auth::user()->hasRole('super-admin'))
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'url' => ['/admin/signups', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete Signup',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination"> {!! $signups->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
