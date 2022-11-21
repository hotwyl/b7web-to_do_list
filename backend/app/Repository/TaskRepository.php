<?php

namespace App\Repository;


use App\Models\Task;
use App\Models\User;
use App\Traits\TaskTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TaskRepository
{
    use TaskTrait;

    public function __construct()
    {
//        ini_set('max_execution_time', 999);
//        ini_set('memory_limit', '256M');
//        ini_set('max_input_time', 999);
    }

    public function all()
    {
        return Task::where('user_id', $this->user())->where('deleted', 0)->get();
    }

    public function active()
    {
        return Task::where('user_id', $this->user())->where('deleted', 0)->where('done', 0)->get();
    }

    public function inative()
    {
        return Task::where('user_id', $this->user())->where('deleted', 0)->where('done', 1)->get();
    }

    public function show($cod)
    {
        return Task::where('user_id', $this->user())->where('deleted', 0)->where('cod', $cod)->get();
    }

    public function create($task)
    {
        return Task::create($task);
    }

    public function store($task)
    {
        return Task::updated($task);
    }

    public function search($termo)
    {
        return Task::where('user_id', $this->user())->where('deleted', 0)->where('task', 'like', '%'.$termo.'%')->get();;
    }

}
