<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TodolistService;

class TodolistController extends Controller
{
    private TodolistService $todolistService;

    public function __construct(TodolistService $todolistService)
    {
        $this->todolistService = $todolistService;
    }

    public function todolist(Request $request)
    {
        $todolist = $this->todolistService->getTodolist();
        return response()->view('todolist.todolist', [
            "title" => "Todolist",
            "todolist" => $todolist
        ]);
    }

    public function addTodo(Request $request)
    {

    }

    public function removeTodo(Request $request, string $todoId)
    {

    }
}
