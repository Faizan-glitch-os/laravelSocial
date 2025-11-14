<x-layout>
    <div class="container py-md-5 container--narrow">
      <h2>
        <img class="avatar-small" src="{{ $user->avatar }}" /> {{ $user->username }}
          @cannot('view', $user)
          @if ($isFollowed)
            <form class="ml-2 d-inline" action="/profile/{{ $user->id }}/unfollow" method="POST">
            @csrf
              <button class="btn btn-danger btn-sm">Stop Following <i class="fas fa-user-times"></i></button>
            </form>
          @else
            <form class="ml-2 d-inline" action="/profile/{{ $user->id }}/follow" method="POST">
            @csrf
              <button class="btn btn-primary btn-sm">Follow <i class="fas fa-user-plus"></i></button>
            </form>
          @endif
          @endcannot
          @can('view', $user)
            <a href="/profile/upload-avatar" class="btn btn-secondary btn-sm">Manage Avatar</a>
          @endcan
      </h2>

      <div class="profile-nav nav nav-tabs pt-2 mb-4">
        <a href="#" class="profile-nav-link nav-item nav-link active">Posts: {{ $postsCount }}</a>
        <a href="#" class="profile-nav-link nav-item nav-link">Followers: 3</a>
        <a href="#" class="profile-nav-link nav-item nav-link">Following: 2</a>
      </div>

      <div class="list-group">
        @foreach($posts as $post)
        <a href="/post/{{ $post->id }}/view" class="list-group-item list-group-item-action">
          <img class="avatar-tiny" src="{{ $user->avatar }}" />
          <strong>{{ $post->title }}</strong> on {{ $post->created_at->format('n/j/Y') }}
        </a>
        @endforeach
      </div>
    </div>
</x-layout>