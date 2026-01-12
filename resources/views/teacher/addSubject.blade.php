@extends('layouts.app')

@section('title', 'Add Subject')
@section('subtitle', 'Add Subject')

@section('content')
<div class="max-w-xl mx-auto mt-10">
    <div class="bg-white shadow-lg rounded-xl p-8">
        <form action="{{ route('teacher.storeSubject') }}" method="post" class="space-y-5">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                    Subject Name
                </label>
                <input type="text" id="name" name="name" required value="{{ old('name') }}" class="w-full rounded-lg border-2 p-2 border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 transition">
            </div>
            <div class="pt-4">
                <button type="submit" class="w-full bg-indigo-600 text-white py-2.5 rounded-lg font-semibold hover:bg-indigo-700 active:scale-95 transition">
                    Create Subject
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
