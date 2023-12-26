<x-settings-page heading="Publish New Post">
    <form
        method="POST"
        action="/post/create"
        enctype="multipart/form-data"
    >
        @csrf
        {{--title--}}
        <x-form.label-input-error name="title" type="text"></x-form.label-input-error>
        {{--excerpt--}}
        <x-form.field>
            <x-form.label name="excerpt"></x-form.label>
            <x-form.textarea name="excerpt"></x-form.textarea>
            <x-form.error name="excerpt"></x-form.error>
        </x-form.field>
        {{--body--}}
        <x-form.field>
            <x-form.label name="body"></x-form.label>
            <x-form.textarea name="body"></x-form.textarea>
            <x-form.error name="body"></x-form.error>
        </x-form.field>
        {{--image--}}
        <x-form.label-input-error name="image" type="file"></x-form.label-input-error>
        <x-form.field>
            <x-form.label name="category"></x-form.label>
            <x-category-switch></x-category-switch>
            <x-form.error name="category_id"></x-form.error>
        </x-form.field>
        <x-form.button>Publish</x-form.button>
    </form>
</x-settings-page>

