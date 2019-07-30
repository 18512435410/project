@extends("Admin.Public.Layout")
@section('title',"后台用户管理")
@section('main')



  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-pencil"></i> 用户添加</span> 
   </div>
  @if (count($errors) > 0)
  <div class="mws-form-message warning">
    用户信息录入不合法
    <ol>
      @foreach ($errors->all() as $error)    
        <li>{{ $error }}</li>
      @endforeach
    </ol>
  </div>
  @endif

  

   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/users" method='post'>
      {{csrf_field()}} 
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">真是姓名</label> 
       <div class="mws-form-item"> 
        {{$admininfo->truename}}
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">年龄</label> 
       <div class="mws-form-item"> 
         {{$admininfo->age}}
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">身份证</label> 
       <div class="mws-form-item"> 
         {{$admininfo->idcard}}
       </div> 
      </div> 

    <div class="mws-button-row">
                              <input type="submit" class="btn btn-info">
                            </div>
     </div> 
    </form> 
   </div> 
  </div>
@endsection