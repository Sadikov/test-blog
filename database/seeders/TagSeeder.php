<?php

namespace Database\Seeders;

use DB;
use App\Models\Article;
use Database\Factories\TagFactory;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Throwable
     */
    public function run()
    {
        (new TagFactory())->count(20)->create();
        DB::transaction(function () {
            $articleIds = Article::query()->select('id')->get()->pluck('id');
            $tagIds = Tag::query()->select('id')->get()->pluck('id')->toArray();

            $articleIds->each(function ($articleId) use ($tagIds) {
                $tagsCount = rand(1, 4);
                for ($i = 0; $i < $tagsCount; $i++) {
                    DB::table('article_tag')->insert([
                        'article_id' => $articleId,
                        'tag_id' => $tagIds[rand(0, count($tagIds) - 1)],
                    ]);
                }
            });
        });
    }
}
