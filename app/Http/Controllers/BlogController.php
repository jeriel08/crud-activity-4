<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch blogs authored by the authenticated user
        $blogs = Blog::where('user_id', Auth::id())->latest()->get();

        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs.create', [
            'blogs' => Blog::with('author') -> latest() -> get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
 
        $request->user()->blogs()->create($validated);
 
        return redirect(route('blogs.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        Gate::authorize('update', $blog);

        return view('blogs.edit', [
            'blog' => $blog,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        Gate::authorize('update', $blog);

         // Validate the request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Update the blog post
        $blog->update($validated);

        // Redirect with success message
        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Blog $blog)
    {
        $blog->delete();

        if ($request->hasHeader('HX-Request')) {
            // Render the full index page (with layout) since we're replacing the entire <body>
            $response = view('blogs.index', ['blogs' => Blog::all()]);

            // Add HX-Location header to update the browser URL to /blogs
            return response($response)
                ->header('HX-Location', route('blogs.index'));
        }

        // For non-htmx requests, redirect to the index
        return redirect()->route('blogs.index');
    }
}
