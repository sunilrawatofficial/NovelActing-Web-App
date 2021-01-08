<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\NovelCategories;
use App\Novels;

use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use DB;

class NovelController extends Controller
{
    public function viewCategory($id)
    {
        $catdata=DB::table('novels')
        ->where('category_id',$id)
        ->join('novel_categories', 'novel_categories.id','category_id')
        ->where('novel_categories.status',true)
        ->where('novels.status',true)
        ->get();

        return view('layouts.NovelsLayouts.showCategoryNovels',compact('catdata'));  // send array
    }

    public function showAllcategories()
    {
        $CategoryData=DB::table('novel_categories')->get();
        return view('layouts.NovelsLayouts.allcategories',compact('CategoryData'));    
    }
    
    public function addCategory(Request $req)
    {
        unset($req['_token']); 
        if(isset($req['category_thumbnail']))
        {  
            $image= $req->file('category_thumbnail');
            $imagename=$req['category_name'].'.'.$image->getClientOriginalExtension();
            Storage::disk('categorythumbnails_disk')->put($imagename,file_get_contents($image));
            $imagelink =str_replace('localhost', '127.0.0.1:8000',Storage::disk('categorythumbnails_disk')->url($imagename));
        }


        $checkExists = DB::table('novel_categories')->where('category_name',$req['category_name'])->first();
        if($checkExists)
        {
            DB::table('novel_categories')->where('category_name',$req['category_name'])->update
            ([
                'category_name'=> $req->category_name,
                'category_thumbnail' => $imagelink
            ]);
        }
        else
        {
            NovelCategories::create
            ([
                'category_name'=> $req->category_name,
                'category_thumbnail'=>$imagelink
            ]);
        }
        return back()->with('catadded',$req['category_name']);  
    }

    public function showAllNovels(Request $req)
    {
        $NovelData=DB::table('novels')->get();
        return view('layouts.NovelsLayouts.allnovels',compact('NovelData'));   
    }
    public function addNovelsPage()
    {
        $Categories=DB::table('novel_categories')
        ->select('id','category_name')
        ->get();

        return view('layouts.NovelsLayouts.addNovel',compact('Categories')); 
    }

    public function addNovelInfo(Request $req)
    {
        unset($req['_token']); 
        $validatedData = $req->validate([
            'novel_thumbnail'=> 'required',
        ]);


        $image= $req->file('novel_thumbnail');
        $imagename=$req['name'].'.'.$image->getClientOriginalExtension();
        Storage::disk('novelthumbnails_disk')->put($imagename,file_get_contents($image));
        $imagelink =str_replace('localhost', '127.0.0.1:8000',Storage::disk('novelthumbnails_disk')->url($imagename));

        

        $checkExists = DB::table('novels')->where('name',$req->name)->first();
        if($checkExists)
        {
           
            DB::table('novels')->where('category_id',$req->category_id)->update
            ([
                'category_id'=>$req->category_id,
                'name'=> $req->name,
                'author'=> $req->author,
                'summary'=> $req->summary,
                'novel_thumbnail' => $imagelink
            ]);
        }
        else
        {
            Novels::create
            ([
                'category_id'=>$req->category_id,
                'name'=> $req->name,
                'author'=> $req->author,
                'summary'=> $req->summary,
                'novel_thumbnail' => $imagelink
            ]);
        }

        return back()->with('noveladded',$req->name);  
    }

    public function deleteCategory($id)
    {
        $currentCat=NovelCategories::find($id)->pluck('category_thumbnail')->toArray();
        $imagename=basename($currentCat[0]);
        Storage::disk('categorythumbnails_disk')->delete($imagename);
        NovelCategories::find($id)->delete();
        return back();

    }
    public function changeCategoryStatus(Request $req)
    {
        DB::table('novel_categories')->where('id',$req->id)->update($req->all());
        return back();
    
    }
}
