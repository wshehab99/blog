@extends('components.layout')
@section('content')
    <?php foreach ($posts as $post) { ?>
    <article>
        <a href="<?php echo "post/".$post->id;?>">
            <h1>
                    <?php echo $post->title; ?>
            </h1>

        </a>
{{--        <a href="<?php echo "/category/".$post->category->id;?>">{{$post->category->name}}</a>--}}

        <p>
                <?php echo $post->excerpt; ?>
        </p>
    </article>
    <?php } ?>
@endsection

