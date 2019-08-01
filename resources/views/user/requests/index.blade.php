@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        @if (Auth::user()->hasAnyPendingRequest())
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scrope="col">Name</th>
                                    <th scrope="col">Email</th>
                                    <th scrope="col">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>{{Auth::user()->name}}</th>
                                        <th>{{Auth::user()->email}}</th>
                                        <th>
                                            Pending
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        @elseif(Auth::user()->hasBeenDeclined())
                            <div class="alert alert-warning" role="alert">
                                Request has been declined
                            </div>
                            <form action="{{route('user.requests.store')}}" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                <button type="submit">
                                    Become a seller
                                </button>
                            </form>
                        @elseif(Auth::user()->hasAnyRole('seller'))
                            <div class="alert alert-success" role="alert">
                                You are a seller
                            </div>
                        @else
                            <form action="{{route('user.requests.store')}}" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                <button type="submit">
                                    Become a seller
                                </button>
                            </form>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
