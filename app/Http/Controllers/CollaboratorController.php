<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collaborator;
use App\Models\Company;
use App\Http\Requests\CollaborateRequest;
use DataTables;

class CollaboratorController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Collaborator $collaborator)
    {
        $this->authorize('view',$collaborator);
        return view('collaborator.index');
    }

    public function indexServerSide(Collaborator $collaborator)
    {
        $this->authorize('view',$collaborator);
        $data = Collaborator::with('company')->get()->toArray();
        return DataTables::of($data)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $this->authorize('create',Collaborator::class);
        $company = Company::all();
        return view('collaborator.add',compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CollaborateRequest $request)
    {

        $this->authorize('create',Collaborator::class);
        $collaborate = new Collaborator;
        $collaborate->name = $request->input('name');
        $collaborate->last_name = $request->input('last_name');
        $collaborate->email = $request->input('email');
        $collaborate->phone = $request->input('phone');
        $collaborate->company_id = $request->input('company_id');
        $collaborate->save();

        return redirect()->route('collaborator.index')->with( 'success' , 'El colaborador fue creado.' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Collaborator $collaborator)
    {
        $this->authorize('view',$collaborator);
        $data = $collaborator;
        $company = Company::all();
         return view('collaborator/show',compact('data','company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Collaborator $collaborator)
    {
        $this->authorize('update',$collaborator);
        $company = Company::all();
        $data = $collaborator;
        return view('collaborator.edit',compact('company','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CollaborateRequest $request,Collaborator $collaborator)
    {
        $this->authorize('update',$collaborator);
        $collaborate->name = $request->input('name');
        $collaborate->last_name = $request->input('last_name');
        $collaborate->email = $request->input('email');
        $collaborate->phone = $request->input('phone');
        $collaborate->company_id = $request->input('company_id');
        $collaborate->save();

        return redirect()->route('collaborator.index')->with( 'success' , 'El colaborador fue actualizado.' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collaborator $collaborator)
    {
        $this->authorize('delete',$collaborator);
        $collaborator->delete();

        return redirect()->route('collaborator.index')->with( 'success' , 'El colaborador fue eliminado.' );
    }


 
}
