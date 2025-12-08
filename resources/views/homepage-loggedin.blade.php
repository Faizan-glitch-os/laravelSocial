<x-layout>
  <div class="container py-5 container--narrow">
  @if($posts->count())
    <h2 class="text-center mb-5 fw-bold text-primary">Posts from People You Follow</h2>

    <div class="row justify-content-center">
      @foreach($posts as $post)
        <div class="col-md-8 mb-4">
          <a wire:navigate href="/post/{{ $post->id }}/view" class="text-decoration-none">
            <div class="card shadow-sm border-0 h-100">
              <div class="card-body d-flex align-items-center">
                <!-- Avatar -->
                <img src="{{ $post->userBelongs->avatar }}" 
                     alt="avatar" 
                     class="rounded-circle me-3 border shadow-sm" 
                     width="50" height="50">

                <!-- Post Content -->
                <div>
                  <h5 class="card-title mb-1 fw-bold text-dark">{{ $post->title }}</h5>
                  <p class="card-subtitle text-muted small mb-0">
                    by <span class="fw-semibold">{{ $post->userBelongs->username }}</span> 
                    · {{ $post->created_at->format('M j, Y') }}
                  </p>
                </div>
              </div>
            </div>
          </a>
        </div>
      @endforeach
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
      {{ $posts->links() }}
    </div>
  @else
    <div class="text-center my-5">
      <h2 class="fw-bold">Hello <strong>{{ auth()->user()->username }}</strong>, your feed is empty.</h2>
      <p class="lead text-muted mt-3">
        Your feed shows the latest posts from people you follow.  
        Use the <strong>Search</strong> feature in the top menu to discover writers with similar interests and start following them.
      </p>
      <a wire:navigate href="/search" class="btn btn-lg btn-primary mt-3 shadow-sm">
        <i class="fas fa-search me-2"></i> Find People to Follow
      </a>
    </div>
  @endif
</div>

</x-layout>