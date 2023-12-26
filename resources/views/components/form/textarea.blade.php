@props(['name'])
<textarea
    class="border border-grey-400 p-2 w-full"
    name="$name"
    id="$name"
>
    {{old('$name')??''}}
</textarea>
