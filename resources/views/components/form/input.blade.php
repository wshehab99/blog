@props(['name','type'=>'text'])
<input
    class="border border-grey-400 p-2 w-full"
    type="{{$type}}"
    name="{{$name}}"
    id="{{$name}}"
    value="{{old("$name")}}"
    required
>
