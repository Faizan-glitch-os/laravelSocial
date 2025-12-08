<x-layout>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  <div class="card shadow-lg border-0 rounded-4" style="max-width: 450px; width: 100%;">
    <div class="card-body p-5">
      <!-- Header -->
      <h3 class="text-center mb-4 fw-bold text-primary">Welcome Back</h3>
      <p class="text-center text-muted mb-4">Log in to continue to OurApp</p>

      <!-- Login Form -->
      <form action="/login" method="POST" id="login-form">
        @csrf

        <!-- Email -->
        <div class="mb-3">
          <label for="loginemail" class="form-label">Email</label>
          <div class="input-group">
            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            <input name="loginemail" id="loginemail" class="form-control" type="email" placeholder="you@example.com" autocomplete="off">
          </div>
          @error('loginemail')
            <p class="alert alert-danger small mt-2">{{ $message }}</p>
          @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
          <label for="loginpassword" class="form-label">Password</label>
          <div class="input-group">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
            <input name="loginpassword" id="loginpassword" class="form-control" type="password" placeholder="Enter your password">
          </div>
          @error('loginpassword')
            <p class="alert alert-danger small mt-2">{{ $message }}</p>
          @enderror
        </div>

        {{-- <!-- Remember Me + Forgot Password -->
        <div class="d-flex justify-content-between align-items-center mb-4">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="remember" name="remember">
            <label class="form-check-label" for="remember">Remember me</label>
          </div>
          <a href="/forgot-password" class="text-primary small">Forgot password?</a>
        </div> --}}

        <!-- Submit -->
        <button type="submit" class="btn btn-success w-100 py-3 fw-bold">
          <i class="fas fa-sign-in-alt me-2"></i> Log In
        </button>
      </form>

      <!-- Extra links -->
      <div class="text-center mt-4">
        <small class="text-muted">Don’t have an account?
          <a href="/register" class="text-primary fw-bold">Sign up</a>
        </small>
      </div>
    </div>
  </div>
</div>

</x-layout>