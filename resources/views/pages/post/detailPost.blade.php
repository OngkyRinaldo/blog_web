@extends('layouts.main.template')

@section('title')

{{Str::limit($post->title, 10) }}

@endsection


@section('main')

<section class="p-5">
    <a href="{{ route('guest.index') }}" class="text-xs md:text-base underline cursor-pointer hover:text-red-500">Back
        to Home
        Page</a>
    <h2 class="mt-5  text-center font-bold md:text-xl">{{ $post->title }}</h2>
    <a href="{{ route('guest.category', $post->category) }}"
        class="block mt-5 text-end cursor-pointer hover:text-slate-800 font-semibold text-slate-500 md:text-lg">{{$post->category->title
        }}</a>

    <div class="rounded-md mt-5 h-full w-full">
        @if($post->image)

        <img src="{{ asset('/storage/posts/' . $post->image) }}" alt="{{ $post->title }}" class="mb-3 object-cover">

        @else

        <img src="https://source.unsplash.com/1200x400?{{ $post->category->title }}" alt="" class="mb-3 object-cover">
        @endif
    </div>

    <div class="text-justify text-slate-600 mt-5 md:text-xl">
        <p>{!! $post->content !!}</p>

        <div class="flex justify-end items-center gap-x-4 mt-5 font-semibold md:text-xl">
            <a href="{{ route('guest.author', $post->post_author) }}"
                class="cursor-pointer hover:text-slate-800 ">Created By {{ $post->post_author->username }} </a>
            <p>{{
                $post->created_at->diffForHumans() }}</p>
        </div>
    </div>

    <div class="flex justify-center md:justify-start items-center  gap-x-2">
        @foreach ($post->tags as $tag)
        <a href="{{ route('guest.tag', $tag) }}"
            class="block w-fit rounded-md bg-slate-700 text-white py-1 px-2 text-center md:py-2 md:px-4 mt-2 md:mt-5">{{
            $tag->title
            }}</a>
        @endforeach
    </div>
</section>
@endsection