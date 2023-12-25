@include('posts._header')
<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-md mx-auto mt-10 lg:mt-20 space-y-6">
            <h1 class="text-center text-xl font-bold">
                Publish New Post
            </h1>
            <form
                method="POST"
                action="/post/create"
                enctype="multipart/form-data"
            >
                @csrf
                {{--title--}}
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-grey-700"
                           for="title"
                    >
                        title
                    </label>
                    <input
                        class="border border-grey-400 p-2 w-full"
                        type="text"
                        name="title"
                        id="title"
                        value="{{old('title')}}"
                        required
                    >
                    @error('title')
                    <p class="text-red-500 text-xs mt-1">{{$message}} </p>
                    @enderror
                </div>
                {{--excerpt--}}

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-grey-700"
                           for="excerpt"
                    >
                        excerpt
                    </label>
                    <textarea
                        class="border border-grey-400 p-2 w-full"
                        name="excerpt"
                        id="excerpt"
                    >
                    {{old('excerpt')??''}}
                </textarea>
                    @error('excerpt')
                    <p class="text-red-500 text-xs mt-1">{{$message}} </p>
                    @enderror
                </div>
                {{--body--}}
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-grey-700"
                           for="body"
                    >
                        body
                    </label>
                    <textarea
                        name="body"
                        id="body"
                        class="border border-grey-400 p-2 w-full"
                        >
                    {{old('body')??''}}
                </textarea>
                    @error('body')
                    <p class="text-red-500 text-xs mt-1">{{$message}} </p>
                    @enderror
                </div>
                {{--image--}}
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-grey-700"
                           for="image"
                    >
                        image
                    </label>
                    <input
                        class="border border-grey-400 p-2 w-full"
                        type="file"
                        name="image"
                        id="image"
                        value="{{old('image')}}"
                        required
                    >
                    @error('image')
                    <p class="text-red-500 text-xs mt-1">{{$message}} </p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-grey-700"
                           for="category_id"
                    >
                        category
                    </label>
                    <x-category-switch></x-category-switch>
                    @error('category_id')
                    <p class="text-red-500 text-xs mt-1">{{$message}} </p>
                    @enderror
                </div>
                <x-submit-button>Publish</x-submit-button>
            </form>
        </main>
    </section>
</x-layout>
