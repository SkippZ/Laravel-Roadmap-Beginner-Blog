<x-guest-layout>
    <x-slot name="header">
        @include('components.header')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (isset($article))
                <form action="{{ route('update_article', ['articleId' => $article->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="text" name="title" value="{{ $article->title }}" id="title">
                    <textarea type="text" name="body" id="body">{{ $article->body }}</textarea>
                    <button type="submit" class="dark:text-white">send</button>
                </form>
            @endif
        </div>
    </div>
</x-guest-layout>
