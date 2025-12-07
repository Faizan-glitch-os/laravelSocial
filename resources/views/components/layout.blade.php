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
      <nav class="navbar bg-danger">
        <div class="container-fluid">
          <a class="navbar-brand" wire:navigate href="/">
            <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" width="30" height="24" class="d-inline-block align-text-top">
          </a>

          <div class="d-flex gap-2">
            @auth
            @persist('search')
              <livewire:search />
            @endpersist()
            @persist('chat')
              <livewire:chat />
            @endpersist()

            <a wire:navigate href="/profile/{{ auth()->guard('web')->user()->id }}" class="mr-2">
              <img title="My Profile"
              data-toggle="tooltip"
              data-placement="bottom"
              class="rounded-circle" 
              width="30" height="30"
              src="{{ auth()->guard('web')->user()->avatar }}"/>
            </a>

            <a wire:navigate class="btn btn-sm btn-success mr-2" href="/post/create">Create Post</a>
            <form action="/logout" method="POST" class="d-inline">
              @csrf
              <button class="btn btn-sm btn-secondary">Sign Out</button>
            </form>

            @else
              <form action="/login" method="POST" class="mb-0 pt-2 pt-md-0">
              @csrf
              <div class="row align-items-center">
                <div class="col-md mr-0 pr-md-0 mb-3 mb-md-0">
                  <input name="loginemail" class="form-control form-control-sm input-dark" type="email" placeholder="Email" autocomplete="on" />
                </div>
                <div class="col-md mr-0 pr-md-0 mb-3 mb-md-0">
                  <input name="loginpassword" class="form-control form-control-sm input-dark" type="password" placeholder="Password" />
                </div>
                <div class="col-md-auto">
                  <button class="btn btn-primary btn-sm">Sign In</button>
                </div>
              </div>
            </form>
          @endauth
          </div>
          
        </div>
      </nav>
    </header>
    <!-- header ends here -->

    @if (session()->has('message'))
      <div id="autoDismissibleAlert"
       role="alert"
       @class([
        'alert alert-dismissible text-center fade show',
        'alert-success' => session('message.status') === 'success',
        'alert-danger' => session('message.status') === 'failed',
       ])>
        {{ session('message.text') }}
      </div>
    @endif

    {{ $slot }}

    <footer class="border-top text-center small text-muted py-3">
        <p class="m-0">Copyright &copy; 2022 <a href="/" class="text-muted">OurApp</a>. All rights reserved.</p>
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