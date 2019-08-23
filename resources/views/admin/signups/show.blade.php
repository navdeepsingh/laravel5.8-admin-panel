@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Signup</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/signups') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>                        
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">                                
                                <tbody>
                                    <tr>
                                        <td>ID</td>
                                        <td>{{ $signup->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Name</td>
                                        <td>{{ $signup->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{ $signup->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Preferred Beer</td>
                                        <td>{{ $signup->beer }}</td>
                                    </tr>
                                    <tr>
                                        <td>Newsletter Opt-in</td>
                                        <td>{{ $signup->opt_in ? 'Yes' : 'No' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Register Date Time</td>
                                        <td>{{ $signup->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <td>Redemption Status</td>
                                        @if ($signup->redemption->outlet_id === null)
                                            <td>Not Redeemed Yet</td>
                                        @else
                                            <td><span class="text-success">Redeemed</span></td>
                                        @endif                                        
                                    </tr>
                                    @if ($signup->redemption->outlet_id !== null)
                                        <tr>
                                            <td>Outlet</td>
                                            <td>{{ $signup->redemption->outlet->title }}</td>
                                        </tr> 
                                        <tr>
                                            <td>Redemption Date Time</td>
                                            <td>{{ $signup->redemption->updated_at }}</td>
                                        </tr> 
                                    @endif                                         
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
