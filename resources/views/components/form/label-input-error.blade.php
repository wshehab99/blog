@props(['name'])
<x-form.field>
    <x-form.label name="{{$name}}"></x-form.label>
    <x-form.input name="{{$name}}" {{$attributes}}></x-form.input>
    <x-form.error name="{{$name}}"></x-form.error>
</x-form.field>
