<div>
    <div class="list-group">

        @foreach($posts as $post)
        <a wire:navigate href="/post/{{ $post->id }}/view" class="list-group-item list-group-item-action">
          <img class="avatar-tiny" src="{{ $sharedData['user']->avatar }}" />
          <strong>{{ $post->title }}</strong> on {{ $post->created_at->format('n/j/Y') }}
        </a>
        @endforeach
      </div>
      
      {{ $posts->links() }}
</div>
