<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Comment;

class AddCommentToArticleJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $articleId, $subject, $text;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($articleId, $subject, $text)
    {
        $this->articleId = $articleId;
        $this->subject = $subject;
        $this->text = $text;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $comment = new Comment();
        $comment->subject = $this->subject;
        $comment->text = $this->text;
        $comment->article_id = $this->articleId;
        $comment->save();

    }
}
