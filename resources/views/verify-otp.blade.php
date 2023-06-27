<!-- verify-otp.blade.php -->
@include('header')

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1>OTP Verification {{$oop}}</h1>
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

                        <form method="POST" action="{{ route('verify.otp.submit') }}">
                            @csrf
                            <div class="mt-5 mb-5">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" value="{{ $email }}" required autofocus>
                            </div>
                            <div class="mt-5 mb-5">
                                <label for="otp">OTP</label>
                                <input type="text" id="otp" name="otp" required>
                            </div>

                            <div class="mt-5 mb-5">
                                <button class="btn btn-primary" type="submit">Verify OTP</button>
                            </div>
                        </form>
</body>

</html>