<div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
    <x-dropdown :currentCategory="$currentCategory??null">
        <x-dropdown-item href="/">
            All
        </x-dropdown-item>
        @foreach($categories as $category)
            <x-dropdown-item
                href="/?category={{$category->id}}&{{http_build_query(request()->except('category'))}}"
                :active="isset($currentCategory)&&$currentCategory->is($category)">
                {{ucwords($category->name)}}
            </x-dropdown-item>
        @endforeach
    </x-dropdown>
</div>
