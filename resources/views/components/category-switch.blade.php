@props(['category_id'=>0])
<div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
    <select
        name="category_id"
        id="category_id"

        {{$attributes}}
        >
        @foreach(\App\Models\Category::all() as $category)
            <option
                value="{{$category->id}}"
                {{old('category_id',$category_id)==$category->id?'selected':''}}
                >
                {{ucwords($category->name)}}
            </option>
        @endforeach
    </select>
</div>
