@extends('layouts.app')

@section('title', 'Register')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <!-- Register Section -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-black">
                    <h2 class="text-center">Register</h2>
                </div>



                <div class="card-body">
                    <form action="{{ route('register') }}" method="post">
                        {!! csrf_field() !!}

                        <div class="mb-3">
                            <label for="name" class="form-label">Username:</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="d-grid gap-2">
                            <a href="/" class="btn btn-success">Login</a>
                            <button type="submit" class="btn btn-success">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Bootstrap JS and Popper.js (required for Bootstrap) scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection
