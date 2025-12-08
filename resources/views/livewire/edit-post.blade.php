<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card shadow-lg border-0">
        <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Edit Post</h5>
          <small>
            <a wire:navigate href="/post/{{ $post->id }}/view" class="text-white text-decoration-underline">
              Back to Post
            </a>
          </small>
        </div>

        <form wire:submit.prevent="editPost" action="/post/{{ $post->id }}/edit" method="POST">
          @csrf
          @method('PUT')

          <div class="card-body p-4">

            <!-- Title -->
            <div class="mb-4">
              <label for="post-title" class="form-label fw-bold">Title</label>
              <input wire:model="title"
                     value="{{ $post->title }}"
                     required
                     name="title"
                     id="post-title"
                     class="form-control form-control-lg shadow-sm"
                     type="text"
                     placeholder="Enter post title"
                     autocomplete="off" />
              @error('title')
                <div class="alert alert-danger small mt-2">{{ $message }}</div>
              @enderror
            </div>

            <!-- Body -->
            <div class="mb-4">
              <label for="post-body" class="form-label fw-bold">Body Content</label>
              <textarea wire:model="body"
                        required
                        name="body"
                        id="post-body"
                        class="form-control shadow-sm"
                        rows="6"
                        placeholder="Write your post here...">{{ $post->body }}</textarea>
              @error('body')
                <div class="alert alert-danger small mt-2">{{ $message }}</div>
              @enderror
            </div>

          </div>

          <!-- Submit -->
          <div class="card-footer text-center bg-light rounded-bottom-4">
            <button class="btn btn-success btn-lg px-5 shadow-sm" type="submit">
              <i class="fas fa-edit me-2"></i> Save Changes
            </button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
