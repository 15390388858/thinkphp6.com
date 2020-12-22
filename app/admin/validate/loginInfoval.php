<?php

namespace app\admin\validate;




use think\Validate;

class loginInfoval extends Validate
{
    protected $rule =   [
        'username'  => 'require|max:32',
        'password'   => 'require|min:6|max:16',
    ];

    protected $message  =   [
        'username.require' => '用户名必须',
        'username.max'     => '用户名必须最多不能超过25个字符',
        'password.require'   => '密码必须',
        'password.min'  => '密码必须至少不能超过6个字符',
        'password.max'        => '密码必须至多不能超过16个字符',
    ];
}