<x-app>
    <div class="lg:flex-1 lg:mx-10" style="max-width:700px">
        <form method="POST" action="{{$user->path()}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="username">
                Username
            </label>

            <input class="border border-gray-400 p-2 w-full"
            type="text"
                   name="username"
                   id="username"
                   value="{{$user->username}}"
                   required
            >

            @error('username')
            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                Name
            </label>

            <input class="border border-gray-400 p-2 w-full"
                   type="text"
                   name="name"
                   id="name"
                   value="{{$user->name}}"
                   required
            >

            @error('name')
            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror
        </div>


        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                Email
            </label>

            <input class="border border-gray-400 p-2 w-full"
                   type="email"
                   name="email"
                   id="email"
                   value="{{$user->email}}"
                   required
            >

            @error('email')
            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror
        </div>

            <div class="mb-6">
                <div>
                    <img src="{{$user->avatar}}"
                         alt="Your avatar"
                         class="rounded-full mr-2"
                         style="width: 130px; left: calc(50% - 75px); top:1%"
                    >
                </div>
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="avatar">
                    Avatar
                </label>

                <input class="border border-gray-400 p-2 w-full"
                       type="file"
                       name="avatar"
                       id="avatar"
                >

                @error('avatar')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror
            </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">
                Password
            </label>

            <input class="border border-gray-400 p-2 w-full"
                   type="password"
                   name="password"
                   id="password"
                   required
            >

            @error('password')
            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password_confirmation">
                Password Confirmation
            </label>

            <input class="border border-gray-400 p-2 w-full"
                   type="password"
                   name="password_confirmation"
                   id="password_confirmation"
                   required
            >

            @error('password-confirmation')
            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button type="submit"
                    class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                Submit
            </button>
        </div>
    </form>
    </div>
</x-app>