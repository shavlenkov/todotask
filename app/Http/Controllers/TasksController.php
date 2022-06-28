<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Models\Task;

use Carbon\Carbon;

class TasksController extends Controller
{
    public function active() {

        $id = Auth::user()->getId();

        $date = Carbon::now()->toDateTimeString();

        $tasks = Task::where('authorId', $id)->where('deadline', '>', $date)->simplePaginate(config('app.paginate'));

        return view('tasks.index')
            ->with('tasks',  $tasks);
    }

    public function missed() {

        $id = Auth::user()->getId();

        $date =  Carbon::now()->toDateTimeString();

        $tasks = Task::where('authorId', $id)->where('deadline', '<', $date)->simplePaginate(config('app.paginate'));

        return view('tasks.index')
            ->with('tasks',  $tasks);
    }

    public function create() {
        return view('tasks.create');
    }

    public function store(Request $request) {

        $request->validate([
            'text' => 'required'
        ]);

        $tasks = Task::create([
            'text' => $request->input('text'),
            'deadline' => $request->input('deadline'),
            'authorId' => Auth::user()->getId()
        ]);

        return redirect()
            ->route('tasks.active')
            ->with(['message' => 'Завдання успішно створено!', 'class' => 'alert-success']);
    }

    public function edit($id) {

        $task = Task::find($id);

        return view('tasks.edit')->with('task', $task);
    }

    public function update($id, Request $request) {

        $request->validate([
            'text' => 'required'
        ]);

        $task = Task::find($id);

        $task->text = $request->input('text');
        $task->deadline = $request->input('deadline');
        $task->save();

        return redirect()
            ->route('tasks.active')
            ->with(['message' => 'Завдання успішно відредаговано!', 'class' => 'alert-success']);
    }

    public function destroy($id) {

        $task = Task::find($id);
        $task->delete();

        return back();
    }
}
