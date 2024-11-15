@extends('layouts.app')

@section('content')
    <div class="form-container">
        <h2>Create New Idea</h2>

        <form action="{{ route('ideas.store') }}" method="POST" class="idea-form">
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}"
                       class="form-input @error('title') is-invalid @enderror">
                @error('title')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <select name="category" id="category"
                        class="form-input @error('category') is-invalid @enderror">
                    <option value="">Select Category</option>
                    <option value="Writing">Writing</option>
                    <option value="Art">Art</option>
                    <option value="Business">Business</option>
                    <option value="Technology">Technology</option>
                    <option value="Education">Education</option>
                </select>
                @error('category')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" rows="4"
                          class="form-input @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="priority_level">Priority Level (1-5)</label>
                <input type="number" name="priority_level" id="priority_level"
                       min="1" max="5" value="{{ old('priority_level') }}"
                       class="form-input @error('priority_level') is-invalid @enderror">
                @error('priority_level')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-submit">Create Idea</button>
        </form>
    </div>
@endsection
