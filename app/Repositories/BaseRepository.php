<?php
    
namespace App\Repositories;

class BaseRepository
{
    protected $model;

    public function get($id) {
        return $this->model->find($id);
    }

    public function store($data) {
        return $this->model->create($data);
    }

    public function update($id, $data) {
        $this->model->where('id', $id)->update($data);
        return $this->get($id);
    }

    public function delete($id) {
        return $this->model->where('id', (int)$id)->delete();
    }
}