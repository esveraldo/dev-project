<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/*class AuthTest extends TestCase
{
    public function testGenerateTokenWhenUserNoFillData()
    {
        $this->json('POST', '/api/v1/auth', ['email' => '', 'password' => ''])
            ->assertStatus(401)
            ->assertJson(['error' => 'Invalid credentials']);
    }
}*/
