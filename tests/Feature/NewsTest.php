<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\News;

class NewsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_view_all_news()
    {
        $response = $this->get('/news');
        $response->assertStatus(200);
    }

    /** @test */
    public function a_user_can_view_the_news_creation_form()
    {
        $response = $this->get('/news/create');
        $response->assertStatus(200);
    }

    /** @test */
    public function a_user_can_create_a_news_item()
    {
        $newsData = [
            'title' => 'Test News',
            'resume' => 'This is a test news summary.',
            'author' => 'Author Name',
        ];

        $this->post('/news', $newsData)
             ->assertRedirect('/news');

        $this->assertDatabaseHas('news', ['title' => 'Test News']);
    }

    /** @test */
    public function a_user_can_view_a_single_news_item()
    {
        $newsItem = News::create([
            'title' => 'Sample News',
            'resume' => 'This is a sample news item.',
            'author' => 'Author Name',
        ]);

        $response = $this->get('/news/'.$newsItem->id);
        $response->assertStatus(200)
                ->assertSee($newsItem->title)
                ->assertSee($newsItem->author);
    }

    /** @test */
    public function a_user_can_view_edit_form_for_a_news_item()
    {
        $newsItem = News::create([
            'title' => 'Sample News',
            'resume' => 'This is a sample news item.',
            'author' => 'Author Name',
        ]);

        $response = $this->get('/news/'.$newsItem->id.'/edit');
        $response->assertStatus(200)
                ->assertSee($newsItem->title)
                ->assertSee($newsItem->author);
    }

    /** @test */
    public function a_user_can_update_a_news_item()
    {
        $newsItem = News::create([
            'title' => 'Original Title',
            'resume' => 'Original summary.',
            'author' => 'Original Author',
        ]);

        $this->put('/news/'.$newsItem->id, [
            'title' => 'Updated Title',
            'resume' => 'Updated summary.',
            'author' => 'Updated Author',
        ])->assertRedirect('/news');

        $this->assertDatabaseHas('news', [
            'id' => $newsItem->id,
            'title' => 'Updated Title',
            'author' => 'Updated Author',
        ]);
    }

    /** @test */
    public function a_user_can_delete_a_news_item()
    {
        $newsItem = News::create([
            'title' => 'Sample News',
            'resume' => 'This is a sample news item.',
            'author' => 'Author Name',
        ]);

        $this->delete('/news/'.$newsItem->id)
            ->assertRedirect('/news');

        $this->assertDatabaseMissing('news', ['id' => $newsItem->id]);
    }
}
