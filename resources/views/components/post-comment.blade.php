@props(['comment'])
<article class="flex bg-gray-100 border border-gray-300 p-8 rounded-xl space-x-4">
    <div class="flex-shrink-0 ">
        <img src="https://i.pravatar.cc/100" alt="user-image" class="rounded-xl">
    </div>
    <div>
        <header class="mb-4">
            <h3 class="font-bold">
                {{$comment->author->username}}
            </h3>
            <p class="text-xs">Posted {{$comment->created_at->diffForHumans()}}</p>
        </header>
        <p>
            {{$comment->body}}
        </p>
    </div>
</article>
