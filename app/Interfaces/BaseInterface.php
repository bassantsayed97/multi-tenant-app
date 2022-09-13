<?php
namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface  BaseInterface{
    /**
     * get all models
     * @param array $columns
     * @param array $relations
     * @return Collection
     */
    public function all(array $columns=['*'],array $relations=[],array $where=[]) ;
    /**
     * find model by id
     * @param int $id
     * @param array $columns
     * @param array $relations
     * @param array appends
     * @return Model
     */
    public function find(int $id,array $columns=['*'],array $relations=[],array $appends=[]);
    /**
     * create model
     * @param array $data
     * @return Model
     */
    public function store(array $data);
    /**
     * update existing model by id
     * @param int $id
     * @param array $data
     * @return Model
     */
    public function update(int $id ,array $data);
    /**
     * delete existing model by id
     * @param int $id
     * @return bool
     */
    public function delete(int $id);
    public function query(array $where=[]);
    public function changeStatus(int $id);


}
