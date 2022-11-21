<?php

namespace App\Service;

use App\Http\Resources\DataResource;
use App\Repository\TaskRepository;
use App\Traits\TaskTrait;
use Illuminate\Support\Str;


class TaskService
{
    use TaskTrait;

    protected $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function all()
    {
        try {
            $pesquisa = $this->repository->all();
            return new DataResource($pesquisa);
        } catch (\Exception $ex) {
            return response()->json($ex->getMessage(), 400);
        }
    }

    public function active()
    {
        try {
            $pesquisa = $this->repository->active();
            return new DataResource($pesquisa);
        } catch (\Exception $ex) {
            return response()->json($ex->getMessage(), 400);
        }
    }

    public function inative()
    {
        try {
            $pesquisa = $this->repository->inative();
            return new DataResource($pesquisa);
        } catch (\Exception $ex) {
            return response()->json($ex->getMessage(), 400);
        }
    }

    public function show($response)
    {
        try {
            $pesquisa = $this->repository->show($response);
            return new DataResource($pesquisa);
        } catch (\Exception $ex) {
            return response()->json($ex->getMessage(), 400);
        }
    }

    public function create($response)
    {
        try {
            if($response['task']){
                $dados['cod'] = $this->cod();
                $dados['user_id'] = $this->user();
                $dados['task'] = $response['task'];
                $dados['done'] = false;
                $request = $this->repository->create($dados);
            }else{
                return response()->json('Tarefa não identificada.', 400);
            }
            return new DataResource($request);

        } catch (\Exception $ex) {
            return response()->json($ex->getMessage(), 400);
        }
    }

    public function store($response)
    {
        try {
            $pesquisa = $this->repository->store($response);
            return new DataResource($pesquisa);
        } catch (\Exception $ex) {
            return response()->json($ex->getMessage(), 400);
        }
    }

    public function destroy($response)
    {
        try {
            $pesquisa = $this->repository->destroy($response);
            return new DataResource($pesquisa);
        } catch (\Exception $ex) {
            return response()->json($ex->getMessage(), 400);
        }
    }

    public function search($response)
    {
        try {
            $pesquisa = $this->repository->search($response['termo']);
            return new DataResource($pesquisa);
        } catch (\Exception $ex) {
            return response()->json($ex->getMessage(), 400);
        }

    }

}
