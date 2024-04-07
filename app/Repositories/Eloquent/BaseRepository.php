<?php

namespace App\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    protected Model $model;
    public function all()
    {
        try {
            $model = $this->model->all();
            if ($model) {
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
            $model = $this->model->find($id);
            if ($model) {
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
