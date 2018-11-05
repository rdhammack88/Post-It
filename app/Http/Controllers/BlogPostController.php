<?php

namespace App\Http\Controllers;

use App\User;
use App\BlogPost;
use App\BlogComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $blogPosts = BlogPost::all()->where('public', true);
        $blogPosts = BlogPost::orderBy('created_at', 'desc')->where('public', true)->paginate(10);
        // $blogPosts->user = App\User::find('App\BlogPost');
        // $blogPosts['user'] = 'Dustin';

        foreach ($blogPosts as $blogPost) {
            // $blogPost['user'] = 'Dustin';
            // return $blogPost;
            // $blogPost['user'] = App\User::find('name')->where('id', $blogPost->user_id); //$blogPost->user_id
            // $blogPost['user'] = App\User::find($blogPost->$blogPost['user_id'])->first_name;
            // $blogPost['user'] = App\User::find($blogPost['user_id'])->first_name;
            // $blogPost['user'] = User::find(1);
            $blogPost['user'] = User::find($blogPost['user_id']);
            // $blogPost['comments'] = BlogComment::find($blogPost['id'])->get();
            $blogPost['blog_comments'] = BlogComment::all()->where('blog_id', $blogPost['id']);
        }

        return view('blogs.index')->with('blogPosts', $blogPosts);

        // return response()->json($blogPosts);

        // $blogPosts = BlogPost::all()->where('public', true);
        // $user = App\User::find($blogPosts);
        // return response()->json($blogPosts, $user);
        // return 123;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()) {
            return redirect()->route('home');
        }
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->input('cancel')) {
            return redirect('dashboard');
        }
        /** Validate User Input */
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'category' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:4999'
        ]);

        /** If Validation fails, return error response, else Update the BlogPost */
        if ($validator->fails()) {
            $response = ['response' => $validator->messages(), 'success' => false];
            // $response = array('response' => $validator->messages(), 'success' => false);
            return $response;
        } else {
            /** Handle File Upload */
            if ($request->hasFile('cover_image')) {
                /** Get Filename with Extension */
                $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
                /** Get just the filename */
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                /** Get just the extension */
                $extension = $request->file('cover_image')->getClientOriginalExtension();
                /** Filename to Store */
                $filenameToStore = $filename.'_'.time().'.'.$extension;
                /** Upload Image */
                $path = $request->file('cover_image')->storeAs('public/cover_images', $filenameToStore);
            } else {
                $filenameToStore = 'noimage.jpg';
            }

            /** Insert BlogPost into Db */
            $blogPost = new BlogPost;
            $blogPost->user_id = auth()->user()->id();
            $blogPost->title = $request->input('title');
            $blogPost->category = $request->input('category');
            $blogPost->body = $request->input('body');
            $blogPost->cover_image = $filenameToStore;
            $blogPost->public = $request->input('public') || $request->input('private');
            $blogPost->save();

            return redirect('dashboard')->with('status', 'New blog successfully created!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blogPost = BlogPost::find($id);
        $blogPost['user'] = User::find($blogPost['user_id']);
        $blogPost['blog_comments'] = BlogComment::all()->where('blog_id', $blogPost['id']);
        return view('blogs.show')->with('blogPost', $blogPost);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $blogPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /** Validate User Input */
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'category' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:4999'
        ]);

        /** If Validation fails, return error response, else Update the BlogPost */
        if ($validator->fails()) {
            $response = ['response' => $validator->messages(), 'success' => false];
            // $response = array('response' => $validator->messages(), 'success' => false);
            return $response;
        } else {
            /** Handle File Upload */
            if ($request->hasFile('cover_image')) {
                /** Get Filename with Extension */
                $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
                /** Get just the filename */
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                /** Get just the extension */
                $extension = $request->file('cover_image')->getClientOriginalExtension();
                /** Filename to Store */
                $filenameToStore = $filename.'_'.time().'.'.$extension;
                /** Upload Image */
                $path = $request->file('cover_image')->storeAs('public/cover_images', $filenameToStore);
            } else {
                $filenameToStore = 'noimage.jpg';
            }

            /** Find Blog in Db, and update Blog fields */
            $blogPost = BlogPost::find($id);
            $blogPost->title = $request->input('title');
            $blogPost->category = $request->input('category');
            $blogPost->body = $request->input('body');
            $blogPost->cover_image = $filenameToStore;
            $blogPost->public = $request->input('public');
            $blogPost->save();

            return response()->json($blogPost);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blogPost = BlogPost::find($id);

        /** Delete user uploaded image */
        if ($blogPost->cover_image !== 'noimage.jpg') {
            Storage::delete('public/cover_images/'.$blogPost->cover_image);
        }

        $blogPost->delete();
    }
}
