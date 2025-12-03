<div>
    <div class="list-group">

        @foreach($followers as $follower)
        <a wire:navigate href="/profile/{{ $follower->userFollowers->id }}" class="list-group-item list-group-item-action">
          <img class="avatar-tiny" src="{{ $follower->userFollowers->avatar }}" />
          {{ $follower->userFollowers->username }}
        </a>
        @endforeach
      </div>

      {{ $followers->links() }}
</div>
