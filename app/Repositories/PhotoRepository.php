<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;


class PhotoRepository {

    public function __construct(Model $model) {
        $this->model = $model;
    }

    
    public function insertData($collumn, $value) {
        $this->$column->create([

        ]);
    }
    
    public function selectData($value) {
           $this->model =  $this->model->with($value);
    }

    public function deleteData($value) {

    }

    public function updateData($value) {

    }


    
}