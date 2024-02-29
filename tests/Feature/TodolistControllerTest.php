<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodolistControllerTest extends TestCase
{
    public function testTodolist()
    {
        $this->withSession([
            "user" => "dsyafaatul",
            "todolist" => [
                [
                    "id" => "1",
                    "todo" => "d."
                ],
                [
                    "id" => "2",
                    "todo" => "syafa'atul"
                ]
            ]
        ])->get("/todolist")
        ->assertSeeText("1")
        ->assertSeeText("d.")
        ->assertSeeText("2")
        ->assertSeeText("dsyafa'atul");
    }

    public function testAddTodolistFailed()
    {
        $this->withSession([
            "user" => "dsyafaatul"
        ])->post("/todolist", [])
        ->assertSeeText("Todo is required");
    }

    public function testAddTodoSuccess()
    {
        $this->withSession([
            "user" => "dsyafaatul"
        ])->post("/todolist", [
            "todo" => "d."
        ])
        ->assertRedirect("/todolist");
    }
}
