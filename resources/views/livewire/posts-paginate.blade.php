<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-8">

      @if($posts->count())

        @foreach($posts as $post)
          <a wire:navigate href="/post/{{ $post->id }}/view" class="text-decoration-none">
            <div class="card mb-3 shadow-sm border-0 list-hover">
              <div class="card-body d-flex align-items-center">
                <!-- Avatar -->
                <img src="{{ $sharedData['user']->avatar }}"
                     alt="avatar"
                     class="rounded-circle me-3 border shadow-sm"
                     width="50" height="50">

                <!-- Post Content -->
                <div>
                  <h5 class="mb-1 fw-bold text-dark">{{ $post->title }}</h5>
                  <p class="text-muted small mb-0">
                    Posted on {{ $post->created_at->format('M j, Y') }}
                  </p>
                </div>
              </div>
            </div>
          </a>
        @endforeach

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
          {{ $posts->links() }}
        </div>
      @else
        <div class="text-center my-5">
          <h4 class="fw-bold">No posts available</h4>
          <p class="text-muted">This user hasn’t shared any posts yet.</p>
        </div>
      @endif

    </div>
  </div>
</div>
