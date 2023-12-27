<x-settings-page heading="Edit Post">
    <form
        method="POST"
        action="/admin/posts/{{$post->id}}"
        enctype="multipart/form-data"
    >
        @csrf
        @method('PATCH')
        {{--title--}}
        <x-form.label-input-error name="title" type="text" :value="old('title',$post->title)"></x-form.label-input-error>
        {{--excerpt--}}
        <x-form.field>
            <x-form.label name="excerpt"></x-form.label>
            <x-form.textarea name="excerpt" >{{old('excerpt')??$post->excerpt}}</x-form.textarea>
            <x-form.error name="excerpt"></x-form.error>
        </x-form.field>
        {{--body--}}
        <x-form.field>
            <x-form.label name="body"></x-form.label>
            <x-form.textarea name="body">{{old('body')??$post->body}}</x-form.textarea>
            <x-form.error name="body"></x-form.error>
        </x-form.field>
        {{--image--}}
        <x-form.label-input-error name="image" type="file" :value="old('title',$post->image)"></x-form.label-input-error>
        <x-form.field>
            <x-form.label name="category"></x-form.label>
            <x-category-switch :category_id="$post->category->id"></x-category-switch>
            <x-form.error name="category_id"></x-form.error>
        </x-form.field>
        <x-form.button>Save Changes</x-form.button>
    </form>
</x-settings-page>

