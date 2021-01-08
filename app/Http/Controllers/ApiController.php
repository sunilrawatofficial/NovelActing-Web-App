<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Validator;
use App\NovelCategories;


class ApiController extends Controller
{
   function getcategories()
   {
       $catData=DB::table('novel_categories')->get();
        if(count($catData))
            return response()->json(['Categories'=>$catData]); 
        else
            return response()->json(['Categories'=>"no data"]); 
    }
    function addcategory(Request $req)
    {

        $valid=Validator::make(
            $req->all(),['category_name'=>'required']
        );

        if($valid->fails())
        {
            return response()->json(['error'=>$valid->errors()],401); 
        }
        $checkExists = DB::table('novel_categories')->where('category_name',$req->category_name)->first();
        if($checkExists)
            DB::table('novel_categories')->where('category_name',$req['category_name'])->update($req->all());
        else
            NovelCategories::create($req->all());
        
       return response()->json("success", 200);
    }
}