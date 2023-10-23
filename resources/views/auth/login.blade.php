@extends('layout.app')
@section('title', 'Login')
@section('content')
    <section class="vh-80 vw-10">
        <div class="container py-5 h-100" style="margin-left:-10px ">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="card-md-8 col-lg-7 col-xl-6">

                </div>
                <div class="card col-md-7 col-lg-5 col-xl-5 offset-xl-1" style="width: 20vw;">
                    <form action="">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="username">Username</label>
                            <input type="text" id="username" class="form-control form-control-lg" name="username"
                                   required autocomplete="username"/>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" id="password" class="form-control form-control-lg" name="password"
                                   required/>
                        </div>

                        <div class="text-danger errors">
                            <p class="err-message"></p>
                        </div>
                        @csrf

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-warning btn-lg btn-block">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('footer')
    <script type="module">
        $('form').submit(async function (e) {
            e.preventDefault();
            let username = $('#username').val();
            let password = $('#password').val();

            await axios({
                method: 'post',
                url: 'http://localhost:8000/login',
                data: {
                    username,
                    password
                }
            }).then(async () => {
                await swal.fire({
                    title: 'Login berhasil!',
                    text: 'Redirecting to dashboard...',
                    icon: 'success',
                    timer: 1000,
                    showConfirmButton: false
                })
                window.location = '/dashboard'
                console.log('success')
            }).catch(({response}) => {
                if (!$('.err-message').text()) {
                    $('.err-message').append(document.createTextNode(response.data.errors.message))
                }
            })

        })
    </script>
@endsection