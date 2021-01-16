<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Requests\CompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use DataTables;

class CompanyController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Company $company)
    {
        $this->authorize('view',$company);
        $data = Company::all()->toArray();
        return view('company.index',compact('data'));
    }

    
    public function indexServerSide(Company $company)
    {
        $this->authorize('view',$company);
        $data = Company::all();
        return DataTables::of($data)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',Company::class);
        return view('company.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $this->authorize('create',Company::class);
        $company = new Company;
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        //storage
        $img = Image::make($request->file('logo'))->resize(100, 100);
        $name = md5(date('YmdHis'));
        if (!file_exists('storage/company/logo')) {
            mkdir('storage/company/logo', 666, true);
        }
        
        $img->save('storage/company/logo/'.$name.'.jpg', 80, 'jpg');

        $company->logo = "storage/company/logo/{$name}.jpg";
        $company->website = $request->input('website');
        $company->save();

        return redirect()->route('company.index')->with( 'success' , 'La empresa fue creada.' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $this->authorize('view',$company);
       $data = $company;
        return view('company/show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {   
        $this->authorize('update',$company);
        $data = $company;
        return view('company.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $this->authorize('update',$company);
        $company->name = $request->input('name');
        $company->email = $request->input('email');

        if($request->file('logo')){
            $img = Image::make($request->file('logo'))->resize(100, 100);
            $name = md5(date('YmdHis'));
            if (!file_exists('storage/company/logo')) {
                mkdir('storage/company/logo', 666, true);
            }
            
            $img->save('storage/company/logo/'.$name.'.jpg', 80, 'jpg');
            $company->logo = "storage/company/logo/{$name}.jpg";
        }
      

        $company->website = $request->input('website');
        $company->save();

        return redirect()->route('company.index')->with( 'success' , 'La empresa fue actualizada.' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $this->authorize('delete',$company);
        $company->delete();

        return redirect()->route('company.index')->with( 'success' , 'La empresa fue eliminada.' );
    }
}
