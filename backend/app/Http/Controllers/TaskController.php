<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Service\TaskService;

class TaskController extends Controller
{
    protected $service;

    public function __construct(TaskService $service)
    {
        $this->service = $service;
    }

    public function all()
    {
        return $this->service->all();
    }

    public function active()
    {
        return $this->service->active();
    }

    public function inative()
    {
        return $this->service->inative();
    }

    public function show()
    {
        return $this->service->show();
    }

    public function create(TaskRequest $request)
    {
        return $this->service->create($request->only('task'));
    }

    public function store(TaskRequest $request)
    {
        return $this->service->store($request->only('cod', 'task', 'done'));
    }

    public function editStatus(TaskRequest $request)
    {
        return $this->service->editStatus($request->only('cod', 'task', 'done'));
    }

    public function destroy(TaskRequest $request)
    {
        return $this->service->destroy($request->only('cod'));
    }

    public function search(TaskRequest $request)
    {
        return $this->service->search($request->only('termo'));
    }

}
