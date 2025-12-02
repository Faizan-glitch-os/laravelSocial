<form wire:submit="unFollow" class="ml-2 d-inline" action="/profile/{{ $sharedData['user']->id }}/unfollow" method="POST">
    @csrf
    <button class="btn btn-danger btn-sm">
        Stop Following <i class="fas fa-user-times"></i>
    </button>
</form>