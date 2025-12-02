<form wire:submit="deletePost" class="delete-post-form d-inline" action="/post/{{ $post->id }}/delete" method="POST">
    @csrf
    @method('DELETE')
    <button class="delete-post-button text-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
</form> 