<?php

namespace App;

use App\Model;

/**
 * @property integer id
 * @property array|\Illuminate\Http\Request|string title
 * @property array|\Illuminate\Http\Request|string content
 * @property integer user_id
 */
class Post extends Model
{
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
}
