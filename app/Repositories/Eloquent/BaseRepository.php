<?php

namespace App\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;

abstract class BaseRepository
{
    protected Model $model;
    public function all()
    {
        try {
            if (Redis::exists($this->model->getTable())) {
                $data = Redis::get($this->model->getTable());
                return json_decode($data);
            }
            $model = $this->model->all();
            if ($model) {
                $data = json_encode($model);
                Redis::set($this->model->getTable(), $data);
                return $model;
            }
            return [
                'message' => 'Record not found',
            ];
        } catch (\Exception $e) {
            return [
                'error' => 'Error fetching records',
            ];
        }
    }

    public function find($id)
    {
        try {
            if (Redis::exists($this->model->getTable() . ':' . $id)) {
                $data = Redis::get($this->model->getTable() . ':' . $id);
                return json_decode($data);
            }

            $model = $this->model->find($id);
            if ($model) {
                $data = json_encode($model);
                Redis::set($this->model->getTable() . ':' . $id, $data);
                return $model;
            }
            return [
                'message' => 'Record not found',
            ];
        } catch (\Exception $e) {
            return [
                'error' => 'Error fetching record',
            ];
        }
    }

    public function create($data)
    {
        try {
            $user = auth()->user();
            $data['id_user_created'] = $user->id;
            $model = $this->model->create($data);
            Redis::del($this->model->getTable());
            return $model;
        } catch (\Exception $e) {
            return [
                'error' => 'Error creating record',
            ];
        }
    }

    public function update($id, $data)
    {
        try{
            $model = $this->model->find($id);
            $user = auth()->user();
            $data['id_user_updated'] = $user->id;
            if($model){
                $model->update($data);
                Redis::del($this->model->getTable());
                return $model;
            }
            return [
                'message' => 'Record not found',
            ];
        } catch (\Exception $e) {
            return [
                'error' => 'Error updating record',
            ];
        }
    }

    public function delete($id)
    {
        try{
            $model = $this->model->find($id);
            if($model){
                $model->delete();
                Redis::del($this->model->getTable());
                return $model;
            }
            return [
                'message' => 'Record not found',
            ];
        } catch (\Exception $e) {
            return [
                'message' => 'Error deleting record',
            ];
        }
    }
}
