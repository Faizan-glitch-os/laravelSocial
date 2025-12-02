<form wire:submit="editPost" action="/post/{{ $post->id }}/edit" method="POST">
      <small><b><a href="/post/{{ $post->id }}/view">back to the post</a></b></small>
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="post-title" class="text-muted mb-1"><small>Title</small></label>
          <input wire:model="title" value="{{ $post->title }}" required name="title" id="post-title" class="form-control form-control-lg form-control-title" type="text" placeholder="" autocomplete="off" />
        @error('title')
          <div class="alert alert-danger small">{{ $message }}</div>
        @enderror
        </div>

        <div class="form-group">
          <label for="post-body" class="text-muted mb-1"><small>Body Content</small></label>
          <textarea wire:model="body" required name="body" id="post-body" class="body-content tall-textarea form-control" type="text">{{ $post->body }}</textarea>
        @error('body')
          <div class="alert alert-danger small">{{ $message }}</div>
        @enderror
        </div>

        <button class="btn btn-primary">Edit Post</button>
</form>