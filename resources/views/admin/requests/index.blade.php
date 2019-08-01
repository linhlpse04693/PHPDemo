@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Requests</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scrope="col">Name</th>
                                <th scrope="col">Email</th>
                                <th scrope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th>{{$user->name}}</th>
                                    <th>{{$user->email}}</th>
                                    <th>
                                        <a href="{{route('admin.requests.edit', $user->request_id)}}">
                                            <button type="button" class="btn btn-primary btn-sm">View</button>
                                        </a>
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
