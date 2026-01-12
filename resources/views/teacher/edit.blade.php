@extends('layouts.app')

@section('title', 'Edit Homework')
@section('subtitle', 'Edit Homework')

@section('content')
<div class="max-w-xl mx-auto mt-10">
    <div class="bg-white shadow-lg rounded-xl p-8">
        <form action="{{ route('teacher.edit', $homework->first()->id) }}" method="post" class="space-y-5">
            @csrf
            <div>
                <label for="subject_id" class="block text-sm font-medium text-gray-700 mb-1">
                    Subject
                </label>
                <select name="subject_id" id="subject_id" required class="p-2 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 transition border-2">
                    <option value="" disabled>Choose subject</option>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}"
                            {{ old('subject_id', $homework->first()->subject_id) == $subject->id ? 'selected' : '' }}>
                            {{ $subject->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">
                    Homework Title
                </label>
                <input type="text" id="title" name="title" required value="{{ old('title', $homework->first()->title) }}" class="w-full rounded-lg border-2 p-2 border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 transition">
            </div>
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">
                    Description
                </label>
                <textarea id="description" name="description" rows="3" class="w-full rounded-lg border-gray-300 border-2 focus:border-indigo-500 focus:ring focus:ring-indigo-200 transition p-2">{{ old('description', $homework->first()->description) }}</textarea>
            </div>
            <div class="pt-4">
                <button type="submit" class="w-full bg-indigo-600 text-white py-2.5 rounded-lg font-semibold hover:bg-indigo-700 active:scale-95 transition">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
