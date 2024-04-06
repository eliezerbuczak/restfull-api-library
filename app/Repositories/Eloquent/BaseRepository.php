<?php

namespace App\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    protected Model $model;
    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create($data)
    {
        $user = auth()->user();
        $data['id_user_created'] = $user->id;
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        $model = $this->find($id);
        $user = auth()->user();
        $data['id_user_updated'] = $user->id;
        return $model->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }
}
