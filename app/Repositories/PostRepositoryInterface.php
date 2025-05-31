<?php

namespace App\Repositories;

interface PostRepositoryInterface
{
    public function getAllPosts();

    public function createPost(array $postDetails);

    public function findPost($postId);

    public function updatePost($postId, array $newDetails);

    public function destroyPost($postId);
}
