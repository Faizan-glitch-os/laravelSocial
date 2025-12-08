<form wire:submit="deletePost" class="delete-post-form d-inline" action="/post/{{ $post->id }}/delete" method="POST">
    @csrf
    @method('DELETE')
    <button class="btn btn-sm btn-danger fw-semibold shadow-sm px-3 ms-2"
    data-toggle="tooltip" data-placement="top" title="Delete">
    <i class="fas fa-trash me-1"></i>
    </button>
</form> 

