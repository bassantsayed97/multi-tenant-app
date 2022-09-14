<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Http\Traits\UploadFile;
use App\Interfaces\ProductInterface;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends ApiBaseController
{
    use UploadFile;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(ProductInterface $productInterface)
    {
        // interface instance
        $this->productInterface = $productInterface;
    }

    //get all tenant
    public function index()
    {
        try
        {
            $data = ProductResource::collection($this->productInterface->all());
            return $this->success($data);
        }
        catch(Exception $e)
        {
            return $this->internalError($e->getMessage());
        }
    }


    public function store(ProductRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $data = $request->all();
            //save Product logo
            if($request->hasFile('image'))
            {
                $file  = $this->upload('image');
                $data['image'] = $file;
            }

            $data = $this->productInterface->store($data);

            DB::commit();
            return $this->success(new ProductResource($data));
        }
        catch(Exception $ex)
        {
            DB::rollBack();
            return $this->internalError($ex->getMessage());
        }

    }

}
