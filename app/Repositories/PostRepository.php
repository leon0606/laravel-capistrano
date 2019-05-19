<?php


namespace App\Repositories;


use App\Post;

class PostRepository
{
    /**
     * @var Post
     */
    protected $post;

    /**
     * PostRepository constructor.
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * 获取文章列表
     * @return Post
     */
    public function getPostList()
    {
        return $this->post
            ->orderBy('created_at', 'desc')
            ->withCount(['comments','zans'])
            ->paginate(6);
    }


    /**
     * @return mixed
     */
    public function store()
    {
        // 校验
        \request()->validate([
            'title' => 'required|string|min:5|max:30',
            'content' => 'required|string|min:10'
        ]);
        $user_id = \Auth::id();
        $params = array_merge(\request(['title', 'content']), compact('user_id'));

        // 逻辑
        return Post::create($params);
    }

    /**
     * @param Post $post
     * @return mixed
     */
    public function update(Post $post)
    {
        // 校验
        \request()->validate([
            'title' => 'required|string|min:5|max:30',
            'content' => 'required|string|min:10'
        ]);
        $post->title = request('title');
        $post->content = request('content');
        return $post->save();
    }


}