<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
	//该model层跟数据库中的哪个表进行关联
    protected $table = 'admin';
    //该模型是否被自动维护时间戳
	public $timestamps = true;
	//可以被批量赋值的属性。(字段)
	protected $fillable = ['user',"password","email","phone",'sex'];
	//运用修改器    get字段Attribute
	public function getsexAttribute($value){
		$arr = ["1"=>'男',"0"=>'女'];
		return $arr[$value];
	}
	//将admin模型 和admininfo模型建立关联
	public function info(){
		//一对一的关系 hasOne ①.跟哪个模型关联  ②.关联的字段是什么  
		return $this->hasOne('App\Model\Admininfo','aid');
	}
	//将admin模型 和 adminadd模型 建立关联
	public function address(){
		//一对多的关系 hasMany
		return $this->hasMany('App\Model\Adminadd',"aid");
	}
}
