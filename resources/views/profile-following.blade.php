<x-profile>
      <div class="list-group">
        @foreach($following as $follow)
        <a href="/post/{{ $follow->userFollowing->id }}" class="list-group-item list-group-item-action">
          <img class="avatar-tiny" src="{{ $follow->userFollowing->avatar }}" />
          {{ $follow->userFollowing->username }}
        </a>
        @endforeach
      </div>
    </div>
</x-profile>