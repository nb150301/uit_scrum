@extends('master_layout.index')
@section('header')
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div>
        <form action="/login" method="post">
            @csrf
            @if (isset($message))
                {{ $message }}
            @endif
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input
                    type="email"
                    name="email"
                    class="form-control"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                />
                <div id="emailHelp" class="form-text">
                    We'll never share your email with anyone else.
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input
                    type="password"
                    name="password"
                    class="form-control"
                    id="exampleInputPassword1"
                />
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"
    ></script>
@endsection
