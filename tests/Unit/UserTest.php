<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUsers()
    {
        $userData = [
            'name' => 'Amalla Saez',
            'email' => 'qrrrrclsoow@example.com',
            'password' => bcrypt('Cambiar.2023'),
        ];
        $user = User::create($userData);
        $this->assertInstanceOf(User::class, $user);
        $this->assertDatabaseHas('users', $userData);
    }
}
