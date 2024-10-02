<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <!-- <h3 class="text-xl">hello</h3> -->
    <article class="py-8 max-w-screen-md">
        <h3 class="mb-1 text-2xl tracking-tight font-bold text-gray-900">{{ $post['title'] }}</h3>
        <div class="text-base text-gray-500">
            <a href="authors/{{ $post->author->username }}">{{ $post->author->name }}</a> | 14 April 2023
        </div>
        <p class="my-4 font-light">{{ $post['content'] }}</p>
        <a href="/posts" class="font-medium text-blue-500 hover:underline">&laquo; back to posts</a>
    </article>

</x-layout>

