<h3 class="font-bold text-xl mb-4">
    Following
</h3>

<ul>
    @forelse(current_user()->follows as $user)
    <li class="mb-4">
        <div class="flex items-center text-sm">

            <a href="{{route('profile',$user->username)}}">
                <img
                    src="{{$user->avatar}}"
                    alt=""
                    class="rounded-full mr-2"
                    height="50px"
                    width="50px"
                >
            </a>
            <a href="{{route('profile',$user->username)}}">
            {{$user->name}}
            </a>

        </div>
    </li>
    @empty
        <li>
            No Followers yet
        </li>
        @endforelse
</ul>