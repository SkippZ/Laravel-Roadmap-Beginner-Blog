<x-guest-layout>
    <x-slot name="header">
        @include('components.header')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @auth
                <form action="{{ route('store_article') }}" method="post" class="rounded p-3 flex-col gap-4 flex bg-sky-900">
                    @csrf
                    <div>
                        <input type="text" class="w-full" name="title" id="title">
                    </div>
                    <div>
                        <textarea type="text" class="w-full" name="body" id="body"></textarea>
                    </div>
                    <div>
                        <button type="submit" class="bg-sky-600 p-2 dark:text-white">send</button>
                    </div>
                </form>   
            @endauth
            @foreach ($articles as $article)
                <div class="md:container md:mx-auto dark:text-gray-200">
                    <div class="font-xl">
                        <a href="article/{{ $article->id }}">
                            {{ $article->title }}
                        </a>
                        @auth
                            <form action="{{ route('destroy_article', ['articleId' => $article->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit">delete</button>
                            </form>
                            <a href="{{ route('edit_article', ['articleId' => $article->id]) }}">edit</a>
                        @endauth
                    </div>
                    <div>
                        {{ $article->body }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-guest-layout>
