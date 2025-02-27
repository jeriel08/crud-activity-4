<x-app-layout>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Welcome Message -->
                <h3 class="mb-4 fw-bold display-5">{{ __('Welcome back, ') }}{{ Auth::user()->name }}!</h3>

                <!-- Label for Latest Blog Posts -->
                <h5 class="mt-4">{{ __('Latest Blog Posts') }}</h5>

                <!-- Blog Posts -->
                <div class="mt-4">
                    @if($blogs->isEmpty())
                        <div class="card mx-4 mb-4">
                            <div class="card-body">
                                <p class="card-text">{{ __('No blog posts available yet.') }}</p>
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
                                                <a href="{{ route('blogs.show', $blog->id) }}" class="text-decoration-none text-dark px-4 py-3 rounded-5">
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
    </div>
</x-app-layout>
