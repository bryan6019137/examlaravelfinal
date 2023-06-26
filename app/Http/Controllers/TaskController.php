<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Tasks::orderBy('created_at', 'DESC')->get();
        return view('dashboard', compact('tasks'));
    }

    public function create(Request $request)
    {
        Tasks::create($request->all());
        return redirect()->back();
    }

    public function show(string $id)
    {
        $task = Tasks::findOrFail($id);
        return redirect()->back();
    }

    public function edit(string $id)
    {
        $task = Tasks::findOrFail($id);

        return redirect()->back();
    }

    public function update(Request $request, string $id)
    {
        $task = Tasks::findOrFail($id);

        $task->update($request->all());

        return redirect()->back();
    }

    public function destroy(string $id)
    {
        $task = Tasks::findOrFail($id);
        $task->delete();

        return redirect()->back();
    }
}
