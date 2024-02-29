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
}
