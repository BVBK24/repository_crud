<?php
 namespace App\Repository\Crud;
 //use Illuminate\Http\Request;
 use App\Models\Crud;
 interface CrudInterface
 {
     public function getAllData();
     public function get($id);
     public function store(array $data);
     public function update($id, array $data);
     public function delete($id);
     public function getResult($option=null);
     public function fetch($cat,$key);
     
 }


?>