@props(['tagsCsv'])

@php
    $tags = explode(',' , $tagsCsv); // it turns the comma separarated values into an array and put it in this variable,
@endphp

<ul class="flex">
    @foreach($tags as $tag)
    <li
        class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
        <a href="/?tag={{$tag}}">{{$tag}}</a>
    </li>
    @endforeach
</ul>