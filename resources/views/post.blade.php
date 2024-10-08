<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <!-- <h3 class="text-xl">hello</h3> -->
    <!-- <article class="py-8 max-w-screen-md">
        <h3 class="mb-1 text-2xl tracking-tight font-bold text-gray-900">{{ $post['title'] }}</h3>
        <div class="text-base text-gray-500">
            by
            <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> 
            in
            <a href="categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
            | {{ $post->created_at->format('j F Y') }}
        </div>
        <p class="my-4 font-light">{{ $post['content'] }}</p>
        <a href="/posts" class="font-medium text-blue-500 hover:underline">&laquo; back to posts</a>
    </article> -->

    <main class="pt-4 lg:px-6 dark:bg-gray-900 antialiased">
        <div class=" justify-between px-4 mx-auto max-w-screen-xl">
            <article class="max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <a href="/posts" class="inline-flex items-center font-medium text-sm text-primary-600 dark:text-primary-500 hover:underline">                            
                        &laquo; Back to all posts
                    </a>
                    <address class="flex items-center my-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full" src="{{ asset('img/snopi.jpeg') }}" alt="{{ $post->author->name }}">
                            <div>
                                <a href="/authors/{{ $post->author->username }}" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">{{ $post->author->name }}</a>
                                <p class="text-base text-gray-500 dark:text-gray-400 mb-1">{{ $post->created_at->format('j F Y') }}</p>
                                <span class="bg-{{ $post->category->color }}-100 text-{{ $post->category->color }}-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                    <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 2L3 20H21L12 2Z" fill="currentColor"/>
                                        <path d="M8 16L12 10L16 16H8Z" fill="white"/>
                                        <path d="M2 20H22" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                    </svg>
                                    <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
                                </span>
                            </div>
                        </div>
                    </address>
                    <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{ $post->title }}</h1>
                </header>
                <p>{{ $post->content }}</p>
            </article>
        </div>
    </main>            
</x-layout>

