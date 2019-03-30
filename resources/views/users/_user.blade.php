<div class="list-group-item">
    <img class="mr-3" src="{{ $user->gravatar(25) }}" alt="{{ $user->name }}"/>
    <a href="{{ route('users.show', $user) }}">
        {{ $user->name }}
    </a>
    {{--@can('destroy', $user)--}}
        {{--<form action="{{ route('users.destroy', $user->id) }}" method="post" class="float-right">--}}
            {{--{{ csrf_field() }}--}}
            {{--{{ method_field('DELETE') }}--}}
            {{--<button type="submit" class="btn btn-sm btn-danger delete-btn">删除</button>--}}
        {{--</form>--}}
    {{--@endcan--}}
@can('destroy', $user)
    <p>当前用户可以更新博客</p> @endcan
</div>