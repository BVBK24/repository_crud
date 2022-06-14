<?php
namespace App\Repository\Crud;
//use Illuminate\Http\Request;
use App\Models\Crud;
class CrudRepository implements CrudInterface
{
    public function getAllData()
    {
        return Crud::paginate(3);
    }
    public function get($id)
     {
         return Crud::find($id);
     }
     public function store(array $data)
     {
         return Crud::create($data);
     }
     public function update($id, array $data)
     {
         return Crud::find($id)->update($data);
     }
     public function delete($id)
     {
         return Crud::find($id)->delete();
     }
     public function fetch($cat,$key)
     {
         if($cat=='global')
         {
            return Crud::where('id','like','%'.$key.'%')->orwhere('firstname','like','%'.$key.'%')->orwhere('lastname','like','%'.$key.'%')->orwhere('mail','like','%'.$key.'%')->orwhere('phone','like','%'.$key.'%')->paginate(3);
         }
         return Crud::where($cat,$key)->paginate(3);
     }
     
     public function getResult($option=null)
     {
         if($option=='sort_asc_id')
         {
             return Crud::orderBy('id','asc')->paginate(3);
         }
         if($option=='sort_desc_id')
         {
             return Crud::orderBy('id','desc')->paginate(3);
         }
         if($option=='sort_asc_fn')
         {
             return Crud::orderBy('firstname','asc')->paginate(3);
         }
         if($option=='sort_desc_fn')
         {
             return Crud::orderBy('firstname','desc')->paginate(3);
         }
         if($option=='sort_asc_ln')
         {
             return Crud::orderBy('lastname','asc')->paginate(3);
         }
         if($option=='sort_desc_ln')
         {
             return Crud::orderBy('lastname','desc')->paginate(3);
         }
         if($option=='sort_asc_ml')
         {
             return Crud::orderBy('mail','asc')->paginate(3);
         }
         if($option=='sort_desc_ml')
         {
             return Crud::orderBy('mail','desc')->paginate(3);
         }
         if($option=='sort_asc_ph')
         {
             return Crud::orderBy('phone','asc')->paginate(3);
         }
         if($option=='sort_desc_ph')
         {
             return Crud::orderBy('phone','desc')->paginate(3);
         }
        //  else
        //  {
        //      return Crud::fetch($request);
        //  }
     }
}
