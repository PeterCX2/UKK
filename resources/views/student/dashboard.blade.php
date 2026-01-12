@extends('layouts.app')

@section('title', 'Student Dashboard')
@section('subtitle', 'Student Dashboard')

@section('content')
    <form method="POST" action="{{ route('logout') }}" class="py-5">
        @csrf
        <button class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">
            Log Out
        </button>
    </form>

    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base p-5">
        <h1 class="font-heading text-2xl font-extrabold mb-4">Homework</h1>
        <table class="w-full text-sm text-left rtl:text-right text-body">
            <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
                <tr>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Subject
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Homework
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Created At
                    </th>
                    <th scope="col" class="px-12 py-3 font-medium">
                        Action
                    </th>
                </tr>
            </thead> 
            <tbody>
                @foreach ($homeworks as $homework)
                <tr class="bg-neutral-primary border-b border-default">
                    <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                        {{ $homework->subject->name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $homework->title }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $homework->description }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $homework->created_at->format('d M Y') }}
                    </td>
                    <td class="px-6 py-4">
                        <a href="/student/done/{{ $homework->id }}">Done</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $homeworks->links() }}
        </div>
    </div>
@endsection