<?php

namespace App\Http\Controllers;

use App\Http\Requests\ToDoRequest;
use App\ToDo;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $todos = ToDo::latest()->get();

        return view('todo.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ToDoRequest $request)
    {
        ToDo::create($request->all());

        return redirect('/todo')->with('success', 'New To-Do Is Created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ToDo $todo
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Todo $todo)
    {
        return view('todo.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param ToDo $todo
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(ToDoRequest $request, Todo $todo)
    {
        $todo->update($request->all());

        return redirect('/todo')->with('success', 'To-Do Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ToDo $todo
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();

        return response(null, \Symfony\Component\HttpFoundation\Response::HTTP_NO_CONTENT);
    }
}
