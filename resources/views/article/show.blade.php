<x-guest-layout>
    <x-slot name="header">
        @include('components.header')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (isset($article))
                <div class="md:container md:mx-auto dark:text-gray-200">
                    <div class="font-xl">
                        <a href="article/{{ $article->id }}">
                            {{ $article->title }}
                        </a>
                    </div>
                    <div>
                        {{ $article->body }}
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-guest-layout>
