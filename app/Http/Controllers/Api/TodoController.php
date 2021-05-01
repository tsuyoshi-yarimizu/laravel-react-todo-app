<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TodoCreateRequest;
use App\Http\Requests\TodoUpdateRequest;
use App\Models\TodoModel;

class TodoController extends Controller
{
    public function index()
    {
        return TodoModel::all();
    }

    public function store(TodoCreateRequest $request)
    {
        $todo = new TodoModel;
        $todo->user_id = 1; // TODO
        $todo->todo_name = $request->get('todo_name');
        $todo->todo_detail = $request->get('todo_detail');
        $todo->priority = $request->get('priority');
        $todo->expire_date = $request->get('expire_date');

        $todo->save();

        return $todo;
    }

    public function show($todoId)
    {
        return TodoModel::find($todoId);
    }

    public function update(TodoUpdateRequest $request, $todoId)
    {
        $todo = TodoModel::find($todoId);
        $todo->update($request->toArray());

        return $todo;
    }
}
