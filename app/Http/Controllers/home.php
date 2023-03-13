<?php

namespace App\Http\Controllers;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\DB;
use App\Models\adminlogin;
use App\Models\category;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class home extends Controller
{
    public function index()
    {
        $get=DB::table('adminlogin')->get();
        return view('fruntend.index');
    }
    public function login(Request $data)
    {
        $data->validate([
            'nm'=>'Required',
            'pass'=>'Required',
        ]);
        $dt=$data->all();
        
        
        $ed=DB::table('adminlogin')->where([['name','=',$dt["nm"]],['password','=',$dt["pass"]]])->get();
        
        if(sizeof($ed)==1)
        {
            $row=(array)$ed[0];
            session()->put("userid",$row["aid"]);
            
            $get=DB::table('category')->get();
            return view('fruntend.cat',['user'=>$get]);
        }
        else
        {
            $msg=["msg"=>"WRONG USER NAME OR PASSWORD"];
            return view('fruntend.login',['msg'=>$msg]);
        }
    }
    public function logout()
    {
        session()->forget('userid');
        return redirect('index');
    }
    public function cat(Request $data)
    {
        $data->validate([
            'nm'=>'Required',
            'num'=>'Required',
            'info'=>'Required'
        ]);
        $dt=$data->all();
        
        $obj=new category;
        $obj->cat_name=$dt['nm'];
        $obj->cat_price=$dt['num'];
        $obj->cat_info=$dt['info'];
        $obj->save();
        
        return redirect('show');
    }
    public function show()
    {
        $get=DB::table('category')->get();
        return view('fruntend.cat',['user'=>$get]);
    }
    public function del($id)
    {
        DB::table('category')->whereIn('cid',[$id])->delete();
        $get=DB::table('category')->get();
        return view('fruntend.cat',['user'=>$get]);
    }
    public function edt($id)
    {
        $adt=DB::table('category')->where('cid','=',$id)->get();
        $d=(array)$adt[0];
        return view('fruntend.edit',['user'=>$d]);
    }
    public function update(Request $data)
    {
        $data->validate([
            'nm'=>'Required',
            'num'=>'Required',
            'info'=>'Required'
        ]);
        $dt=$data->all();
        
        $obj=new category;
        $obj::where('cid','=',$dt["upid"])->update([
        
            'cat_name'=>$dt["nm"],
            'cat_price'=>$dt["num"],
            'cat_info'=>$dt["info"],
        
        ]);
        return redirect('show');
        
        
    }
    public function showuser()
        {
            $get=DB::table('userinfo')->get();
            return view('fruntend.user',['user'=>$get]);
        }
        public function delete($id)
        {
            DB::table('userinfo')->whereIn('uid',[$id])->delete();
            $get=DB::table('userinfo')->get();
            return view('fruntend.user',['user'=>$get]);
        }
        public function status($id)
        {
            DB::table('userinfo')->where('uid',[$id])->get();
            $get=DB::table('userinfo')->get();
            return view('fruntend.user',['user'=>$get]);
        }
    
    

}

?>