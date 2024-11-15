@extends('layouts.app')

@section('content')
    <div class="form-container">
        <h2>Edit Idea</h2>

        <form action="{{ route('ideas.update', $idea) }}" method="POST" class="idea-form">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title"
                       value="{{ old('title', $idea->title) }}"
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
                    @foreach(['Writing', 'Art', 'Business', 'Technology', 'Education'] as $category)
                        <option value="{{ $category }}"
                                {{ old('category', $idea->category) == $category ? 'selected' : '' }}>
                            {{ $category }}
                        </option>
                    @endforeach
                </select>
                @error('category')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" rows="4"
                          class="form-input @error('description') is-invalid @enderror">{{ old('description', $idea->description) }}</textarea>
                @error('description')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="priority_level">Priority Level (1-5)</label>
                <input type="number" name="priority_level" id="priority_level"
                       min="1" max="5" value="{{ old('priority_level', $idea->priority_level) }}"
                       class="form-input @error('priority_level') is-invalid @enderror">
                @error('priority_level')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-submit">Update Idea</button>
        </form>
    </div>
@endsection
