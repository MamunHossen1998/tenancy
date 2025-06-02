<?php

namespace App\Http\Controllers;

use App\Http\Requests\TenantStoreRequest;
use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    /*
        Tenant create form
        @athor Mamun
    **/
    public function tenantCreate()
    {
        return view('tenant.create');
    }

    /* Tenant Store
        @author Mamun
    **/
    public function tenantStore(TenantStoreRequest $request){
        try {
            $data = array_merge(
                $request->validated(),
                [
                'id' =>  $request->company, 
                'trace' => $request->company.rand(11,99)
                ]
            );
           Tenant::create($data);
            // $domain = $request->domain;
            // $tenant->createDomain(['domain'=> $domain]); //test
            // $tenant->createDomain(['domain'=> $request->domain]);
            return back()->with(['success' => 'Successfully Done']);
        } catch (\Throwable $e) {
            return $e;
        }
    }
    public function getTenant(){
        return Tenant::where('trace', 'test')->get();
        return Tenant::where('data->name', 'shamim')->select('id','data')->get();
    }
}
