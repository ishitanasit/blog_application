<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'tags' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $blogPost = new BlogPost();
        $blogPost->title = $request->title;
        $blogPost->content = $request->content;
        $blogPost->tags = $request->tags;
        $blogPost->user_id = auth()->id();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $blogPost->image = $imagePath;
        }

        $blogPost->save();

        return redirect()->route('home.index')->with('success', 'Blog post created successfully!');
    }
    public function show()
    {
        $user_id = auth()->id();
        $blogPosts = BlogPost::where('user_id', $user_id)->latest()->get(); // Fetch only posts belonging to the user
        return view('blog.show', compact('blogPosts'));
    }
    public function edit($id)
    {
        $blog = BlogPost::findOrFail($id); // Retrieve the blog post by its ID
        return view('blog.edit', compact('blog')); // Pass the $blog variable to the view
    }

public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
        'tags' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $blogPost = BlogPost::findOrFail($id);
    $blogPost->title = $request->title;
    $blogPost->content = $request->content;
    $blogPost->tags = $request->tags;

    if ($request->hasFile('image')) {
        // Handle image update logic here
    }

    $blogPost->save();

    return redirect()->route('home.index')->with('success', 'Blog post updated successfully!');
}

public function destroy($id)
{
    $post = BlogPost::findOrFail($id);
    $post->delete();

    return redirect()->route('home.index')->with('success', 'Blog post deleted successfully!');
}

}
