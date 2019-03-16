<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class PromoterController extends Controller
{
    //

    //注册
    public function register()
    {
        $figerprint = Uuid::uuid1();
    }

    //提现申请
    public function withdraw()
    {
    }

    //查看详情
    public function profile()
    {
    }

    //查看效果报表
    public function report()
    {
    }
}
