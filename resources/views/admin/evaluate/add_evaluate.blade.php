@extends('admin/common')

@section('title', '评论列表')

@section('body')
    <!-- 配置文件 -->
    <script type="text/javascript" src="{{asset('UEditor/utf8-php/ueditor.config.js')}}"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="{{asset('UEditor/utf8-php/ueditor.all.js')}}"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container');
    </script>
    <div class="container">&nbsp
        <h3 style="color:grey">回复评论：</h3><br>
        <h4><button id="button" class="btn btn-primary">返回</button></h4>&nbsp
        <form class="form-horizontal" action="{{url('admin/add_evaluate_do')}}" method="post">
            @csrf
            <input type="hidden" name="e_id" value="{{$e_id}}">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">评论回复：</label>
                <button type="button" class="btn btn-warning button">收起</button>
                <div class="col-sm-10 col-md-5" id="show">
                    <!-- 加载编辑器的容器 -->
                    <script id="container" name="e_desc" type="text/plain" style="height:300px;"></script>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-info" >回复</button>
                </div>
            </div>
        </form>

    </div>

@endsection

@section('script')
    <script>
        $('#button').click(function(){
            window.history.go(-1);
        })
    </script>
    <script>
        $('.button').click(function(){
            if($(this).text()=='收起'){
                $('#show').addClass('hide');
                $(this).text('放下');
            }else{
                $('#show').removeClass('hide');
                $(this).text('收起');
            }

        });
    </script>

@endsection
