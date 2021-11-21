<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Task;

class TaskListTest extends TestCase
{
    use RefreshDatabase;

    private $task;
    public function setUp(): void
    {
      parent::setUp();
      $this->task = Task::factory()->create();
    }
    /**
     * A basic feature test example.
     *
     *@test
     * @return void
     */
    public function fetch_all_task_list()
    {
      //preparation /prepare
      // TodoList::factory()->create();
      // $list = Task::factory()->count(3)->create(['name' => 'custom factory name']);
      //action /perform
      // $res = $this->getJson('api/todo-list');

      $res = $this->getJson(route('task-list.store'));
      //assertion /predict
      $this->assertEquals(1, count($res->json()));
    }

    /**
     * @test
     */
    public function fetch_single_task()
    {
      //preparation
      // $task = Task::factory()->create();

      //action
      $res = $this->getJson(route('task-list.show', $this->task->id))
              ->assertOk()
              ->json();
      // dd($res->json()['name']); || dd($res->json('name'))
      //assertion
      // $res->assertOk();
      // $this->assertEquals($res->json()['name'], $task->name);
      $this->assertEquals($res['name'], $this->task->name);

    }
}
