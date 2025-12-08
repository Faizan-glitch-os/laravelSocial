<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-8">

      @if($following->count())
        <div class="list-group list-group-flush">
          @foreach($following as $follow)
            <a wire:navigate href="/profile/{{ $follow->userFollowing->id }}" 
               class="list-group-item list-group-item-action d-flex align-items-center rounded-3 mb-2 shadow-sm border-0">
              
              <!-- Avatar -->
              <img src="{{ $follow->userFollowing->avatar }}" 
                   alt="avatar" 
                   class="rounded-circle me-3 border shadow-sm" 
                   width="50" height="50">

              <!-- Username -->
              <div>
                <h6 class="mb-0 fw-bold text-dark">{{ $follow->userFollowing->username }}</h6>
                <small class="text-muted">View Profile</small>
              </div>
            </a>
          @endforeach
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
          {{ $following->links() }}
        </div>
      @else
        <div class="text-center my-5">
          <h4 class="fw-bold">You’re not following anyone yet</h4>
          <p class="text-muted">Discover new people and start following them to see their posts here.</p>
        </div>
      @endif

    </div>
  </div>
</div>
