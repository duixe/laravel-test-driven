<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Task;

class TaskListTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     *@test
     * @return void
     */
    public function fetch_task_list()
    {
      //preparation /prepare
      // TodoList::factory()->create();
      $list = Task::factory()->count(3)->create(['name' => 'custom factory name']);
      //action /perform
      // $res = $this->getJson('api/todo-list');

      $res = $this->getJson(route('task-list.store'));
      //assertion /predict
      $this->assertEquals(1, count($res->json()));
    }
}
