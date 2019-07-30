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
    <form class="mws-form" action="/user" method='post'>
      {{csrf_field()}} 
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">用户名</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" name='user' value="{{old('user')}}" /> 
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">密码</label> 
       <div class="mws-form-item"> 
        <input type="password" name='password' class="large"/> 
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">确认密码</label> 
       <div class="mws-form-item"> 
        <input type="password" name='repassword' class="large"  /> 
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">邮箱</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" value="{{old('email')}}" name='email'  /> 
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">电话</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" value="{{old('phone')}}" name='phone' /> 
       </div> 
      </div> 
      <div class="mws-form-row">
                    <label class="mws-form-label">性别</label>
                    <div class="mws-form-item">
                         <ul class="mws-form-list">
                          <li><input checked id="gender_male" type="radio" name="sex" value='1' {{old('sex')?'checked':''}} class="required"> <label for="gender_male" >男</label></li>
                          <li><input id="gender_female" type="radio" name="sex" {{old('sex')?'':'checked'}} value='0'> <label for="gender_female">女</label></li>
                        </ul>
                  <label for="gender" class="error plain" generated="true" style="display:none"></label>
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