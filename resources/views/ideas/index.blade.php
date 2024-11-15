@extends('layouts.app')

@section('content')
    <div class="search-container">
        <form action="{{ route('ideas.index') }}" method="GET" class="search-form">
            <input type="text" name="search" value="{{ request('search') }}"
                   placeholder="Search ideas..." class="search-input">
            <button type="submit" class="search-button">Search</button>
        </form>
    </div>

    <div class="ideas-grid">
        @foreach($ideas as $idea)
            <div class="idea-card priority-{{ $idea->priority_level }}">
                <h3>{{ $idea->title }}</h3>
                <div class="category-badge">{{ $idea->category }}</div>
                <p>{{ $idea->description }}</p>
                <div class="card-footer">
                    <span class="priority-label">Priority: {{ $idea->priority_level }}/5</span>
                    <div class="btn-group" role="group">
                        <a href="{{ route('ideas.edit', $idea) }}" class="btn btn-primary mr-2">Edit</a>
                        <form action="{{ route('ideas.destroy', $idea) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="pagination">
        {{ $ideas->links('pagination::bootstrap-4') }}
    </div>
@endsection
