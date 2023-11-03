@extends('layouts.admin.admin')


@section('title')
Admin - User
@endsection

@section('header')

<div class="flex justify-between items-center">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Tags') }}
    </h2>
    <a href="{{ route('tag.create') }}"
        class=" text-lg text-blue-600 leading-tight cursor-pointer hover:text-blue-800">Create New
        Tag</a>
</div>


@endsection


@section('main')

@if (session('success'))

<div class="mx-auto max-w-md bg-green-200 text-green-500 text-center py-4 px-8 rounded-lg mt-2" role="alert">
    {{ session('success') }}
</div>

@endif

<div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No.
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Title
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Time
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($tags as $tag)
                        <tr class="bg-white border-b text-gray-900 cursor-pointer">
                            <th scope="row" class="px-6 py-4 ">
                                {{ $loop->iteration }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $tag->title }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $tag->created_at->diffForHumans() }}
                            </td>
                            <td class="px-6 py-4 flex flex-col gap-y-2 md:flex-row md:gap-x-2 md:gap-y-0  ">
                                <a href="{{ route('tag.edit', $tag->slug) }}"
                                    class="bg-yellow-400  py-2 px-4 md:py-3 md:px-6 rounded-lg hover:font-semibold">Edit</a>
                                <form onsubmit="return confirm('Are you sure delete this tag ?')"
                                    action="{{ route('tag.destroy', $tag) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500  py-2 px-4 md:py-3 md:px-6 rounded-lg hover:font-semibold">Delete</button>
                                </form>

                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>


        </div>
    </div>
</div>

@endsection