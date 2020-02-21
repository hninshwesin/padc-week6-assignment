<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostSaveRequest;
use App\Mail\PostCreate;
use App\Mail\PostUpdate;
use App\Repositories\PostRepository;
use App\Services\PostService;
use App\Traits\Notify;
use Illuminate\Http\Request;

class PostController extends Controller
{
    use Notify;

    public function __construct(PostRepository $repository, PostService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('keyword')){
            $posts = $this->repository->searchPost($request->keyword);
        }else{
            if (auth()->guest()) {
                $posts = $this->repository->guestPost();;
            } else {
                $posts = $this->repository->memberPost();
            }
        }

        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', \App\Post::class);

        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
        $this->authorize('create', \App\Post::class);

        $post = $this->service->make($request->validated(),\Auth::user());

        return redirect(route('post.show', $post->id));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show($post)
    {
        $post= $this->repository->find($post);

        $this->authorize('view', $post);

        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit($post)
    {
        $post = $this->repository->find($post);

        $this->authorize('update', $post);

        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostSaveRequest $request,$post)
    {
//        dd($request->validated());
        $post = $this->repository->find($post);
        $this->authorize('update', $post);

        $this->service->update($request->validated(), $post);
        return redirect()->route('post.show', $post->id);

//        dd($this->notifyAdminViaSlack("this message will send to admin"));
//        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
