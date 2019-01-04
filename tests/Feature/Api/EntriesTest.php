<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Entry;

class EntriesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testItReturnsEntries()
    {
        $entry = factory(Entry::class)->create();
        $user = $entry->reminder->user;

        $response = $this->json('GET', "api/entries/{$user->id}");

        $response->assertStatus(200);
        $response->assertJson([
            'entries' => [
                [
                    'id' => $entry->id
                ]
            ]
        ]);
    }
}
