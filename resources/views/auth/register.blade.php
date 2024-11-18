@extends('layouts.app', ['title' => 'Register'])

@section('content')
<style>
    .success {
        outline: 2px solid green;
    }

    .error {
        outline: 2px solid red;
    }
</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function () {
        // Define regular expression
        var regex = /^\d*[.]?\d*$/;

        $("#contact").on("input", function () {
            // Get input value
            var inputVal = $(this).val();

            // Test input value against regular expression
            if (regex.test(inputVal)) {
                $(this).removeClass("error").addClass("success");
            } else {
                $(this).removeClass("success").addClass("error");
                document.getElementById('errorPhone').style.display = '';
            }
        });
    });
</script>
<div class="py-5 d-flex justify-content-center">
    <div class="col-md-6 card p-5">
        <h3 class="display-8 text-center mb-3 text-primary">Register</h3>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-floating mb-3">
                <input id="name" type="text" placeholder=" " class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus>
                <label for="name" class="col-form-label text-md-end">{{ __('First Name') }}</label>
                @error('fname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input id="mname" type="text" placeholder=" " class="form-control @error('mname') is-invalid @enderror" name="mname"
                    value="{{ old('mname') }}" autocomplete="mname" autofocus>
                <label for="mname" class="col-form-label text-md-end">{{ __('Middle Name') }}</label>
                @error('mname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input id="contact" type="text" placeholder=" " class="form-control @error('contact') is-invalid @enderror"
                    name="contact" value="{{ old('contact') }}" required autocomplete="contact" minlength="9"
                    maxlength="13">
                <label for="contact" class="col-form-label text-md-end">{{ __('Phone Number') }}</label>
                <small class="text-danger" id="errorPhone" style="display:none;">Only
                    digits(0-9)
                    are required</small>
                @error('contact')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input id="password" type="password" placeholder=" " class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">
                <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                    placeholder=" " required autocomplete="new-password">
                <label for="password-confirm" class="col-form-label text-md-end">{{ __('Confirm Password') }}</label>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary py-3 w-100 mb-4">
                    {{ __('Register') }}
                </button>
                <p class="text-center mb-0 mt-2">Already have an Account? <a href="{{ route('login') }}">Sign In</a>
                </p>

            </div>
        </form>
    </div>
</div>
@endsection