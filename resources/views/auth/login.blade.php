@extends('layouts.app')

@section('title', 'Đăng Nhập')

@section('content')
    <div class="auth-container">
        <!-- Brand Section -->
        <div class="brand-section">
            <div class="brand-logo">
                <i class="fas fa-user-tie"></i>
            </div>
            <h1 class="brand-title">Portfolio Admin</h1>
            <p class="brand-subtitle">Hệ thống quản trị nội dung portfolio</p>
        </div>

        <!-- Login Card -->
        <div class="auth-card">
            <div class="auth-header">
                <h2 class="auth-title">Chào mừng trở lại!</h2>
                <p class="auth-subtitle">Đăng nhập để quản lý portfolio của bạn</p>
            </div>

            <div class="auth-body">
                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        @if ($errors->has('email'))
                            {{ $errors->first('email') }}
                        @else
                            {{ $errors->first() }}
                        @endif
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Field -->
                    <div class="form-floating">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" placeholder="Email của bạn" required
                            autocomplete="email" autofocus>
                    </div>

                    <!-- Password Field -->
                    <div class="form-floating">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" placeholder="Mật khẩu" required autocomplete="current-password">
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="remember-me">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                Ghi nhớ đăng nhập
                            </label>
                        </div>
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="btn btn-primary btn-login w-100">
                        <i class="fas fa-sign-in-alt me-2"></i>
                        Đăng Nhập
                    </button>
                </form>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer-text">
            <p>© {{ date('Y') }} Portfolio Admin. Made with by
                <a href="#" target="_blank">Wyatt</a>
            </p>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Add some interactive effects
        document.querySelectorAll('.form-control').forEach(function(input) {
            input.addEventListener('focus', function() {
                this.parentNode.classList.add('focused');
            });

            input.addEventListener('blur', function() {
                if (!this.value) {
                    this.parentNode.classList.remove('focused');
                }
            });
        });

        // Loading effect on form submit
        document.querySelector('form').addEventListener('submit', function() {
            const btn = this.querySelector('.btn-login');
            const originalText = btn.innerHTML;

            btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Đang đăng nhập...';
            btn.disabled = true;

            // Reset after 5 seconds if still on page (error case)
            setTimeout(() => {
                btn.innerHTML = originalText;
                btn.disabled = false;
            }, 5000);
        });
    </script>
@endpush
