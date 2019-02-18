<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class AlbumsController extends Controller
{

    public function getAlbums(Request $request)
    {
        $albums = DB::table('albums')
            ->join('images', 'albums.id', '=', 'images.album_id')
            ->select('albums.*', 'images.album_id', 'images.url as pic', DB::raw("count('images') as pic_count"))
            ->where([
                ['albums.cover', ''],
                ['albums.is_deleted', 0]
            ])
            ->where('albums.cover', '')
            ->groupBy('albums.id')
//            ->orderBy('created_at', 'DESC')
//            ->paginate(10);
            ->get();

//        foreach ($albums as $album) {
//            DB::table('albums')
//                ->where('id', $album->id)
//                ->update(['cover' => $album->pic]);
//        }

        dd($albums);
    }

    public function getAlbumById($id, $image_id = 0)
    {
        // 图辑
        $album = DB::table('albums')
            ->where('id', $id)
            ->first();

//        dd($id, $album);

        //所属分类
        $sub_cate = DB::table('category')
            ->where('id', $album->cate_id)
            ->first();
        $cate = DB::table('category')
            ->where('id', $sub_cate->parent_id)
            ->first();

        // 图辑图片列表
        $images = DB::table('images')
            ->where([
                ['album_id', $album->id],
                ['is_deleted', 0],
            ])
            ->orderBy('id')
            ->get();

        // 图辑标签
        $tags = DB::table('tags')
            ->whereIn('id', explode(',', $album->tags))
            ->get();

        return compact('album', 'images', 'tags', 'cate', 'sub_cate');
    }


    /*
     * 按类目展示
     * 按标签展示
     * 今日更新
     * 推荐图集
     * */
    function byCategory($cate_ids)
    {
        $albums = DB::table('albums')
            ->leftJoin('images', 'albums.id', '=', 'images.album_id')
            ->select('albums.*', 'images.album_id', 'images.url as pic', DB::raw("count('images') as pic_count"))
            ->groupBy('albums.id')
            ->where([
                ['albums.is_deleted', 0],
            ])
            ->whereIn('cate_id', $cate_ids)
            ->orderBy('created_at','desc')
            ->paginate(18);

        return $albums;
    }

    function byTag($tid)
    {
        $albums = DB::table('albums')
            ->leftJoin('images', 'albums.id', '=', 'images.album_id')
            ->select('albums.*', 'images.album_id', 'images.url as pic', DB::raw("count('images') as pic_count"))
            ->groupBy('albums.id')
            ->where([
                ['tags', 'like', "%$tid%"],
                ['albums.is_deleted', 0],
            ])
            ->orderBy('created_at','desc')
            ->paginate(24);

        return $albums;
    }

    public function today()
    {
        $today_albums = DB::table('albums')
            ->where('is_deleted', 0)
            ->orderBy('created_at', 'DESC')
            ->take(20)
            ->get();

        return $today_albums;

    }


    public function recommend()
    {
        $recommend_albums = DB::table('albums')
            ->where('is_deleted', 0)
            ->inRandomOrder()
            ->orderBy('created_at', 'DESC')
            ->take(15)
            ->get();

        return $recommend_albums;
    }
}
