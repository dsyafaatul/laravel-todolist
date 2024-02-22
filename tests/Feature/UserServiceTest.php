<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\UserService;

class UserServiceTest extends TestCase
{
    private UserService $userService;

    protected function setUp() : void
    {
        parent::setUp();
        $this->userService = $this->app->make(UserService::class);
    }

    public function testLoginSuccess()
    {
        self::assertTrue($this->userService->login("dsyafaatul", "rahasia"));
    }

    public function testLoginUserNotFound()
    {
        self::assertFalse($this->userService->login("diki", "diki"));
    }

    public function testLoginWrongPassword()
    {
        self::assertFalse($this->userService->login("dsyafaatul", "salah"));
    }
}
