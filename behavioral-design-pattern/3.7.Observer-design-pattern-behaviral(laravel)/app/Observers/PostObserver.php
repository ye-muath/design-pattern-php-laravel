<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Log;

class PostObserver
{
        // تُستدعى عند إنشاء مقال جديد
        public function created(Post $post)
        {
            Log::info('تم إنشاء مقال جديد: ' . $post->title);
        }
    
        // تُستدعى عند تحديث مقال
        public function updated(Post $post)
        {
            Log::info('تم تحديث المقال: ' . $post->title);
        }

    /**
     * Handle the Post "deleted" event.
     */
    public function deleted(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "restored" event.
     */
    public function restored(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     */
    public function forceDeleted(Post $post): void
    {
        //
    }
}
