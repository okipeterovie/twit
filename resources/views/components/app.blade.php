<x-master>
    <section class="px-8">
        <main class="container mx-auto">
            <div class="lg:flex lg:justify-between">
                @if (auth()->check())
                    <div class="lg:w-32">
                        @include('sidebar_links')
                    </div>
                @endif
                {{$slot}}
                    @if (auth()->check())
                        <div class="lg:w-1/6 bg-blue-100 rounded-lg p-4">
                            @include('friend_lists')
                        </div>
                    @endif
            </div>

        </main>

    </section>

</x-master>