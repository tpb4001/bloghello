@extends('home.layout.index')


@section('content')
<link rel="stylesheet" href="/bkzhuye/css/layui.css">
<link rel="stylesheet" href="/bkzhuye/css/base.css">
<link rel="stylesheet" href="/bkzhuye/css/zhuanlan.css">
<script src="/bkzhuye/js/jquery.js"></script>
<script src="/bkzhuye/js/base.js"></script>
<script src="/bkzhuye/js/layui.js"></script>
<script type="text/javascript" src="/bkzhuye/js/jquery.placeholder.min.js"></script>
<script type="text/javascript">
// 手机适配
if (/AppleWebKit.*mobile/i.test(navigator.userAgent) || (/MIDP|SymbianOS|NOKIA|SAMSUNG|LG|NEC|TCL|Alcatel|BIRD|DBTEL|Dopod|PHILIPS|HAIER|LENOVO|MOT-|Nokia|SonyEricsson|SIE-|Amoi|ZTE/.test(navigator.userAgent))) {
	if (window.location.href.indexOf("?mobile") < 0) {
		if (/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
			window.location.href = "http://m.blog.itpub.net/31397003/viewspace-2220130/";
		}
	}
}
</script>
<link href="/bkzhuye/staticcss/shcoredefault.css" rel="stylesheet" type="text/css"/>
<script src="/bkzhuye/static/js/shcore.js" type="text/javascript"></script>
<script type="text/javascript">
	$(function () {
		SyntaxHighlighter.all()
	});
</script>
<script src="/bkzhuye/static/js/template.js"></script>
<script src="/bkzhuye/static/js/detail.js"></script>
<style>
	.code .container > textarea{ height:100%; }
	.translate{color: #9fa3a7 !important;font-size:12px !important;}
	.translate a{font-size:12px !important;color:#9fa3a7 !important;}
	.translate a:hover {font-size:12px !important;color:#f15142 !important;}
	.newslist{padding:10px 5px;height:20px !important;line-height:20px;overflow:hidden;text-overflow: ellipsis;white-space: nowrap;border-bottom:1px solid #eee}
</style>
<!--header部分结束-->
<script src="http://blog.itpub.net/js/paging.js"></script>
<!--main部分开始-->
	<div class="blog-main clearfix w1200">
        <div class="fl w890 blog-list clearfix">
            <div class="top-title mt30">
                <span style="border-bottom: 1px solid #fff;">
                    <a href="/grbk/{{ $id }}" style="margin-right: 0px;padding-bottom: 0px;">全部博文</a>
                </span>
                <span style="margin-left: 10px; border-bottom: 1px solid #f15142;">
                    <a style="margin-right: 0px;" href="/grbk/myalbum/{{ $id }}">个人相册</a>
                </span>
            </div>
		    <ul class="list-items" id="list">
		        <!--博主本人和管理员 显示 开始-->
		        <div class="btns" style="display: none;">
		            <a href="/blog/post/2220310/"><span class="text-btn mr30">编辑</span></a>
		            <span class="text-btn" mid="2220310" onclick="blogObj.delDraft($(this))">删除</span>
		        </div>
		        <!--博主本人和管理员 显示 结束-->
		    	@foreach ($album as $k=>$v) 
			  	<article class="excerpt excerpt-1" style="">
			  		<a class="focus" href="javascript:;" title="{{ $v->title }}" target="_blank" draggable="false"><img class="thumb" data-original="images/logo1.png" src="{{ $v->image }}" alt="{{ $v->images }}" style="display: inline;" draggable="false"></a>
					<header><a class="cat" href="#" title="分享时间" draggable="false">分享时间<i></i></a>
						<h2><a href="javascript:;" title="{{ $v->created_at }}" target="_blank" draggable="false">{{ $v->created_at }}</a>
						</h2>
					</header>
					<div style="height: 120px;overflow: hidden;">
						{{ $v->content }}	
					</div>
				</article>
			  	@endforeach
		    </ul>
		    <!-- 分页 开始 -->
		    <div class="fy">
                {!! $album->render() !!}
                <script type="text/javascript">
                    $(function(){
                        $('.pagination').removeAttr('style');
                        $('.fy ul').attr('style','padding-bottom: 0px;margin-top: 10px;padding-top: 0px;');
                    });
                </script>
            </div>  
		    <!-- 分页 结束 -->                            
        </div>
        <div class="fr w290">
            <!--作者信息开始-->
            <!--作者信息开始-->
<div class="author-info right-fixed ">
    <div class="head-img">
    <a href=""><img src="http://account.itpub.net/api/avatar.php?uid=31397003" alt=""></a>
    </div>
	
    <div class="author-name">
    	<a href="">不一样的天空w</a>
    </div>

    <div class="author-intro">
    </div>
    <p class="register-time"><span class="color77">注册时间：</span>2016-09-22</p>

    <ul class="tree-list clearfix">
        <li>
            <div class="item-tt">博文量</div>
            <a href="http://blog.itpub.net/31397003/"><span class="item-num blognum">739</span></a>
        </li>
        <li>
            <div class="item-tt">访问量</div>
            <div class="item-num blogviewnum">345675</div>
        </li>
    </ul>

</div>
<!--作者信息结束-->

<script>
    var data = {uid: 31397003};
    $._ajax({
        url: '/getAuthorInfo/',
        data: data,
        type: 'get',
        dataType: 'json',
        success: function (data) {
            if (data.code == 200) {
                var data = data.data;
                $(".blognum").text(data.blognum);
                $(".blogviewnum").text(data.visitednum);
            }
        }
    });
</script>            
<!--作者信息结束-->
            <style>
                .search0801{ margin:0 auto; width:248px; border:1px solid #e0e0e0; height:38px; overflow:hidden; background:#fff;}
                .inp0801{ float:left; width:176px; padding:0 10px; line-height:38px; border:0;}
                .btn0801{ float:right; width:51px; height:38px; cursor:pointer; background:url(http://blog.itpub.net/images/searchBtn.png) no-repeat; cursor:pointer; border:0;}
                .list0801{ width:250px; clear:both; overflow:hidden; padding:0 0 15px;}
                .list0801 li{ float:left; width:250px; height:38px; line-height:38px;}
                .list0801 li a{ width:100%; overflow:hidden; clear:both; display:block;}
                .list0801 li a span{ float:left; width:190px;overflow: hidden;
                    white-space: nowrap;
                    text-overflow: ellipsis;height:38px; }
                .list0801 li a i{ float:right; color:#777;}
                .list0801 li a:hover span{ color:#F15142;}
            </style>
            <!--博文归档-->
            <div class="blog-choice right-fixed" style="position: static; top: 0px; left: 984px;">
                <h3 class="choice-title">博文归档</h3>
                @foreach ($path as $k=>$v)
                <ul class="list0801">
                	<a href="{{ $v->title }}">{{ $v->title }}</a>
                </ul>
                @endforeach
            </div>
        </div>
    </div>
<!--main部分结束-->
<script type="text/javascript">
    var user=blog.user.get();
    if (user&&(user.role==1||'31397003'==user.userid)) {
        $(".daka_list li").each(function () {
            $(this).find('.tehui').append("<i class=\"edit\" style='display:none;margin-right:20px;'><a style='font-size:12px;' href=\"/column/add/"+$(this).data("id")+"/\">编辑</a></i>");
        });
        $(".daka_list li").hover(function () {
            $(this).find('.edit').show();
        },function () {
            $(this).find('.edit').hide();
        });
    }

    $(".list-items .list-item").hover(function () {

        if (user&&(user.role==1||'31397003'==user.userid)){
            $(this).children('.btns').show();
        }else {
            $(this).children('.btns').hide();
        }
    },function () {
        $(this).children('.btns').hide();
    })
    
    $(".searchTxt").keyup(function (event) {
        if(event.keyCode == 13){
            $(".searchBtn").click();
        }
    })

    $(".searchBtn").click(function () {
        var keyword = $(".searchTxt").val();
        if(keyword){
            window.location.href = "/31397003/search/" + keyword +'/';
        } else {
            window.location.href = "/31397003/";
        }
    })

</script>
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?5016281862f595e78ffa42f085ea0f49";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
@endsection