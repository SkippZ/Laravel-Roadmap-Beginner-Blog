<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight dark:bg-purple-900">
    {{ __('Article') }}
</h2>
@guest
    <a href="{{ route('login') }}">Login</a>
@endguest
