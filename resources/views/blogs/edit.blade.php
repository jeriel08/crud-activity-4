<x-app-layout>
    <div class="container max-w-2xl mx-auto p-4 d-flex justify-content-center">
        <div class="col-8">
            <!-- Header -->
            <h3 class="mb-4">{{ __('Edit Blog') }}</h3>

            <!-- Blog Form -->
            <form hx-post="{{ route('blogs.update', $blog->id) }}"
                hx-target="body"
                hx-swap="outerHTML">
                @csrf
                @method('PUT') <!-- Use PUT method for updates -->

                <!-- Title Input -->
                <div class="mb-3">
                    <label for="title" class="form-label">{{ __('Title') }}</label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        placeholder="{{ __('Enter your blog title') }}"
                        class="form-control"
                        value="{{ old('title', $blog->title) }}" <!-- Pre-fill with existing title -->
                    
                    @if ($errors->has('title'))
                        <div class="alert alert-danger mt-2">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                </div>

                <!-- Content Textarea -->
                <div class="mb-3">
                    <label for="content" class="form-label">{{ __('Content') }}</label>
                    <textarea
                        name="content"
                        id="content"
                        placeholder="{{ __('What\'s on your mind?') }}"
                        class="form-control"
                        rows="5"
                    >{{ old('content', $blog->content) }}</textarea> <!-- Pre-fill with existing content -->
                    @if ($errors->has('content'))
                        <div class="alert alert-danger mt-2">
                            {{ $errors->first('content') }}
                        </div>
                    @endif
                </div>

                <!-- Buttons -->
                <div class="d-flex gap-3">
                    <button type="submit" class="btn btn-primary d-flex align-items-center justify-content-center gap-2">
                        <i class='bx bx-upload fs-5'></i>
                        {{ __('Update') }}
                    </button>
                    <a  href="{{ route('blogs.index') }}" 
                        class="btn btn-secondary"
                        hx-boost="true"
                        hx-push-url="true">
                        {{ __('Cancel') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>