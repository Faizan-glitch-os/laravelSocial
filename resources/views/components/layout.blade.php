<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
      @isset ($docTitle)
        {{ $docTitle }} | Mini Social
      @else
        Mini Social
      @endisset
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/main.css" />
  </head>
  <body>
    <header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <div class="container-fluid">

      <!-- Brand -->
      <a class="navbar-brand d-flex align-items-center" wire:navigate href="/">
        <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" width="35" height="30" class="me-2">
        <span class="fw-bold">Mini Social</span>
      </a>

      <!-- Toggle for mobile -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navbar content -->
      <div class="collapse navbar-collapse justify-content-end" id="navbarMain">
        <ul class="navbar-nav align-items-center gap-3">

          @auth
          <!-- Search -->
          <li class="nav-item">
            @persist('search')
              <livewire:search />
            @endpersist()
          </li>

          <!-- Chat -->
          <li class="nav-item">
            @persist('chat')
              <livewire:chat />
            @endpersist()
          </li>

          <!-- Profile Avatar -->
          <li class="nav-item">
            <a wire:navigate href="/profile/{{ auth()->guard('web')->user()->id }}" class="nav-link p-0">
              <img title="My Profile"
                   class="rounded-circle border border-light shadow-sm"
                   width="36" height="36"
                   src="{{ auth()->guard('web')->user()->avatar }}" alt="My Profile"/>
            </a>
          </li>

          <!-- Create Post -->
          <li class="nav-item">
            <a wire:navigate href="/post/create" class="btn btn-sm btn-light fw-bold shadow-sm">
              <i class="fas fa-plus me-1"></i> Create Post
            </a>
          </li>

          <!-- Sign Out -->
          <li class="nav-item">
            <form action="/logout" method="POST" class="d-inline">
              @csrf
              <button class="btn btn-sm btn-outline-light fw-bold">Sign Out</button>
            </form>
          </li>
          @endauth

        </ul>
      </div>
    </div>
  </nav>
</header>
<!-- header ends here -->

    @if (session()->has('message'))
  <div 
    x-data="{ show: true }" 
    x-init="setTimeout(() => show = false, 3000)" 
    x-show="show" 
    x-transition.opacity.duration.500ms
    class="position-fixed bottom-0 end-0 p-3" 
    style="z-index: 1050;"
  >
    <div 
      role="alert"
      @class([
        'alert alert-dismissible fade show d-flex align-items-center shadow-lg py-3 px-4',
        'alert-success' => session('message.status') === 'success',
        'alert-danger' => session('message.status') === 'failed',
      ])>
      
      <!-- Icon -->
      @if(session('message.status') === 'success')
        <i class="fas fa-check-circle me-2 text-success"></i>
      @elseif(session('message.status') === 'failed')
        <i class="fas fa-times-circle me-2 text-danger"></i>
      @endif

      <!-- Message Text -->
      <span class="fw-semibold">{{ session('message.text') }}</span>

    </div>
  </div>
@endif


    {{ $slot }}

    <footer class="bg-light border-top py-4 mt-5">
  <div class="container text-center">
    <p class="mb-1 text-muted small">
      &copy; 2025 <a href="/" class="fw-bold text-decoration-none text-primary">Mini Social</a>. All rights reserved.
    </p>
  </div>
</footer>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    <script>
      $('[data-toggle="tooltip"]').tooltip();

      setTimeout(() => {
        $('#autoDismissibleAlert').alert('close');
      }, 3000);
    </script>
  </body>
</html>