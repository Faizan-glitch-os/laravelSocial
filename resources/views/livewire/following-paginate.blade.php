<div>
    <div class="list-group">

        @foreach($following as $follow)
        <a wire:navigate href="/profile/{{ $follow->userFollowing->id }}" class="list-group-item list-group-item-action">
          <img class="avatar-tiny" src="{{ $follow->userFollowing->avatar }}" />
          {{ $follow->userFollowing->username }}
        </a>
        @endforeach
      </div>
      
      {{ $following->links() }}
</div>
