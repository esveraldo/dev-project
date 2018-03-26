<?php

namespace Tests\Feature\Web;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersTest extends TestCase
{
    public function testUsersPageWorks()
    {
        $this->get('/users')->assertStatus(302);
        $this->get('/stores')->assertStatus(302);
        $this->get('/campaigns')->assertStatus(302);
        $this->get('/banners')->assertStatus(302);
        $this->get('/offers')->assertStatus(302);
        $this->get('/lists')->assertStatus(302);
        $this->get('/messagings')->assertStatus(302);
        $this->get('/categories')->assertStatus(302);
        $this->get('/groups')->assertStatus(302);
        $this->get('/tags')->assertStatus(302);
        $this->get('/products')->assertStatus(302);
        $this->get('/imports/products')->assertStatus(302);
        $this->get('/terms/1/edit')->assertStatus(302);
        $this->get('/about/2/edit')->assertStatus(302);
    }
}
