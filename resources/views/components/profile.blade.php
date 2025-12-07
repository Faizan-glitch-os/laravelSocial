<x-layout :sharedData="$sharedData" docTitle="{{ $sharedData['user']->username }}'s Profile">
    <div class="container py-md-5 container--narrow">
      <h2>
        <img class="avatar-small" src="{{ $sharedData['user']->avatar }}" /> {{ $sharedData['user']->username }}
          @cannot('view', $sharedData['user'])
          @if ($sharedData['isFollowed'])
            <livewire:remove-follow :userId="$sharedData['user']->id" />
          @else
            <livewire:add-follow :userId="$sharedData['user']->id"/>
          @endif
          @endcannot
          @can('view', $sharedData['user'])
            <a wire:navigate href="/profile/upload-avatar" class="btn btn-secondary btn-sm">Manage Avatar</a>
          @endcan
      </h2>
      <div class="profile-nav nav nav-pills pt-2">
        <a wire:navigate href="/profile/{{ $sharedData['user']->id }}/" wire:current.exact="active"
        @class(['profile-nav-link nav-item nav-link'])>
            Posts: {{ $sharedData['postsCount'] }}
        </a>
        <a wire:navigate href="/profile/{{ $sharedData['user']->id }}/followers" wire:current.exact="active"
        @class(['profile-nav-link nav-item nav-link'])>
            Followers: {{ $sharedData['followers'] }}
        </a>
        <a wire:navigate href="/profile/{{ $sharedData['user']->id }}/following" wire:current.exact="active"
        @class(['profile-nav-link nav-item nav-link'])>
            Following: {{ $sharedData['following'] }}
        </a>
      </div>

      {{ $slot }}
      
</x-layout>