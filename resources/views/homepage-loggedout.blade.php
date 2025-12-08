<x-layout>
    <div class="container py-5">
  <div class="row justify-content-center align-items-center">
    <!-- Left side: Hero text -->
    <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0">
      <h1 class="display-4 fw-bold text-primary">Join OurApp Today</h1>
      <p class="lead text-muted">
        Share your thoughts, connect with friends, and rediscover the joy of writing.
      </p>
      <img src="/images/register-illustration.svg" alt="Register illustration" class="img-fluid mt-3 d-none d-lg-block">
    </div>

    <!-- Right side: Registration form -->
    <div class="col-lg-6">
      <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-5">
          <h3 class="text-center mb-4">Create Your Account</h3>

          <form action="/register" method="POST" id="registration-form">
            @csrf

            <!-- Username -->
            <div class="mb-3">
              <label for="username-register" class="form-label">Username</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input value="{{ old('username') }}" name="username" id="username-register"
                       class="form-control" type="text" placeholder="Pick a username" autocomplete="off">
              </div>
              @error('username')
                <p class="alert alert-danger small mt-2">{{ $message }}</p>
              @enderror
            </div>

            <!-- Email -->
            <div class="mb-3">
              <label for="email-register" class="form-label">Email</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                <input value="{{ old('email') }}" name="email" id="email-register"
                       class="form-control" type="email" placeholder="you@example.com" autocomplete="off">
              </div>
              @error('email')
                <p class="alert alert-danger small mt-2">{{ $message }}</p>
              @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
              <label for="password-register" class="form-label">Password</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input name="password" id="password-register"
                       class="form-control" type="password" placeholder="Create a password">
              </div>
              @error('password')
                <p class="alert alert-danger small mt-2">{{ $message }}</p>
              @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
              <label for="password-register-confirm" class="form-label">Confirm Password</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input name="password_confirmation" id="password-register-confirm"
                       class="form-control" type="password" placeholder="Confirm password">
              </div>
            </div>

            <!-- Submit -->
            <button type="submit" class="btn btn-success w-100 py-3 fw-bold">
              <i class="fas fa-user-plus me-2"></i> Sign up for OurApp
            </button>
          </form>

          <!-- Extra links -->
          <div class="text-center mt-4">
            <small class="text-muted">Already have an account?
              <a wire:navigate href="/login" class="text-primary fw-bold">Log in</a>
            </small>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</x-layout>