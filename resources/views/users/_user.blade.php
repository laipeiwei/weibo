<div class="list-group-item">
    <img class="mr-3" src="{{ $user->gravatar(25) }}" alt="{{ $user->name }}"/>
    <a href="{{ route('users.show', $user) }}">
        {{ $user->name }}
    </a>
</div>