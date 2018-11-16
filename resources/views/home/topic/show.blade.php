@extends('home.layout.index')


@section('content')

<!--<base href="http://www.xilexuan.com:80/">--><base href=".">
<link type="text/css" href="/HomeStyle/ht/base.css" rel="stylesheet" media="all">
<link type="text/css" href="/HomeStyle/ht/ns_bbs.css" rel="stylesheet" media="all">
<script src="/HomeStyle/ht/hm.js.下载"></script><script type="text/javascript" src="/HomeStyle/ht/jquery-1.7.2.min.js.下载"></script>
<script type="text/javascript" src="/HomeStyle/ht/jquery.popwin.js.下载"></script>
<script type="text/javascript" src="/HomeStyle/ht/jquery.cookie.js.下载"></script>
<script type="text/javascript" src="/HomeStyle/ht/jquery.placeholder.js.下载"></script>
<script type="text/javascript" src="/HomeStyle/ht/jquery.soChange.js.下载"></script>
<script type="text/javascript" src="/HomeStyle/ht/jquery.highlighter.js.下载"></script>
<script type="text/javascript" src="/HomeStyle/ht/util.js.下载"></script>
<script type="text/javascript" src="/HomeStyle/ht/base.js.下载"></script>
<script type="text/javascript" src="/HomeStyle/ht/mousewheel.js.下载"></script>
<script type="text/javascript" src="/HomeStyle/ht/ns_bbs.js.下载"></script>
<script type="text/javascript" src="/HomeStyle/ht/guide.js.下载"></script>
<script type="text/javascript" src="/HomeStyle/ht/bbs_forum.js.下载"></script>
<script type="text/javascript" src="/HomeStyle/ht/bbs_forumformatter.js.下载"></script>
<script type="text/javascript" src="/HomeStyle/ht/aes.js.下载"></script>
<input type="hidden" id="bdshare_js" sharetext="" sharepic=""><script id="bdshare_id" src="/HomeStyle/ht/share.js.下载"></script><link rel="stylesheet" href="/HomeStyle/ht/share_style0_16.css">


<div class="bbs_container">
<div class="bbs_header">
    








<script type="text/javascript">
	var basePath = "http://www.xilexuan.com:80/";
	var loginUid = "0";
	var yzBaseUrl = "http://xilehui.xbtx.com.cn";
	$(function () {
        /* highlight navbar item */
        /*var uri = '/jsp/goddess/ns_bbs_detail.jsp';
        $(".base_menu a").each(function (index) {
            var nav_menu = $(this).attr("nav-menu");
            $(this).removeClass("current");
            if (uri != '' && typeof nav_menu != 'undefined' && nav_menu != '' && nav_menu != '#') {
                if (uri.indexOf(nav_menu) > 0) {
                    $(this).parents("li").addClass("current");
                }
            }
        });*/
    })
</script>
<input id="headerValues" type="hidden" loginflag="false" basezhid="0" dgurl_sns="http://www.xilexuan.com:80/" dgurl_xunbao="http://xilehui.xbtx.com.cn" dgurl_login="http://auth.xunbaotianxing.com/authLogin?website=XILESHUO&amp;backurl=http://www.xilexuan.com/auth/login&amp;location=687474703a2f2f7777772e78696c657875616e2e636f6d3a38302f&amp;platform=XLYGH">

</div>
 <div class="bbs_wrap">
    <div class="bbs_main">
     
      <div class="bbs_mcon">
        <div class="tsite_pages tsite_pages_up">
        <div class="bbs_mtpub"></div>
          <!-- 上面的分页 -->
						
						


    <div class="mc_Paging op_page Baidu_paging_indicator">
         
    </div>

						
          <div class="rs_clear"></div>
        </div>
        <div class="tsite_bcz">
          <div class="tsite_bc">
          
							
              
              <div class="tsite_bcli_item" id="topic_floor_1">
                            <div class="tsite_bcli tsite_bcli_floorId_area" fid="1">
              <div class="tsite_bc1">
				                <div class="tsite_bntxinf">
				                  <div class="tsite_bc1a">
				                    <div class="tsite_bc1a1 op_nc cd_z1" style="position: static;" username="{{ $topic->abc->uname }}" uid="2200002818"><a target="_blank" href="http://www.xilexuan.com/user.do?method=home&amp;uid=2200002818">{{ $topic->abc->uname }}</a></div>
				                    
				                    <div class="bbs_micred">版主</div>
				                    
				                    <div class="rs_clear"></div>
				                  </div>
				                  
				                  <div class="tsite_bc1b">
				                      
				                        <div class="tsite_bc1b1 cd_pl op_nc cd_z1" style="position: static;" username="{{ $topic->abc->uname }}" uid="2200002818">           
				                    	<a target="_blank" href="http://www.xilexuan.com/user.do?method=home&amp;uid=2200002818"><img width="120px" height="120px" src="{{ $topic->abc->userinfo->avatar }}">
				                    		
				                    	</a>
				                    	</div>
				                  </div>
				                  <!-- 以下是女神图标 -->
				                   
				                </div>
				                <div class="tsite_ki">
				                  
                  <div class="tsite_ki1">
                    <div class="tsite_ki1a"></div>
                    <div class="tsite_ki1b"></div>
                  </div>
                  <?php
						// 评论条数
						$comment = \App\Models\Comment::where('tid',$topic['id'])->get();
						$sum = count($comment);
					?>
                  <div class="tsite_ki1">
                    <div class="tsite_ki1a">评论:{{ $sum }}</div>
                    <div class="tsite_ki1b"></div>
                  </div>
                  <div class="tsite_ki1 bbs_mbgn">
                    <div class="tsite_ki1a"></div>
                    <div class="tsite_ki1b"></div>
                  </div>
                  
				                </div>
				<!-- 以下是级别图标 -->                
				                 <div class="bbs_micon">
				
                </div>
				              </div>
              <div class="tsite_bcrz">
                <div class="tsite_bc2">
                  <div class="tsite_bc2a"><span class="tsite_bc7a2">楼主</span><span class="tsite_bc2a1">发表于</span> 
                  <span class="tsite_bc2a1">{{ $topic->created_at }}</span><span class="tsite_bc2a3">|</span>
                   <span class="tsite_bc2a2">
                  
				       <a class="fe_bbsa fe_bbsa_list_creator" href="/topic">返回列表</a>
				       
				  </span>
                </div>
                </div>
                <div class="bbs_mtzcon">
                  <div class="tsite_bc3z">
                    <div class="tsite_bc2b"><span class="bbs_t_title">{!! $topic->content !!}</span> 
                                    <span class="tsite_bc2b3_top_digest_info"><span class="tsite_bc2b3" digest="0" top="0">	<span class="tsite_bc2b3_top"></span>	<span class="tsite_bc2b3_digest"></span>	<span class="tsite_bc2b3_lockflag"></span></span>
				                  	</span></div>
                  
                    <div class="bbs_mbcons"><p style="text-align:center;">
	
					</div>
                    
                       <div class="bbs_mgn" style="display: none;">
                      
                      <div class="bbs_mgnc bbs_mgnaa">
                       
                      </div>
                     
                    </div>
                     <div class="bbs_mgn">
                     
                      
                     
                    </div>
               
                   		
                    
                    <div class="tsite_bc5">
				                 
                    
				                  <div class="rs_clear"></div>
				                </div>
                  </div>
                </div>
              </div>
               <div class="tsite_bc6"></div>
            </div>
           
           </div>
    <!-- 帝王置顶大循环结束 -->
		  <div class="bbs_msubt">全部评论</div>

          <div class="tsite_bcz">		 
		  <div class="tsite_bc">		            
		  
					
           </div>
           @foreach ($comment as $k=>$v)
		 	<div class="tsite_bcli_item" id="topic_floor_20">
                            <div class="tsite_bcli tsite_bcli_floorId_area" fid="20">
							<div class="tsite_bc1">
				                <div class="tsite_bntxinf">
				                  <div class="tsite_bc1a">
				                    <div class="tsite_bc1a1 op_nc cd_z1" style="position: static;" username="{{ $v->abc->uname }}" uid="239403759"><a target="_blank" href="http://www.xilexuan.com/user.do?method=home&amp;uid=239403759">{{ $v->abc->uname }}</a></div>
				                    
				                    <div class="rs_clear"></div>
				                  </div>
				                  <div class="tsite_bc1b2">
				                        <div class="tsite_bc1b1 cd_pl op_nc cd_z1" style="position: static;" username="{{ $v->abc->uname }}" uid="239403759">           
				                    	<a target="_blank" href="http://www.xilexuan.com/user.do?method=home&amp;uid=239403759"><img width="120px" height="120px" src="{{ $v->abc->userinfo->avatar }}">
				                    		
				                    	</a>
				                    	</div>
				                  </div>
				                  <!-- 以下是女神图标 -->
				                   
				                </div>
				                <div class="tsite_ki">
				                  
                  
                  
				                </div>
				<!-- 以下是级别图标 -->                
				                  <div class="bbs_micon">
				
                </div>
				              </div>
		 <div class="tsite_bcrz">
                <div class="tsite_bc2">
                  <div class="tsite_bc2a"><span class="tsite_bc7a2">{{ $k+1 }}楼</span><span class="tsite_bc2a1">评论于</span><span class="tsite_bc2a1">{{ $v->created_at}}</span> </div>
                </div>
                <div class="tsite_bc3z">
                
                  <div class="bbs_mtzcon">
                  
                    <div class="bbs_mtzconp tsite_bc3b_tcontent">{{ $v->content }}</div>
                    
                    <div class="bbs_mlogs">
	                    <div class="tsite_bc4">
					    </div>
                    </div> 
                  </div>
                  <div class="tsite_bc5">
                     <div class="tsite_bc5b" style="display: none;">
                       
		                  <span class="tsite_bc5b1 tsite_report" data_reportsource="5" data_reporteeuid="239403759" data_reporteeusername="小撸手" data_reporturl="http://www.xilexuan.com:80/thread-100160.html"><a class="tsite_kgrp" href="javascript:void(0);">举报</a></span><span class="tsite_bc5b2">|</span>        
		                  <span class="tsite_bc5b1 tsite_bc5b1_refer tsite_scroll_to_end"><a href="javascript:void(0)">引用</a></span>                    
                      </div>
                      <div class="rs_clear"></div>
                    </div>
                </div>
              </div>
              <div class="tsite_bc6"></div>
            </div>
           </div>
           @endforeach
		  <!-- 大循环结束 -->
          <!-- <div style="clear:both">此处加载分页</div> -->
						<div class="tsite_pages tsite_pdmin tsite_pages_bottom">
    <div class="mc_Paging op_page Baidu_paging_indicator">
          
    </div>

						   
					       <div class="rs_clear"></div>      
					    </div>
					    
					    <!-- 回帖开始 -->
          <div class="tsite_bdz" id="bbs_mscre">
            <div class="tsite_bd">
              <div class="tsite_bcli">
                <div class="tsite_bc1 tsite_reply_topic_namecard">
										<!-- 回帖中的 左侧用户名片 -->


									</div>
                <div class="tsite_bcrz">
                  <div class="tsite_bc7z">
                    <div class="tsite_bc7zc tsite_bc7_ref" refid="-1" fid="" style="display:none">
                      <div class="tsite_bc7zct"></div>
                      <div class="tsite_bc7zcn"></div>
                    </div>
                    <div class="tsite_bc7q">
                    @if (session()->has('uname'))
                     	<div class="title" id="comment">
							<h3>话题评论</h3>
						  </div>
						  <div id="respond">
								<form id="comment-form" name="comment-form" action="/comment" method="POST">
									{{ csrf_field() }}
									<div class="comment">
										<input name="tid" class="form-control" size="22" maxlength="15" autocomplete="off" tabindex="1" type="hidden" value="{{ $topic->id }}">
										<div class="comment-box">
											<textarea placeholder="说点什么吧!!!" name="content" id="comment-textarea" cols="100%" rows="3" tabindex="3"></textarea>
											<div class="comment-ctrl">
												<div class="comment-prompt" style="display: none;"> <i class="fa fa-spin fa-circle-o-notch"></i> <span class="comment-prompt-text">评论正在提交中...请稍后</span> </div>
												<div class="comment-success" style="display: none;"> <i class="fa fa-check"></i> <span class="comment-prompt-text">评论提交成功...</span> </div>
												<button type="submit" name="comment-submit" id="comment-submit" tabindex="4">评论</button>
											</div>
										</div>
									</div>
								</form>
								
							</div>
                      @else
	                       <div class="tsite_bc7q1" style="">
	                       
	                        <div class="tsite_bc7q1b"> <span class="tsite_bc7q1b1">评论请先</span> <span class="tsite_bc7q1b2"><a href="/login">登录</a></span> <span class="tsite_bc7q1b3">|</span> <span class="tsite_bc7q1b4"><a href="/login/create">注册</a></span> </div>
	                      </div>
                    @endif
                	</div>   
                  </div>
                </div>
                <div class="tsite_bc6"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="rs_clear"></div>
      </div>
    </div>
    <!--bbs_main end--> 
  </div>
</div>

  


</div></div>





<script type="text/javascript" src="/HomeStyle/ht/header.js.下载"></script>
<script type="text/javascript" src="/HomeStyle/ht/ZeroClipboard.js.下载"></script>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?aec04b0ef9e30b6eaac2f43bd48df4fc";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
</div>
<script type="text/javascript">
	var basePath = "http://www.xilexuan.com:80/";
	loadBDShare();
	var aid = 66;
	var image_download_path  = "http://img.xbtx.com.cn/download/";
	$(function() {
		$.Placeholder.init();
		var curUid = 0;
		var tid = "100160";
		var fid = 1;
		var onlyLooklzUid =  -1;
		var userLevel = -1;
		var nowPage = 1;
		var type = 1;
		
		XB.bbs_forum.currentUid = curUid;
		XB.bbs_forum.userLevel = userLevel;
		XB.bbs_forum.init(aid);
		setTimeout(function(){
        	XB.bbs_forum.fe_scroll(null,"topic_floor_"+fid,null,1);
        },400);
		//初始化
		//var bbs_Title_type=$("#bbs_Title_type").attr("value");
		//var bbsTitle=$(".bbs_t_title").text();
		//$(document).attr("title",bbsTitle+"-"+bbs_Title_type+"-"+"喜乐说");
		if(nowPage == 1){//第一页，加载这些回复很赞的功能.
			XB.bbs_forum.getAwardsList(aid,tid);
			if(onlyLooklzUid == -1){
	           	XB.bbs_forum.getHotFavReplyForTopic(aid,tid);
			}
      	}
	    if(curUid > 0){
	    	XB.bbs_forum.getMyNameCard(aid,tid);
	    	XB.bbs_forum.watchSearchAtInput("searchAt",XB.bbs_forum.searchAt); 
	    }else{
	    	//游客身份，不显示编辑器，所有的可操作的按钮删除。
	    	//if(userLevel == -1 || XB.bbs_forum.currentUid == -1)
	    	$(".tsite_bc7q1").show();
        	$(".tsite_bc5b").hide();//游客身份，把 tsite_bc5b remove
	    }
	});
</script>

@endsection