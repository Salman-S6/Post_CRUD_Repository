<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepositoryInterface;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private PostRepositoryInterface $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = $this->postRepository->getAllPosts();

        return response()->json([
            'status' => 'success',
            'message' => 'All posts were retrieved successfully.',
            'data' => $posts
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $validatedPost = $request->validated();

        $post = $this->postRepository->createPost($validatedPost);

        return response()->json([
            'status' => 'success',
            'message' => 'The post was created successfully.',
            'data' => $post
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($postId)
    {
        $post = $this->postRepository->findPost($postId);

        return response()->json([
            'status' => 'success',
            'message' => 'The post was retrieved successfully.',
            'data' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, $postId)
    {
        $validatedPost = $request->validated();

        $updatedPost = $this->postRepository->updatePost($postId, $validatedPost);

        return response()->json([
            'status' => 'success',
            'message' => 'The post was updated successfully',
            'data' => $updatedPost
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($postId)
    {
        $this->postRepository->destroyPost($postId);

        return response()->json([
            'status' => 'success',
            'message' => 'The post was deleted successfully'
        ]);
    }
}
