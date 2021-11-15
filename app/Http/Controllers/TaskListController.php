<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskListController extends Controller
{
    public function index()
    {
      $taskList = Task::all();
      return response([
        'list' => $taskList
      ]);
    }
}
