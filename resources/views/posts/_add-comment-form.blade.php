<section class="col-span-8 col-start-5 mt-10 space-y-6">
    @auth()
        <form
            method="POST"
            action="/post/{{$post->id}}/comment"
            class="border border-gray-200 p-6 rounded-xl"
        >
            @csrf
            <header class="flex items-center">
                <img src="https://i.pravatar.cc/40?u={{auth()->id()}}" alt="user-image" class="rounded-full">
                <h2 class="ml-4">Want to participate?</h2>
            </header>
            <div class="mt-6">
                            <textarea
                                name="body"
                                rows="4"
                                class="w-full text-sm focus:outline-none focus:ring"
                                placeholder="Quick, think of something to say!"

                            ></textarea>
                @error('body')
                <p class="text-red-500 text-xs mt-1">{{$message}} </p>
                @enderror
            </div>
            <div class="flex justify-end mt-6 pt-6 border-t border-gray-100">
                <button
                    class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600"
                >post</button>
            </div>
        </form>
    @endauth
</section>
