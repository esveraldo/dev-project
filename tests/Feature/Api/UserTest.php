<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/*class UserTest extends TestCase
{
    public function testCreateNewUserWithNoToken()
    {
        $this->json('POST', '/api/v1/users', ['email' => ''])
            ->assertStatus(400)
            ->assertJson(['error' => 'token_not_provided']);
    }
}*/
