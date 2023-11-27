@extends('layout.app')
@section('title', 'Login')
@section('content')
        <section class="vh-80 vw-10">
    
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-8">
                <div class="card" style="width: 100%;">
                

                    <div class="row g-0">
                    <div class="col-md-6">
        <img src="mosque2.png" alt="GambarCard" class="img-fluid">
    </div>

                        
                        <div class="col-md-6">
                            <div class="card-body">
                            <form action="">
                            <h5 class="card-title text-center custom-login-text-2">LOGIN</h5>

                            @csrf
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label custom-username-label" for="username">Username</label>
                                <input type="text" id="username" class="form-control form-control-lg custom-text-input" name="username"
                                    required autocomplete="username"/>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <label class="form-label custom-username-label" for="password">Password</label>
                                <input type="password" id="password" class="form-control form-control-lg custom-text-input" name="password"
                                    required/>
                            </div>

                            <div class="text-danger errors">
                                <p class="err-message"></p>
                            </div>
                            @csrf

                            <!-- Submit button -->
                            <button class="custom-login-button"  type="submit">Login</button>
                            <div class="custom-register-text">
                                Belum punya akun?
                            <span>  <a href="{{url('/register')}}">Daftar</a></span>
                            </div>
                    
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
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