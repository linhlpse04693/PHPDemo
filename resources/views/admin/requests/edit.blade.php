@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scrope="col">Name</th>
                                <th scrope="col">Email</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>{{$user_request->name}}</th>
                                    <th>{{$user_request->email}}</th>
                                </tr>
                            </tbody>
                        </table>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{route('admin.requests.update',['id' => $user_request->request_id])}}" method="POST">
                            @csrf
                            {{method_field('PUT')}}
                            <input type="text" name="note" value="{{$user_request->note}}" placeholder="Note">
                            <input type="hidden" name="user_id" value="{{$user_request->user_id}}">
                            <button type="submit" name="action" value="Accept">Accept</button>
                            <button type="submit" name="action" value="Decline">Decline</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
