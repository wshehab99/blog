@props(['heading'])
<x-layout>
    <section class="px-6 py-8 max-w-6xl mx-auto">
        <h1 class="text-center text-2xl font-bold">
            {{$heading}}
        </h1>
        <div class="flex">
            <aside class="w-48 flex-shrink-0 mt-10">
                <h4 class="font-semibold mb-4">Links</h4>
                <ul class="space-y-2">
                    <li>
                        <a href="/admin/posts" class="{{request()->is('admin/posts')?'text-blue-500':''}}">All Posts</a>
                    </li>
                    <li>
                        <a href="/admin/post/create" class="{{request()->is('admin/post/create')?'text-blue-500':''}}">New post</a>
                    </li>
                </ul>
            </aside>
            <main class="flex-1">
                {{$slot}}
            </main>
        </div>
    </section>
</x-layout>
