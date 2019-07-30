@extends("Admin.Public.Layout")
@section('title',"后台用户管理")
@section('main')
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i> Data Table with Numbered Pagination</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
     <div id="DataTables_Table_1_length" class="dataTables_length">
      <label>Show <select size="1" name="DataTables_Table_1_length" aria-controls="DataTables_Table_1"><option value="10" selected="selected">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label>
     </div>
     <!--搜索-->
     <form method="get" action="/user">
     <div class="dataTables_filter" id="DataTables_Table_1_filter">
      <label>用户名: <input type="text" name="search" aria-controls="DataTables_Table_1" value="{{$request['search'] or ''}}" />
      手机号: <input type="text" name="phone" aria-controls="DataTables_Table_1" value="" />
      <button class='btn btn-info'>提交</button>
      </label>
     </div>
     </form>
     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 161px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">序号</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 206px;" aria-label="Browser: activate to sort column ascending">姓名</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 193px;" aria-label="Platform(s): activate to sort column ascending">性别</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 135px;" aria-label="Engine version: activate to sort column ascending">电话</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 101px;" aria-label="CSS grade: activate to sort column ascending">操作</th>
       </tr> 
      </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
       @foreach($row as $v)
       <tr class="odd"> 
        <td class="  sorting_1">{{$v->id}}</td> 
        <td class=" ">{{$v->user}}</td> 
        <td class=" ">{{$v->sex}}</td> 
        <td class=" ">{{$v->phone}}</td> 
        <td class=" ">
          <form action="/user/{{$v->id}}" method='post'>
            {{csrf_field()}}
            {{method_field("DELETE")}}
            <button class='btn btn-info'><i class="icol-bin-closed"></i></button>
          </form>
          <button zhi="{{$v->id}}" class="btn btn-success del"><i class="icol-cross"></i></button>
          <a href="/user/{{$v->id}}/edit" class="btn btn-warning"><i class="icol-control-wheel"></i></a>
        </td> 
       </tr>
       @endforeach
      </tbody>
     </table>
     <div class="dataTables_info" id="DataTables_Table_1_info">
      Showing 1 to 10 of 57 entries
     </div>
     <div class="dataTables_paginate paging_full_numbers" id="pages">
      {{$row->appends($request)->render()}}
     </div>
    </div> 
   </div> 
  </div>
 </body>
</html>
<script src="/static/jquery-1.8.3.min.js"></script>
<script>
$('.del').click(function(){
  //点击删除按钮 执行删除 发送ajax  ??  id 
  //获得id 
  var jg = confirm("确定吗?");
  if(jg){
      var id = $(this).attr('zhi');
      var t = $(this).parents('tr');
      $.get("/userad",{id:id},function(data){
          if(data == '1'){
              //删除当前按钮所在的行
              t.remove();
          }
      })

      
  }
})
</script>
@endsection