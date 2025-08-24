<?php

namespace Tests\Feature;

use App\Models\Note;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NotesControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index()
    {
        $user = User::factory()->create();
        $note = Note::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user, 'api')->getJson('/api/notes');

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'data' => [
                [
                    'title' => $note->title,
                ]
            ]
        ]);
    }

    public function test_store()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'api')->postJson('/api/notes', [
            'title' => 'Test Note',
            'content' => 'This is a test note.',
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('notes', [
            'title' => 'Test Note',
        ]);
    }

    public function test_show()
    {
        $user = User::factory()->create();
        $note = Note::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user, 'api')->getJson("/api/notes/{$note->id}");

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'data' => [
                'title' => $note->title,
            ]
        ]);
    }

    public function test_update()
    {
        $user = User::factory()->create();
        $note = Note::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user, 'api')->putJson("/api/notes/{$note->id}", [
            'title' => 'Updated Note',
            'content' => 'This is an updated note.',
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('notes', [
            'title' => 'Updated Note',
        ]);
    }

    public function test_destroy()
    {
        $user = User::factory()->create();
        $note = Note::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user, 'api')->deleteJson("/api/notes/{$note->id}");

        $response->assertStatus(200);
        $this->assertDatabaseMissing('notes', [
            'id' => $note->id,
        ]);
    }
}