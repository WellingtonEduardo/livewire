<div class="flex flex-col items-center text-black">
    <h1 class="mt-5 text-3xl font-bold text-white">
        Editar um post
    </h1>


    <form class="m-auto mt-10 flex w-[500px] flex-col items-center gap-10" action="#" wire:submit='edit'>

        @if (session()->has('success'))
            <span class="text-green-500">{{ session()->get('success') }}</span>
        @endif

        <input type="text" class="w-4/5 rounded-lg px-2 py-1" wire:model.live.blur="title">

        @error('title')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

        <textarea class="w-4/5 rounded-lg px-2 py-1" rows="10" wire:model.live.blur="content"></textarea>

        @error('content')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

        @if ($photo)
            <img class="w-10/12" src="{{ $photo->temporaryUrl() }}">
        @endif

        @error('photo')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

        <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
            x-on:livewire-upload-finish="uploading = false" x-on:livewire-upload-cancel="uploading = false"
            x-on:livewire-upload-error="uploading = false"
            x-on:livewire-upload-progress="progress = $event.detail.progress">

            <div x-show="uploading">
                <progress class="w-full" max="100" x-bind:value="progress"></progress>
            </div>
            <input type="file" wire:model="photo" class="text-white">

        </div>

        @if ($post->photo && !$photo)
            <img class="w-10/12" src="{{ asset('storage/' . $post->photo) }}">
        @endif


        <div class="flex items-center justify-center gap-5">
            <button class="w-[150px] rounded-lg border border-blue-400 bg-blue-600 px-2 py-2 font-bold">
                Editar
            </button>

            <div wire:loading wire:target="edit">
                <x-spinner />
            </div>
        </div>
    </form>
</div>
