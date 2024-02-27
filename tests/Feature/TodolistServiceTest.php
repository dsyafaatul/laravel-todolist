<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\TodolistService;
use Illuminate\Support\Facades\Session;

class TodolistServiceTest extends TestCase
{
    private TodolistService $todolistService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->todolistService = $this->app->make(TodolistService::class);
    }

    public function testTodolistNotNull()
    {
        self::assertNotNull($this->todolistService);
    }

    public function testSaveTodo()
    {
        $this->todolistService->saveTodo("1", "dsyafaatul");

        $todolist = Session::get("todolist");
        foreach($todolist as $value){
            self::assertEquals("1", $value["id"]);
            self::assertEquals("dsyafaatul", $value["todo"]);
        }
    }
}
