<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository implements PostRepositoryInterface
{
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function getAllPosts()
    {
        return $this->post->all();
    }

    public function createPost(array $postDetails)
    {
        return $this->post->create($postDetails);
    }

    public function findPost($postId)
    {
        return $this->post->findOrFail($postId);
    }

    public function updatePost($postId, array $newDetails)
    {
        $this->post->whereId($postId)->update($newDetails);
        $updatedPost = $this->findPost($postId);
        return $updatedPost;
    }

    public function destroyPost($postId)
    {
        return $this->post->destroy($postId);
    }
}
