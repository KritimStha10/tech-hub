@extends('layouts.app')
@section('content')
    <main class="page-center">
        <article class="sign-up">
            <div class="row d-flex justify-content-center">
                <div class="col-md-4">
                    <h1 class="sign-up__title">
                        <div>
                            <img src="{{url('images/extratech-logo.png')}}" alt="">
                        </div>
                    </h1>
                    @include('errors.error')
                    @include('success.success')
                    <form class="sign-up-form form" action="{{ route('login') }}" method="POST">
                        <h2>Sign In</h2>

                        @csrf
                        <label class="form-label-wrapper">
                            <p class="form-label">Email</p>
                            <input
                                name="email"
                                class="form-input"
                                type="email"
                                placeholder="Enter your email"
                                required
                            />
                        </label>
                        <label class="form-label-wrapper">
                            <p class="form-label">Password</p>
                            <input
                                name="password"
                                class="form-input"
                                type="password"
                                placeholder="Enter your password"
                                required
                            />
                        </label>


                        <div class="forget-wrap">
                            <a class="link-info forget-link" href="{{route('password.request')}}">Forgot your password?</a>
                            {{-- <a href="{{url('/enrollment')}}" class="link-info ml-auto">Enroll Now!</a> --}}
                        </div>
                        <label class="form-checkbox-wrapper">
                            <input class="form-checkbox" type="checkbox" name="remember" value="1"/>
                            <span class="form-checkbox-label">Remember me next time</span>
                        </label>
                        <button class="form-btn primary-default-btn transparent-btn">
                            Sign in
                        </button>
                    </form>
                </div>
            </div>
        </article>
    </main>
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>

     function getNewCaptcha() {
        // start_loader();
        $.ajax({
            type: 'GET',
            url: Laravel.url + '/refreshcaptcha',
            success: function (data) {
                // end_loader();
                $(".captcha-img").html(data.captcha);
            }
            ,
            error: function (error) {
                // errorDisplay(error["responseJSON"]["message"]);
            }
        });
    }
</script>
@endsection
