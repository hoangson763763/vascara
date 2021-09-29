<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\setting;

class SettingController extends Controller
{
    public function index(){
        return view('back-end.addSetting');
    }

    public function store(Request $request){
        $setting = new setting();
        $setting->hotline  = $request->hotline;
        $setting->ship  = $request->ship;
        $setting->domain  = $request->domain;
        $setting->company_name  = $request->company_name;
        $setting->company_address  = $request->company_address;
        $setting->save();
        return redirect()->back()->with('message','Thêm dữ liệu thành công');
    }
}
