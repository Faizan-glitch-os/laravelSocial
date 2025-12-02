<x-layout :sharedData="$sharedData" docTitle="{{ $sharedData['user']->username }}'s Profile">
    <div class="container py-md-5 container--narrow">
      <h2>
        <img class="avatar-small" src="{{ $sharedData['user']->avatar }}" /> {{ $sharedData['user']->username }}
          @cannot('view', $sharedData['user'])
          @if ($sharedData['isFollowed'])
            <form class="ml-2 d-inline" action="/profile/{{ $sharedData['user']->id }}/unfollow" method="POST">
            @csrf
              <button class="btn btn-danger btn-sm">Stop Following <i class="fas fa-user-times"></i></button>
            </form>
          @else
            <form class="ml-2 d-inline" action="/profile/{{ $sharedData['user']->id }}/follow" method="POST">
            @csrf
              <button class="btn btn-primary btn-sm">Follow <i class="fas fa-user-plus"></i></button>
            </form>
          @endif
          @endcannot
          @can('view', $sharedData['user'])
            <a wire:navigate href="/profile/upload-avatar" class="btn btn-secondary btn-sm">Manage Avatar</a>
          @endcan
      </h2>
      <div class="profile-nav nav nav-tabs pt-2 mb-4">
        <a wire:navigate href="/profile/{{ $sharedData['user']->id }}/"
        @class(['profile-nav-link nav-item nav-link', Request::segment(3) === null => 'active'])>
            Posts: {{ $sharedData['postsCount'] }}
        </a>
        <a wire:navigate href="/profile/{{ $sharedData['user']->id }}/followers"
        @class(['profile-nav-link nav-item nav-link', Request::segment(3) === 'followers' => 'active'])>
            Followers: {{ $sharedData['followers'] }}
        </a>
        <a wire:navigate href="/profile/{{ $sharedData['user']->id }}/following"
        @class(['profile-nav-link nav-item nav-link', Request::segment(3) === 'following' => 'active'])>
            Following: {{ $sharedData['following'] }}
        </a>
      </div>

      {{ $slot }}
</x-layout>