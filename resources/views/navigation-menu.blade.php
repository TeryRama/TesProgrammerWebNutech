<!-- resources/views/navigation-menu.blade.php -->

<x-jet-nav-link href="{{ route('books.index') }}" :active="request()->routeIs('books.*')">
    {{ __('Books') }}
</x-jet-nav-link>

<x-jet-nav-link href="{{ route('authors.index') }}" :active="request()->routeIs('authors.*')">
    {{ __('Authors') }}
</x-jet-nav-link>

<x-jet-nav-link href="{{ route('categories.index') }}" :active="request()->routeIs('categories.*')">
    {{ __('Categories') }}
</x-jet-nav-link>
