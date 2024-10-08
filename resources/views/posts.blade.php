<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <section class="py-8 px-4 mx-auto max-w-screen-xl lg:py-6 lg:px-6">
        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($posts as $post)                
            <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-between items-center mb-5 text-gray-500">
                    <span class="bg-{{ $post->category->color }}-100 text-{{ $post->category->color }}-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                        <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2L3 20H21L12 2Z" fill="currentColor"/>
                            <path d="M8 16L12 10L16 16H8Z" fill="white"/>
                            <path d="M2 20H22" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                        <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
                    </span>
                    <span class="text-sm">{{ $post->created_at->format('j F Y') }}</span>
                </div>
                <a href="/posts/{{ $post->slug }}" class="hover:underline">
                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post['title'] }}</h2>
                </a>
                <p class="mb-5 font-light text-gray-500 dark:text-gray-400">{{ Str::limit($post['content'], 75) }}</p>
                <div class="flex justify-between items-center">
                    <a href="/authors/{{ $post->author->username }}" class="flex items-center space-x-4">
                        <img class="w-7 h-7 rounded-full" src="{{ asset('img/snopi.jpeg') }}" alt="snopi ava" />
                        <span class="font-medium dark:text-white">
                            {{ $post->author->name }}
                        </span>
                    </a>
                    <a href="/posts/{{ $post['slug'] }}" class="inline-flex items-center font-medium text-sm text-primary-600 dark:text-primary-500 hover:underline">
                        Read more &raquo;
                    </a>
                </div>
            </article>          
        @endforeach
        </div>  
    </section>
</x-layout>
