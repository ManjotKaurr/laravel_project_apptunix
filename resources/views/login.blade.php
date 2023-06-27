<!-- login.blade.php -->
@include('header')

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Login</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 ">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Login Form</h5>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mt-5 mb-5">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
                            </div>


                            <div class="mt-5 mb-5">
                                <button class="btn btn-primary" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>

</body>

</html>