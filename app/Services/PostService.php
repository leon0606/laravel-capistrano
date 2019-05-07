<?php


namespace App\Services;


use App\Post;
use App\Repositories\PostRepository;

class PostService
{

    /**
     * @var PostRepository $postRepository
     */
    protected $postRepository;

    /**
     * PostService constructor.
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * 获取文章列表
     *
     * @return \App\Post
     */
    public function getPostList()
    {
        return $this->postRepository->getPostList();
    }


    /**
     * @return \App\Post
     */
    public function store()
    {
        return $this->postRepository->store();
    }

    public function update(Post $post)
    {
        return $this->postRepository->update($post);
    }

}