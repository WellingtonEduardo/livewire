<div>
    <div class="m-auto my-10 flex max-w-[700px] items-center justify-around gap-3 px-5">


        <h1 class="text-3xl">Todos os posts</h1>

        <a href="{{ route('post.create') }}"
            class="w-[100px] rounded-lg border border-green-400 bg-green-800 px-2 py-2 font-bold">
            Novo post
        </a>
    </div>
    <x-search-post />

    <div class="flex flex-col items-center gap-7">
        @foreach ($posts as $post)
            <div
                class="flex w-[600px] items-center justify-between rounded-lg border border-gray-700 bg-gray-800 px-3 py-2">
                <div class="flex flex-1 flex-col items-center justify-center">
                    <h1 class="text-xl font-bold text-gray-400">{{ $post->title }}</h1>
                    <div class="w-full px-2">
                        <p>{{ $post->content }}</p>
                    </div>
                </div>
                <a class="rounded-lg border border-blue-400 bg-blue-600 px-2 py-1 font-bold text-black"
                    href="{{ route('post.edit', $post->id) }}">
                    Editar
                </a>
            </div>
        @endforeach
    </div>
    <div>
        {{ $posts->links() }}
    </div>


</div>
