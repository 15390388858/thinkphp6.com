<?php
declare (strict_types = 1);

namespace app\admin\controller;
use app\admin\model\permission;
use app\admin\model\premission;
use app\admin\model\user;
use app\validate\loginInfoval;
use think\facade\Session;
use think\facade\View;
use think\Request;

class index
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        return View::fetch();
    }

    public function login(){

        $username =  input("username");
        $password =  input("password");
        Session::set("name",$username);
        try{

//            validate(loginInfoval::class)->check([
//                "
//"=>$username,
//                "password"=>$password,
//            ]);
            $login = new user();
            //数据库查找
            $logins = $login ->where("name","=",$username)->find();
            //判断用户
            if($logins['name'] == null && $logins['name'] == ""){
                return json(["code"=>300,"msg"=>"账号错误"]);
            }
            //判断密码
            if($logins['password']!= md5(md5($password))){
                return json(["code"=>300,"msg"=>"密码错误"]);
            }

            return json(["code"=>200,"msg"=>"登陆成功","data"=>null]);

        }catch (ValidateException $e){
            return json(["code"=>300,"msg"=>$e->getError()]);

        }
    }


    public function show(){

        $premodel = new permission();
        $data = $premodel->paginate(5);
        View::assign("data",$data);
        return View::fetch("/index/premission");

    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
