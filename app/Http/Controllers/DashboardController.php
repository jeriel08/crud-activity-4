<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch all blog posts with their authors, ordered by latest first
        $blogs = Blog::with('author')->latest()->get();

        // Pass the blogs to the dashboard view
        return view('dashboard', compact('blogs'));
    }
}
