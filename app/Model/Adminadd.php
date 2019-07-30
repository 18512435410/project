<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Adminadd extends Model
{
    //
    //该model层跟数据库中的哪个表进行关联
    protected $table = 'adminadd';
    //该模型是否被自动维护时间戳
	public $timestamps = false;
	//主键
	protected $primaryKey="id";
	//可以被批量赋值的属性。(字段)
	protected $fillable = ['city',"cinfo","aid"];
}
