<?php

namespace App\Livewire;

use App\Repo\TodoRepo;
use Livewire\Component;
use Livewire\Attributes\Rule;


class Todo extends Component
{
    protected $repo;

    #[Rule('required|min:3')]

    public $todo = "";

    public function boot(TodoRepo $repo)
    {
        $this->repo = $repo;
    }

    public function addTodo()
    {
        $validated = $this->validateOnly('todo'); // ここにviewでバインドされた値が飛んでくる
        $this->repo->save($validated);
        $this->todo = "";
    }
    public function render()
    {
        return view('livewire.todo');
    }
}
