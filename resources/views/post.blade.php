@extends('components.layout')

@section('content')
    <article>
        <h1><?= $post->title; ?></h1>
        By: <a href="<?php echo "/users/".$post->author->username;?>">  {{$post->author->name}}</a>
       In  <a href="<?php echo "/category/".$post->category->id;?>">{{$post->category->name}}</a>
        <p>
            <?= $post->body; ?>
        </p>
    </article>
    <a href="/">Go Back</a>
@endsection
