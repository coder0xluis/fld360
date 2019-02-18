<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    function categories()
    {
        $categories = DB::table('category')
            ->orderByRaw('sort=0', 'desc', 'sort')
            ->get()
            ->keyBy('id');

        foreach ($categories as $cate_id => $cate) {
            if ($cate->parent_id) {
                $cates[$cate->parent_id]['childs'][$cate_id] = collect($cate)->toArray();

                $cates[$cate->parent_id]['cate_ids'][] = $cate->id;
            } else {
                $cates[$cate_id] = collect($cate)->toArray();

                $cates[$cate_id]['cate_ids'][] = $cate_id;
            }
        }

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
