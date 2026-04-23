@extends('layouts.app')

@section('content')
<div class="login-container">
    <div class="login-card">
        <div class="login-left">
            <div class="logo-icon">
                <i class="fa-solid fa-graduation-cap text-white"></i>
            </div>
            <h2>WELCOME TO</h2>
            <h3>Icon School & College</h3>
            <p style="margin-top: 20px; font-size: 14px; opacity: 0.8;">Chyakunjo, Moylapotha, New York</p>
            <div style="margin-top: 30px; display: flex; gap: 10px;">
                <a href="#" style="color: white; padding: 5px 10px; border: 1px solid rgba(255,255,255,0.3); border-radius: 5px;"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#" style="color: white; padding: 5px 10px; border: 1px solid rgba(255,255,255,0.3); border-radius: 5px;"><i class="fa-brands fa-twitter"></i></a>
                <a href="#" style="color: white; padding: 5px 10px; border: 1px solid rgba(255,255,255,0.3); border-radius: 5px;"><i class="fa-brands fa-linkedin-in"></i></a>
                <a href="#" style="color: white; padding: 5px 10px; border: 1px solid rgba(255,255,255,0.3); border-radius: 5px;"><i class="fa-brands fa-youtube"></i></a>
            </div>
        </div>
        <div class="login-right">
            <h3>Login Account</h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <i class="fa-regular fa-user"></i>
                    <input type="text" name="email" class="form-control" placeholder="Username or Email" required>
                </div>
                <div class="form-group">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="login-actions">
                    <label style="display:flex; align-items:center; gap:5px; cursor:pointer;">
                        <input type="checkbox" name="remember" style="accent-color: var(--accent-red);"> Remember
                    </label>
                    <a href="#" style="color: var(--text-secondary); text-decoration: none;">Lose Your Password?</a>
                </div>
                <button type="submit" class="btn-login">
                    <i class="fa-solid fa-right-to-bracket"></i> Login
                </button>
            </form>
            
            <div style="margin-top: 40px; text-align: center; font-size: 12px; color: var(--text-secondary);">
                &copy; 2026 Ramom School Management - Developed by RamomCoder
            </div>
            
            <!-- Quick Demo Login Buttons -->
            <div style="margin-top: 20px; display:flex; flex-wrap:wrap; justify-content:center; gap:5px;">
                <button class="badge" style="background:#333; border:none; color:white; cursor:pointer;">SuperAdmin</button>
                <button class="badge" style="background:#333; border:none; color:white; cursor:pointer;">Admin</button>
                <button class="badge" style="background:#333; border:none; color:white; cursor:pointer;">Teacher</button>
                <button class="badge" style="background:#333; border:none; color:white; cursor:pointer;">Student</button>
            </div>
        </div>
    </div>
</div>
@endsection
