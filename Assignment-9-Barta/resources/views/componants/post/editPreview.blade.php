<section id="newsfeed" class="space-y-6">
    <!-- Barta Card -->

    <h1 class="text-lg font-semibold">Post Preview:</h1>

    <article class="bg-white border-2 border-black rounded-lg shadow mx-auto max-w-none px-4 py-5 sm:px-6">
        <!-- Barta Card Top -->
        <header>
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <!-- User Avatar -->
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full object-cover"
                            src="https://i.ibb.co.com/R0fNK6K/profile.png" alt="Tony Stark" />
                    </div>
                    <!-- /User Avatar -->

                    <!-- User Info -->
                    <div class="text-gray-900 flex flex-col min-w-0 flex-1">
                        <a href="{{route('profile', ['id' => $postUser->id])}}" class="hover:underline font-semibold line-clamp-1">
                            {{$postUser->first_name}}   {{$postUser->last_name}}
                        </a>

                        <a href="{{route('profile', ['id' => $postUser->id])}}" class="hover:underline text-sm text-gray-500 line-clamp-1">
                            {{$postUser->username ?? ""}}
                        </a>
                    </div>
                    <!-- /User Info -->
                </div>

            </div>
        </header>

        <!-- Content -->
        <div class="py-4 text-gray-700 font-normal space-y-2">
            <!-- Content -->
            <a href="{{ route('post.show', ['id' => $post->id]) }}">
                @if ($post->picture)
                    <img src="{{ asset('storage/' . $post->picture) }}"
                        class="min-h-auto w-full rounded-lg object-cover max-h-64 md:max-h-72" alt="">
                @endif
                <div class="py-4 text-gray-700 font-normal">
                    {{ $post->contents }}
                </div>
            </a>
        </div>

        <!-- Date Created & View Stat -->
        <div class="flex items-center gap-2 text-gray-500 text-xs my-2">
            <span class="">6 minutes ago</span>
            <span class="">•</span>
            <span>3 comments</span>
            <span class="">•</span>
            <span>450 views</span>
        </div>

        <hr class="my-6" />



        <!-- /Barta Card Bottom -->
    </article>
    <!-- /Barta Card -->

    <hr />
    <div class="flex flex-col space-y-6">
        <h1 class="text-lg font-semibold">Comments (1) Upcomming...</h1>

        <!-- Barta User Comments Container -->
        {{-- <article
            class="bg-white border-2 border-black rounded-lg shadow mx-auto max-w-none px-4 py-2 sm:px-6 min-w-full divide-y">
            <!-- Comments -->

            <!-- Comment 1 -->
            <div class="py-4">
                <!-- Barta User Comments Top -->
                <header>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <!-- User Avatar -->
                            <div class="flex-shrink-0">
                                <img class="h-10 w-10 rounded-full object-cover"
                                    src="https://avatars.githubusercontent.com/u/61485238" alt="Al Nahian" />
                            </div>
                            <!-- /User Avatar -->
                            <!-- User Info -->
                            <div class="text-gray-900 flex flex-col min-w-0 flex-1">
                                <a href="profile.html" class="hover:underline font-semibold line-clamp-1">
                                    Al Nahian
                                </a>

                                <a href="profile.html" class="hover:underline text-sm text-gray-500 line-clamp-1">
                                    @alnahian2003
                                </a>
                            </div>
                            <!-- /User Info -->
                        </div>
                    </div>
                </header>

                <!-- Content -->
                <div class="py-4 text-gray-700 font-normal">
                    <p>আজকে থেকে আমিও একজন PoorPHP ডেভেলপার 😂</p>
                </div>

                <!-- Date Created -->
                <div class="flex items-center gap-2 text-gray-500 text-xs">
                    <span class="">6m ago</span>
                </div>
            </div>
            <!-- /Comment 1 -->

            <!-- /Comments -->
        </article> --}}
        <!-- /Barta User Comments -->
    </div>
</section>

