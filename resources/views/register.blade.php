<!-- register.blade.php -->
@include('header')

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Register</h1>
            </div>
        </div>
        <h1>Register</h1>
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

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="mt-5 mb-5">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
                            </div>

                            <div class="mt-5 mb-5">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                            </div>

                            <div class="mt-5 mb-5">
                                <label for="phone">Phone</label>
                                <input type="text" id="phone" name="phone" value="{{ old('phone') }}" required>
                            </div>

                            <div class="mt-5 mb-5">
                                <label for="gender">Gender</label>
                                <input type="text" id="gender" name="gender" value="{{ old('gender') }}" required>
                            </div>

                            <div class="mt-5 mb-5">
                                <label for="dob">Date of Birth</label>
                                <input type="date" id="dob" name="dob" value="{{ old('dob') }}" required>
                            </div>

                            <div class="mt-5 mb-5">
                                <button class="btn btn-primary" type="submit">Register</button>
                            </div>
                        </form>
</body>

</html>