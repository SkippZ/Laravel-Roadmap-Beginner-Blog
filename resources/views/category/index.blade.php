<x-guest-layout>
    <x-slot name="header">
        @include('components.header')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @auth
                <form action="{{ route('store_category') }}" method="post" class="rounded p-3 flex-col gap-4 flex bg-sky-900">
                    @csrf
                    <div>
                        <input type="text" class="w-full" name="name" id="name">
                    </div>
                    <div>
                        <button type="submit" class="bg-sky-600 p-2 dark:text-white">send</button>
                    </div>
                </form>   
            @endauth
            @foreach ($categories as $category)
                <div class="md:container md:mx-auto dark:text-gray-200">
                    <div class="font-xl">
                        <a href="category/{{ $category->id }}">
                            {{ $category->name }}
                        </a>
                        @auth
                            <form action="{{ route('destroy_category', ['category' => $category->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit">delete</button>
                            </form>
                            <a href="{{ route('edit_category', ['category' => $category->id]) }}">edit</a>
                        @endauth
                    </div>
                    <div>
                        {{ $category->body }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-guest-layout>
