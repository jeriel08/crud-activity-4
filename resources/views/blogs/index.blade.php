<x-app-layout>
    <div class="container max-w-2xl mx-auto p-4 d-flex justify-content-center">
        <div class="col-8">
            

            <!-- Label for Posts -->
            <div class="mt-4">
                <h5 class="mt-3 fw-semibold display-5">{{ __('Your Blogs') }}</h5>
            </div>

            <!-- Blog Posts -->
            <div class="mt-4">
                <!-- Button to Write Blog -->
                <div class="col-3 me-3 mb-4">
                    <a href="{{ route('blogs.create') }}" class="btn btn-success d-flex align-items-center justify-content-center gap-2">
                        <i class='bx bx-book-add fs-5' ></i>
                        {{ __('Write Blog') }}
                    </a>
                </div>
                @if($blogs->isEmpty())
                    <div class="card mx-4 mb-4">
                        <div class="card-body">
                            <p class="card-text">{{ __('You have no blogs yet. Start writing now!') }}</p>
                        </div>
                    </div>
                @else
                    @foreach($blogs as $blog)
                        <div class="card mx-4 mb-4">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <!-- Blog Title as Hyperlink -->
                                        <h3 class="card-title font-weight-bold">
                                            <a href="{{ route('blogs.show', $blog->id) }}" class="text-decoration-none text-dark px-4 py-3 rounded-3">
                                                {{ $blog->title }}
                                            </a>
                                        </h3>
                                        <!-- Author Name -->
                                        <p class="card-text ms-4 mb-2">{{ __('By: ') }}{{ $blog->author->name }}</p>
                                    </div>
                                    <!-- Creation Time -->
                                    <div class="text-muted me-4">
                                        <small>{{ $blog->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</x-app-layout>