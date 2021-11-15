<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\TodoList;

class TodoListTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     *
     * @return void
     */
    public function fetch_todo_list()
    {
      //preparation /prepare
      // TodoList::factory()->create();
      $list = TodoList::factory()->count(3)->create(['name' => 'custom factory name']);
      dd($list);
      //action /perform
      // $res = $this->getJson('api/todo-list');

      $res = $this->getJson(route('todo-list.store'));
      //assertion /predict
      $this->assertEquals(1, count($res->json()));
    }
}
