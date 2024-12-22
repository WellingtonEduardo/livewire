<div class="text-black">

    <form class="m-auto mt-16 flex w-[500px] flex-col items-center gap-10" action="#" wire:submit.prevent='create'>

        @if (session()->has('success'))
            <span class="text-green-500">{{ session()->get('success') }}</span>
        @endif

        <input type="text" class="w-4/5 rounded-lg px-2 py-1" wire:model="title">
        @error('title')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

        <textarea class="w-4/5 rounded-lg px-2 py-1" rows="10" wire:model="content"></textarea>
        @error('content')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

        <div class="flex items-center justify-center gap-5">
            <button class="w-[150px] rounded-lg bg-red-800 px-2 py-2 font-bold">
                Criar
            </button>

            <div wire:loading wire:target="create">
                <x-spinner />
            </div>
        </div>
    </form>
</div>
