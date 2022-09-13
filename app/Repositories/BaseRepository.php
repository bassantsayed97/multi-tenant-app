<?php
namespace App\Repositories;

use App\Interfaces\BaseInterface;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BaseRepository implements BaseInterface
{
    protected $model;
    public function __construct(Model $model)
    {
        $this->model =$model;
    }
    public function all(array $columns=['*'],array $relations=[],array $where=[])
    {
        return $this->model->all();
    }
    public function find(int $id,array $columns=['*'],array $relations=[],array $appends=[])
    {
        try{
            return $this->model->select($columns)->with($relations)->findOrFail($id)?->append($appends) ;

        }catch(Exception $e)
        {
            throw new ModelNotFoundException('This ID '.$id.' Not Exist');
        }
    }
    public function store(array $data)
    {
        $model = $this->model->create($data);
        return $model->fresh();
    }
    public function update(int $id ,array $data)
    {
        $model = $this->find($id);
        $model->update($data);
        return $model;
    }
    public function delete(int $id)
    {
        return $this->find($id)->delete();
    }

    public function query(array $where=[])
    {
        return $this->model->where($where);
    }

    public function changeStatus(int $id)
    {
        $model = $this->find($id);
        ($model->isActive==1) ? $model->isActive=0 : $model->isActive=1 ;
        return $model->save();

    }




}
