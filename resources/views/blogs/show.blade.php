<x-app-layout>
    <div class="container max-w-2xl mx-auto p-4">
        <!-- Header with Go Back, Edit, and Delete Buttons -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <!-- Go Back Button -->
            <a href="{{ url()->previous() }}" 
                class="btn btn-outline-secondary d-flex align-items-center justify-content-center gap-2"
                hx-boost="true"
                hx-push-url="true">
                <i class='bx bx-arrow-back'></i>
                {{ __('Go Back') }}
            </a>
            
            @if ($blog->author->is(auth()->user()))
                <div class="d-flex align-items-center">
                    <a href="{{ route('blogs.edit', $blog->id) }}" 
                        class="btn btn-primary me-2 d-flex align-items-center justify-content-center gap-2"
                        hx-boost="true"
                        hx-push-url="true">
                        <i class='bx bx-edit' ></i>
                        {{ __('Edit') }}
                    </a>
                    <form hx-delete="{{ route('blogs.destroy', $blog->id) }}" 
                        hx-target="body"
                        hx-swap="outerHTML">    
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger d-flex align-items-center justify-content-center gap-2">
                            <i class='bx bx-trash-alt' ></i>
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