@extends('layouts.main.template')

@section('title')
Posts - Blog

@endsection

@section('main')

<section class=" min-h-screen w-full">
    <div class=" mt-5 p-5 ">
        <form action="{{ route('guest.index') }}">
            <div class="flex justify-center  items-center gap-x-2 ">
                <input type="text" class="py-2 px-4 rounded-lg w-full " placeholder="search..." name="search"
                    value="{{ request('search') }}">
                <button class="py-2 px-4 bg-black text-white rounded-md">Search</button>
            </div>
        </form>
    </div>
    <div class="flex justify-start items-start gap-x-5">
        <div class="p-5 md:p-0 mt-5 w-full md:w-3/4 md:pr-5 md:border-r-2">
            <div class="grid grid-col-1 md:grid-cols-2 gap-x-3 ">
                @foreach ($posts as $post)

                <div class="md:mt-5 border-b-2 pb-5">
                    <div class="grid grid-col-1 md:grid-cols-2 md:gap-x-2">
                        <div class=" w-full flex flex-col py-3 md:py-14 ">
                            <h3 class="text-slate-500"> {{ $post->category->title }}</h3>
                            <h2 class="font-bold"> {{Str::limit($post->title, 46) }}
                            </h2>
                            <p class="text-slate-500">By {{ $post->post_author->username }} on {{
                                $post->created_at->diffForHumans() }}</p>
                            </p>

                        </div>
                        <div class="h-56 w-56 mx-auto md:mx-0">

                            @if ($post->image)

                            <img src="{{ asset('/storage/posts/' . $post->image) }}" alt="{{
                                $post->title }}" class="h-full w-full object-cover rounded-md">

                            @else

                            <img src="https://source.unsplash.com/640x960?{{ $post->category->title }}" alt="unsplash"
                                class="h-full w-full object-cover rounded-md">

                            @endif
                        </div>

                    </div>
                    <div class="mt-5 md:mt-2">
                        <p class="text-slate-500">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Adipisci
                            officia
                            est, ea, ullam
                            debitis saepe reiciendis, libero corporis sit qui cum totam nobis itaque pariatur ab placeat
                            quidem
                            earum eveniet.</p>
                        <a href="#"
                            class="ml-auto block w-fit rounded-md bg-slate-700 text-white py-2 px-4 mt-2 md:mt-5">Read
                            More</a>
                    </div>
                </div>

                @endforeach
            </div>

        </div>
        <x-main.home.ads />
    </div>


</section>

@endsection