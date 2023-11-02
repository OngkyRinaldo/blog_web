@extends('layouts.admin.admin')


@section('title')
Admin - Dashboard
@endsection


@section('main')

<div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                        <tr>

                            <th scope="col" class="px-6 py-3">
                                Username
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Role
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

                        @foreach ($users as $user)
                        @if ($user->role != 'admin')
                        <tr class="bg-white border-b text-gray-900 cursor-pointer">

                            <td class="px-6 py-4">
                                {{ $user->username }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->role }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->created_at->diffForHumans() }}
                            </td>
                            <td class="px-6 py-4 flex gap-x-2 ">

                                <form onsubmit="return confirm('Are you sure delete this user ?')"
                                    action="{{ route('admin.deleteUser', $user) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500  py-2 px-4 md:py-3 md:px-6 rounded-lg hover:font-semibold">Delete</button>
                                </form>

                            </td>
                        </tr>
                        @endif
                        @endforeach


                    </tbody>
                </table>
            </div>


        </div>
    </div>
</div>

@endsection