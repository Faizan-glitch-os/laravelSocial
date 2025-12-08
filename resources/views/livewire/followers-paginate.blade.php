<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-8">

      @if($followers->count())
        <div class="list-group list-group-flush">
          @foreach($followers as $follower)
            <a wire:navigate href="/profile/{{ $follower->userFollowers->id }}" 
               class="list-group-item list-group-item-action d-flex align-items-center rounded-3 mb-2 shadow-sm border-0">
              
              <!-- Avatar -->
              <img src="{{ $follower->userFollowers->avatar }}" 
                   alt="avatar" 
                   class="rounded-circle me-3 border shadow-sm" 
                   width="50" height="50">

              <!-- Username -->
              <div>
                <h6 class="mb-0 fw-bold text-dark">{{ $follower->userFollowers->username }}</h6>
                <small class="text-muted">View Profile</small>
              </div>
            </a>
          @endforeach
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
          {{ $followers->links() }}
        </div>
      @else
        <div class="text-center my-5">
          <h4 class="fw-bold">No followers yet</h4>
          <p class="text-muted">When people follow you, they’ll appear here.</p>
        </div>
      @endif

    </div>
  </div>
</div>
