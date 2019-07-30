<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Admininfo extends Model
{
    //该model层跟数据库中的哪个表进行关联
    protected $table = 'admininfo';
    //该模型是否被自动维护时间戳
	public $timestamps = false;
	//主键
	protected $primaryKey="id";
	//可以被批量赋值的属性。(字段)
	protected $fillable = ['truename',"age","idcard","aid"];
}
