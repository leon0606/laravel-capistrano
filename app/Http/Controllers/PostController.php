<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\Services\PostService;
use App\Zan;
use Illuminate\Http\Request;

/**
 * Class PostController
 * @package App\Http\Controllers
 */
class PostController extends Controller
{
    /**
     * @var PostService $postService
     */
    protected $postService;

    /**
     * PostController constructor.
     * @param PostService $postService
     */
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $posts = $this->postService->getPostList();

//        return $posts;
        return view('post.index', compact('posts'));
    }

    /**
     * 创建页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('post.create');
    }


    /**
     * 创建逻辑
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store()
    {
        $this->postService->store();
        // 渲染
        return redirect('/posts');
    }

    /**
     * 详情页面
     * @param Post $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Post $post)
    {
        $post->load('comments');
        return view('post.show', compact('post'));
    }

    /**
     * 编辑页面
     * @param Post $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Post $post)
    {
        return view('post.edit',compact('post'));
    }

    /**
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Post $post)
    {
        $this->authorize('update', $post);
        $this->postService->update($post);
        return redirect('/posts/'.$post->id);
    }

    /**
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function delete(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return redirect('/posts');
    }


    /**
     * 上传图片
     * @param Request $request
     * @return string
     */
    public function imageUpload(Request $request)
    {
        $path = $request->file('wangEditorH5File')->storePublicly(md5(time()));
        return asset('storage/'.$path);
    }

    /**
     * 提交评论
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function comment(Post $post)
    {
        $this->validate(request(),[
            'content' => 'required|min:3'
        ]);

        $comment = new Comment();
        $comment->user_id = \Auth::id();
        $comment->content = request('content');
        $post->comments()->save($comment);
        return back();
    }

    public function zan(Post $post)
    {
        $params = [
            'user_id' => \Auth::id(),
            'post_id' => $post->id
        ];
        Zan::firstOrCreate($params);
        return back();
    }

    public function unzan(Post $post)
    {
        $post->zan(\Auth::id())->delete();
        return back();
    }

    public function search()
    {
        // 验证
        $this->validate(request(),[
            'query' => 'required'
        ]);

        // 逻辑
        $query = request('query');
        $posts = Post::search($query)->paginate(2);

        // 渲染
        return view('post.search',compact('posts','query'));
    }

}
