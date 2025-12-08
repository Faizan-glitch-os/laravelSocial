<x-layout :sharedData="$sharedData" docTitle="{{ $sharedData['user']->username }}'s Profile">
    <div class="container py-5 container--narrow">
      <div class="card shadow-lg border-0 rounded-4 mb-4">
        <div class="card-body text-center">

      <!-- Avatar + Username -->
      <div class="d-flex flex-column align-items-center">
        <img src="{{ $sharedData['user']->avatar }}"
             alt="avatar"
             class="rounded-circle border shadow-sm mb-3"
             width="100" height="100">

        <h2 class="fw-bold mb-3">
          {{ $sharedData['user']->username }}

          <!-- Follow / Unfollow or Manage Avatar -->
          @cannot('view', $sharedData['user'])
            @if ($sharedData['isFollowed'])
              <livewire:remove-follow :userId="$sharedData['user']->id" />
            @else
              <livewire:add-follow :userId="$sharedData['user']->id"/>
            @endif
          @endcannot

          @can('view', $sharedData['user'])
            <a wire:navigate href="/profile/upload-avatar" class="btn btn-outline-secondary btn-sm ms-2">
              <i class="fas fa-user-cog me-1"></i> Manage Avatar
            </a>
          @endcan
        </h2>
      </div>

      <!-- Profile Navigation -->
      <div class="nav nav-pills justify-content-center mt-3 gap-3 profile-nav">
        <a wire:navigate href="/profile/{{ $sharedData['user']->id }}/"
           wire:current.exact="active"
           @class(['profile-nav-link nav-link fw-bold'])>
          <i class="fas fa-file-alt me-1"></i> Posts <span class="badge bg-primary">{{ $sharedData['postsCount'] }}</span>
        </a>

        <a wire:navigate href="/profile/{{ $sharedData['user']->id }}/followers"
           wire:current.exact="active"
           @class(['profile-nav-link nav-link fw-bold'])>
          <i class="fas fa-users me-1"></i> Followers <span class="badge bg-success">{{ $sharedData['followers'] }}</span>
        </a>

        <a wire:navigate href="/profile/{{ $sharedData['user']->id }}/following"
           wire:current.exact="active"
           @class(['profile-nav-link nav-link fw-bold'])>
          <i class="fas fa-user-friends me-1"></i> Following <span class="badge bg-info">{{ $sharedData['following'] }}</span>
        </a>
      </div>
    </div>
  </div>

  <!-- Slot for dynamic content -->
  <div class="mt-4">
    {{ $slot }}
  </div>
</div>

      
</x-layout>