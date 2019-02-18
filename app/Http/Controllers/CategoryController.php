<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    function categories()
    {
        $categories = DB::table('category')
            ->where('is_deleted', 0)
//            ->orderBy('sort','asc')
//            ->orderByRaw('sort=0', 'asc', 'sort')
            ->get()
            ->keyBy('id');
//        dd($categories);


        foreach ($categories as $cate) {
//            dd($cate);
            $cate_id = $cate->id;
            if ($cate->parent_id) { //子类目
                $cates[$cate->parent_id]['childs'][$cate_id] = collect($cate)->toArray();
                $cates[$cate->parent_id]['cate_ids'][] = $cate->id;
            } else {    //父类目
                $cates[$cate_id] = collect($cate)->toArray();

                $cates[$cate_id]['cate_ids'][] = $cate_id;
            }
        }
//        dd($cates);

        return $cates;
    }


    function parentCategories()
    {
        $categories = DB::table('category')
            ->where('parent_id', 0)
            ->get()
            ->keyBy('id');

        dd($categories);
    }


    function subcategories($cid)
    {
        $categories = DB::table('category')
            ->where('parent_id', $cid)
            ->get();
    }


}
