<?php

namespace App\Filters\V1;

use App\Models\Carmodel;
use App\Models\Manufacturer;
use Illuminate\Http\Request;


 class AutomobilesFilter {

 protected $safeParms= [

  'name'=>['eq'],
  'year'=>['eq', 'gt', 'lt', 'gte', 'lte'],
  'make'=>['eq'],
  'model'=>['eq']
 ];


 protected $columnMap = [
             'model'=>'carmodel_id',
             'make' =>'makeValue'
           ];


 protected $operatorMap = [

  'eq'=>'=',
  'lt'=>'<',
  'gt'=>'>',
  'lte'=>'<=',
  'gte'=>'>='
 ];



 public function transform (Request $request){

  $autoFilterQuery = [];
  foreach ($this->safeParms as $parm=>$operators){

    $query = $request->query($parm);
    
     if(!isset($query)){
         continue; 
       }

       $column = $parm;
       
      if(array_key_exists($parm, $this->columnMap)) {
       
      if(is_array($query)){
  
          $queryNumericFormat = array_values($query);
          
          if($this->columnMap[$parm]=='carmodel_id'){


              $tableRecord = Carmodel::where('model_name', $queryNumericFormat[0])->get()->toArray();
              $column = $this->columnMap[$parm];
             
          }else{
           
             $tableRecord = Manufacturer::where('name', $queryNumericFormat[0])->get()->toArray();
          }

          $desiredVal = ($tableRecord)?$tableRecord[0]['id']:null;
        }
      }

     foreach($operators as $operator){

       if(isset($query[$operator])){
         
         $query[$operator] = $desiredVal ?? $query[$operator];
          $autoFilterQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
        }
     }
    
   }

   return $autoFilterQuery;
 }

}