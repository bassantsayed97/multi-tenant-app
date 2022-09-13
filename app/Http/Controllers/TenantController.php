<?php

namespace App\Http\Controllers;

use App\Http\Resources\TenantResource;
use App\Interfaces\TenantInterface;
use App\Models\Tenant;
use Exception;
use Illuminate\Http\Request;

class TenantController extends ApiBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(TenantInterface $tenantInterface)
    {
        // interface instance
        $this->tenantInterface = $tenantInterface;
    }

    //get all tenant
    public function index()
    {
        try
        {
            $data = TenantResource::collection($this->tenantInterface->all());
            return $this->success($data);
        }
        catch(Exception $e)
        {
            return $this->internalError($e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }



    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function show(Tenant $tenant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function edit(Tenant $tenant)
    {
        //
    }


    public function update(Request $request, Tenant $tenant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tenant $tenant)
    {
        //
    }
}
