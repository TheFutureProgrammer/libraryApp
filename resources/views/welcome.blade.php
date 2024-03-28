@extends('layouts.app')

@section('title', 'Login')

@section('header', '')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Login</h2>
                </div>
                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-danger">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($errors->has('email') || $errors->has('password'))
                        <div class="alert alert-danger">
                            Invalid email or password. Please try again.
                        </div>
                    @endif

                    <form action="{{ route('check') }}" method="post">
                        {!! csrf_field() !!}
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="text" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success">Login</button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <a href="/register" class="btn btn-success">New User? Register</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
