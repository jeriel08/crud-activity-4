<x-app-layout>
    <div class="container max-w-2xl mx-auto p-4">
        <!-- Header with Go Back, Edit, and Delete Buttons -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <!-- Go Back Button -->
            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                {{ __('Go Back') }}
            </a>
            
            @if ($blog->author->is(auth()->user()))
                <!-- Edit and Delete Buttons -->
                <div>
                    <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-primary me-2">
                        {{ __('Edit') }}
                    </a>
                    <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this blog?')">
                            {{ __('Delete') }}
                        </button>
                    </form>
                </div>
            @endif
        </div>

        <!-- Blog Content -->
        <div class="card">
            <div class="card-body">
                <!-- Blog Title -->
                <h1 class="card-title font-weight-bold">{{ $blog->title }}</h1>

                <!-- Author and Creation Time -->
                <p class="card-text">{{ __('By: ') }}{{ $blog->author->name }}</p>
                <p class="card-text">
                    <small class="text-muted">{{ $blog->created_at->diffForHumans() }}</small>
                </p>

                <hr>

                <!-- Blog Content -->
                <p class="card-text mt-4">{{ $blog->content }}</p>
            </div>
        </div>
    </div>
</x-app-layout>