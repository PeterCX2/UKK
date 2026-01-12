@extends('layouts.app')

@section('title', 'Teacher Dashboard')
@section('subtitle', 'Teacher Dashboard')

@section('content')
    <div class="py-5 flex flex-row justify-between w-full">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">
                Log Out
            </button>
        </form>

        <a href="{{ route('teacher.addSubject') }}">
            <button class="bg-purple-500 hover:bg-purple-400 text-white font-bold py-2 px-4 border-b-4 border-purple-700 hover:border-purple-500 rounded">
                Add Subject
            </button>
        </a>

        <a href="{{ route('teacher.create') }}">
            <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                Create
            </button>
        </a>
    </div>
    

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
                        <a href="/teacher/edit/{{ $homework->id }}" class="px-5">Edit</a>
                        <a href="/teacher/delete/{{ $homework->id }}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $homeworks->links() }}
        </div>
    </div>
    <div class="w-[50%] relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base p-5">
        <h1 class="font-heading text-2xl font-extrabold mb-4">Subject</h1>
        <table class="w-full text-sm text-left rtl:text-right text-body">
            <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
                <tr>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Subject
                    </th>
                    <th scope="col" class="px-12 py-3 font-medium">
                        Action
                    </th>
                </tr>
            </thead> 
            <tbody>
                @foreach ($subjects as $subject)
                <tr class="bg-neutral-primary border-b border-default">
                    <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                        {{ $subject->name }}
                    </th>
                    <td class="px-6 py-4">
                        <a href="/teacher/deleteSubject/{{ $subject->id }}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $subjects->links() }}
        </div>
    </div>
@endsection