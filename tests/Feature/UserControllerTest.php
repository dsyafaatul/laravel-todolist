<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function testLoginPage()
    {
        $this->get("/login")
            ->assertSeeText("Login");
    }

    public function testLoginForMember()
    {
        $this->withSession([
            "user" => "dsyafaatul"
        ])->get("/login")
        ->assertRedirect("/");
    }

    public function testLoginSuccess()
    {
        $this->post("/login", [
            "user" => "dsyafaatul",
            "password" => "rahasia"
        ])->assertRedirect("/")
        ->assertSessionHas("user", "dsyafaatul");
    }

    public function testLoginForUserAlreadyLogin()
    {
        $this->withSession([
            "user" => "dsyafaatul"
        ])->post("/login", [
            "user" => "dsyafaatul",
            "password" => "rahasia"
        ])->assertRedirect("/");
    }

    public function testLoginValidationError()
    {
        $this->post("/login")
        ->assertSeeText("User or password is required");
    }

    public function testLoginFailed()
    {
        $this->post("/login", [
            "user" => "wrong",
            "password" => "wrong"
        ])->assertSeeText("User or password is wrong");
    }

    public function testLogout()
    {
        $this->withSession([
            "user" => "dsyafaatul"
        ])->post("/logout")
        ->assertRedirect("/")
        ->assertSessionMissing("user");
    }

    public function testLogoutGuest()
    {
        $this->post('/logout')
        ->assertRedirect('/');
    }
}
