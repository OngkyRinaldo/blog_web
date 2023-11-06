@extends('layouts.main.template')

@section('title')
{{ $tag->title }}

@endsection


@section('main')

<section class="p-5">
    <a href="{{ route('guest.index') }}" class="text-xs md:text-base underline cursor-pointer hover:text-red-500">Back
        to Home
        Page</a>

    <h2 class="text-center font-bold md:text-2xl">{{ $tag->title }}</h2>
    <div class="grid grid-cols-1 md:grid-cols-3">
        @foreach ($posts as $post)
        <div class="mt-5 max-w-sm bg-white border border-gray-200 rounded-lg shadow ">
            <div class="rounded-md h-fit w-fit p-3">
                @if($post->image)
                <img src="{{ asset('/storage/posts/' . $post->image) }}" alt="{{ $post->title }}"
                    class="mb-3 object-cover">
                @else
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->title }}" alt=""
                    class="mb-3 object-cover">
                @endif
            </div>

            <div class="p-5">

                <h5 class="mb-2  md:text-2xl font-bold tracking-tight text-gray-900 ">{{ Str::limit($post->title,46) }}
                </h5>

                <p class="mb-3 font-normal text-gray-700 ">{!! Str::limit($post->descriptions,100) !!}</p>

                <a href="{{ route('guest.post', $post) }}"
                    class="cursor-pointer flex gap-x-3 justify-center items-center w-full  rounded-md bg-slate-700 text-white py-2 px-4 mt-2 md:mt-5">
                    Read more <i class="fa-solid fa-arrow-right"></i>
                </a>

            </div>
        </div>
        @endforeach
    </div>


</section>
@endsection