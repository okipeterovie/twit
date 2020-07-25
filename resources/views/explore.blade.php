<x-app>
    <div class="lg:flex-1 lg:mx-10" style="max-width:700px">
        <div>
            @foreach($users as $user)
                <a href="{{$user->path()}}" class="flex items-center mb-5">
                    <img src="{{$user->avatar}}"
                         alt="{{$user->username}}'s avatar"
                         width="60"
                         class="mr-4 rounded"
                    >

                    <div>
                        <h4 class="font-bold">
                            {{'@' .$user->username}}
                        </h4>
                    </div>
                </a>

            @endforeach
        </div>

        {{$users->links()}}
    </div>
</x-app>