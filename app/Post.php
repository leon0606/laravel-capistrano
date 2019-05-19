<?php

namespace App;

use App\Model;
use Laravel\Scout\Searchable;
/**
 * @property integer id
 * @property array|\Illuminate\Http\Request|string title
 * @property array|\Illuminate\Http\Request|string content
 * @property integer user_id
 */
class Post extends Model
{
    use Searchable;

    /**
     * 定义索引里面的type
     * @return string
     */
    public function searchableAs()
    {
        return 'post';
    }

    /**
     * 定义哪些字段需要搜索
     * @return array
     */
    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'content' => $this->content
        ];
    }

    /**
     * 关联用户
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * 关联评论
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Comment')->orderBy('created_at', 'desc');
    }

    public function zan($userId)
    {
        return $this->hasOne('App\Zan')->where('user_id',$userId);
    }

    public function zans()
    {
        return $this->hasMany('App\Zan');
    }
}
