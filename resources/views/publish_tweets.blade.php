<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form method="POST" action="/tweet">
        @csrF

        <textarea
                name="body"
                class="w-full"
                placeholder="What's on your mind"
                required

        ></textarea>

        <hr class="my-4">

        <footer class="flex justify-between">
            <img
                    src="{{current_user()->avatar}}"
                    alt="your avatar"
                    class="rounded-full mr-2"
                    width="50px"
                    height="50px"
            >

            <button
                    type="submit"
                    class="bg-blue-500 rounded-lg shadow py-2 px-2 text-white">Tweet</button>

        </footer>

    </form>

    @error('body')
    <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror
</div>