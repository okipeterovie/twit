<x-app>
    <div class="lg:flex-1 lg:mx-10">
        <header class="mb-10">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="font-bold text-2xl mb-0" style="max-width: 270px">{{$user->name}}</h2>
                    <p class="text-sm">Joined {{$user->created_at->diffForHumans()}}</p>
                </div>
                <div>
                    <img src="{{$user->avatar}}"
                         alt="Your avatar"
                         class="rounded-full mr-2"
                         style="width: 130px; left: calc(50% - 75px); top:1%"
                    >
                </div>
                <div class="flex">
                    @can('edit',$user)
                    <a href="{{$user->path('edit')}}" class=" rounded-full border border-gray-300 py-2 px-2 mr-4 text-black text-xs text-center" style="height: 40px; width: 100px">
                        Edit Profile
                    </a>
                    @endcan
                    @unless (current_user()->is($user))
                    <form method="post" action="/profile/{{$user->username}}/follow">
                        @csrf
                        <button
                                type="submit"
                                class="bg-blue-500 rounded-full shadow py-2 px-2 text-white text-xs">
                            {{auth()->user()->following($user)? 'Unfollow Me':'Follow me'}}
                        </button>
                    </form>
                        @endunless

                </div>

            </div>


            <p class="text-sm">
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                culpa qui officia deserunt mollit anim id est laborum."
            </p>
        </header>
        @include('timeline', [
        'tweets' =>$tweets])
    </div>
</x-app>


