@extends('admin/common')

@section('title', '问题修改')

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
        <h3 style="color:grey">问题修改：</h3><br>
        <h4><button id="button" class="btn btn-primary">返回</button></h4>&nbsp
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>警告:</strong> {{$error}} </div>
            @endforeach
        @endif
        <form class="form-horizontal" action="{{url('admin/update_questions_do')}}" method="post">
            @csrf
            <input type="hidden" name="q_id" value="{{$questions['q_id']}}">
            <input type="hidden" name="cou_id" value="{{$questions['cou_id']}}">
            <div class="form-group">
                <br>
                <label for="inputEmail3" class="col-sm-2 control-label">问题修改：</label>
                <div class="col-sm-10 col-md-5">
                    <input type="text" name="q_title" value="{{$questions['q_title']}}" class="form-control" placeholder="请输入问题标题">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">问题内容：</label>
                <button type="button" class="btn btn-warning button">收起</button>
                <div class="col-sm-10 col-md-5" id="show">
                    <!-- 加载编辑器的容器 -->
                    <script id="container" name="q_content" type="text/plain" style="height:300px;">{{strip_tags($questions['q_content'])}}</script>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-info" >修改</button>
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
