<x-layout docTitle="{{ $post->title }}">
  <div class="container d-flex justify-content-center my-4">
  <div class="card shadow-sm" style="max-width: 600px; width: 100%;">
    <div class="card-body">
      <!-- Header: Avatar + Username + Timestamp -->
      <div class="d-flex align-items-center mb-3">
        <a href="/profile/{{ $post->userBelongs->id }}">
          <img src="{{ $post->userBelongs->avatar }}" 
               alt="avatar" 
               class="rounded-circle me-2" 
               width="50" height="50">
        </a>
        <div>
          <h6 class="mb-0">
            <a href="/profile/{{ $post->userBelongs->id }}" class="text-dark fw-bold">
              {{ $post->userBelongs->username }}
            </a>
          </h6>
          <small class="text-muted">
            {{ $post->created_at->diffForHumans() }}
          </small>
        </div>
      </div>

      <!-- Post Content -->
      <h5 class="card-title">{{ $post->title }}</h5>
      <p class="card-text">{!! $post->body !!}</p>

      <!-- Actions -->
      <div class="d-flex justify-content-end mt-4">
        @can('update', $post)
          <div class="btn-group" role="group">
            <!-- Edit Button -->
            <a wire:navigate href="/post/{{ $post->id }}/edit" 
            class="btn btn-sm btn-secondary text-white fw-semibold shadow-sm px-3">
              <i class="fas fa-edit me-1"></i> Edit
            </a>

            <!-- Delete Button -->
            <livewire:delete-post :post="$post" />
          </div>
  @endcan
</div>

    </div>
  </div>
</div>
</x-layout>