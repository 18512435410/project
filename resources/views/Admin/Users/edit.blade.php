@extends("Admin.Public.Layout")
@section('title',"后台用户管理")
@section('main')



  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-pencil"></i> 用户修改</span> 
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
    <form class="mws-form" action="/users/{{$row->id}}" method='post'>
      {{csrf_field()}} 
      {{method_field('PUT')}}
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">用户名</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" value="{{$row->user}}" name='user' /> 
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">邮箱</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" value="{{$row->email}}" name='email'  /> 
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">电话</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" value="{{$row->phone}}" name='phone' /> 
       </div> 
      </div> 
      <div class="mws-form-row">
                    <label class="mws-form-label">性别</label>
                    <div class="mws-form-item">
                         <ul class="mws-form-list">
                    <li><input checked id="gender_male" type="radio" name="sex" value='1' class="required"> <label for="gender_male" {{($row->sex)?"checked":''}} >男</label></li>
                    <li><input id="gender_female" type="radio" name="sex" value='0' {{($row->sex)?"":'checked'}} > <label for="gender_female">女</label></li>
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