@extends('layouts.base')

@section('titre', 'Login')

@section('content')

        <div class="form-box">

            <!------------------- login form -------------------------->


            <style>
                input[type="text"]:focus,
                input[type="email"]:focus,
                input[type="url"]:focus,
                input[type="password"]:focus,
                input[type="number"]:focus,
                input[type="date"]:focus,
                input[type="datetime-local"]:focus,
                input[type="month"]:focus,
                input[type="search"]:focus,
                input[type="tel"]:focus,
                input[type="time"]:focus,
                input[type="week"]:focus,
                textarea:focus,
                select:focus {
                    --tw-ring-color: transparent !important;
                    border-color: transparent !important;
                }
            
                input[type="text"]:hover,
                input[type="email"]:hover,
                input[type="url"]:hover,
                input[type="password"]:hover,
                input[type="number"]:hover,
                input[type="date"]:hover,
                input[type="datetime-local"]:hover,
                input[type="month"]:hover,
                input[type="search"]:hover,
                input[type="tel"]:hover,
                input[type="time"]:hover,
                input[type="week"]:hover,
                textarea:hover,
                select:hover {
                    --tw-ring-color: transparent !important;
                    border-color: transparent !important;
                }
            
                input[type="text"]:active,
                input[type="email"]:active,
                input[type="url"]:active,
                input[type="password"]:active,
                input[type="number"]:active,
                input[type="date"]:active,
                input[type="datetime-local"]:active,
                input[type="month"]:active,
                input[type="search"]:active,
                input[type="tel"]:active,
                input[type="time"]:active,
                input[type="week"]:active,
                textarea:active,
                select:active {
                    --tw-ring-color: transparent !important;
                    border-color: transparent !important;
                }
            </style>
            
            <!-- Log In Section Start -->
            <div class="login-section">
                <div class="materialContainer">
                    <div class="box">
                        <form method="POST" action="{{ route('connexion.action') }}" id="login-form" onsubmit="clearForm(event)">
                            @csrf
                            <div class="login-title">
                                <h2>Login</h2>
                            </div>
            
                            <div class="input">
                                <label for="name">Email</label>
                                <input type="email" id="name" name="email"  required autofocus autocomplete="name">
                                @error('email') <span class="text-danger mt-3">{{ $message }}</span> @enderror
                            </div>
            
                            <div class="input">
                                <label for="pass">Password</label>
                                <input type="password" id="pass" class="block mt-1 w-full" name="password" required autocomplete="current-password">
                                @error('password') <span class="text-danger mt-3">{{ $message }}</span> @enderror
                            </div>
            
                            <a href="javascript:void(0)" class="pass-forgot">Forgot your password?</a>
            
                            <div class="button login">
                                <button type="submit">
                                    <span>Log In</span>
                                    <i class="fa fa-check"></i>
                                </button>
                            </div>
            
                            <p>Not remember? <a href="{{ route('inscription.page') }}" class="theme-color">Sign up now</a></p>
                        </form>
                    </div>
                </div>
            </div>
            
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    const loginForm = document.getElementById("login-form");
            
                    loginForm?.addEventListener("submit", function () {
                        setTimeout(() => {
                            event.target.reset();
                        }, 500); // Délai pour que l'action soit bien prise en compte
                    });
                });
            </script>

@endsection
