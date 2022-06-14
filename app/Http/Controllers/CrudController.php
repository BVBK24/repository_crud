<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Crud\CrudRepository;
use App\Models;
use Illuminate\Support\Facades\Log;

class CrudController extends Controller
{
    protected $crud;
    public function __construct(CrudRepository $crud)
    {
        $this->crud=$crud;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!empty($request->category))
        {
            $cat=$request->category;
        
        if(!empty($request->keyword))
        {
            $key=$request->keyword;
        }
        
         $crud = $this->crud->fetch($cat,$key);      

         return view('crud.index',compact('crud'));

        
        }
        
        $crud=$this->crud->getAllData();
        return view('crud.index',compact('crud'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $record=$request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'mail'=>'required',
            'phone'=>'required'
        ]);
        $cr=$this->crud->store($record);
        if($cr)
        {
             return back()->with('success','record inserted successfully');
        }
        else
        {
            return back()->with('fail','record inserted successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $crud=$this->crud->get($id);
        if(!empty($crud))
        {
        return view('crud.edit',compact('crud'));
        }
        else
        {
            return view('errors.404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $record=$request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'mail'=>'required',
            'phone'=>'required'
        ]);
        $cr=$this->crud->update($id,$record);
        //$crud::update($request->all());
        if($cr)
        {
        return redirect()->route('patcrud.index')->with('upload_success',"update record successfully");}

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cr=$this->crud->delete($id);
        if($cr)
        {
            return back()->with('alert',"delete record successfully");
        }
    }
    public function getResult($option=null)
    {
        // if(isset($request->keyword))
        // {
        //     $crud=$this->crud->getResult($request);
        //     return view('crud.index',compact('crud'));
        // }
        // else{
            $crud=$this->crud->getResult($option);
            return view('crud.index',compact('crud'));}
    // }
}
