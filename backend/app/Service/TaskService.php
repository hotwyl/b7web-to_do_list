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

    public function show()
    {
        try {
            $codParam = $this->getCodUrl();
            $pesquisa = $this->repository->show($codParam);
            return new DataResource($pesquisa);
        } catch (\Exception $ex) {
            return response()->json($ex->getMessage(), 400);
        }
    }

    public function create($response)
    {
        try {
            if($response['task']){
                $dados['cod'] = $this->setCod();
                $dados['user_id'] = $this->getCodUser();
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

    public function editStatus($response)
    {
        try {
            $pesquisa = $this->repository->editStatus($response);
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
