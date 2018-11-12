@extends('home.layout.index')

@section('content')
<div class="content" style="text-align: center;margin-right: 0px;">
  <header class="article-header">
	<h1 class="article-title">
		{{ $article->title }}
	</h1>
	<div class="article-meta"> <span class="item article-meta-time">
	  <time class="time" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="发表时间：{{ $article->created_at }}"><i class="glyphicon glyphicon-time"></i> {{ $article->created_at }}</time>
	  </span> <span class="item article-meta-source" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="来源：{{ $article->copyform }}"><i class="glyphicon glyphicon-globe"></i> {{ $article->copyform }}</span> <span class="item article-meta-category" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="{{ $article->cates->cname }}"><i class="glyphicon glyphicon-list"></i> <a href="#" title="{{ $article->cates->cname }}" draggable="false">{{ $article->cates->cname }}</a></span> <span class="item article-meta-views" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="浏览量：{{ $article->articleinfo->path }}"><i class="glyphicon glyphicon-eye-open"></i> {{ $article->articleinfo->path }}</span> <span class="item article-meta-comment" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="评论量"><i class="glyphicon glyphicon-comment"></i> 4</span> </div>
  </header>
  <article class="article-content">
	<p><img data-original="/HomeStyle/images/201610181557196870.jpg" src="/HomeStyle/images/201610181557196870.jpg" alt="" draggable="false" style="display: block;"></p>
	{!! $article->articleinfo->article !!}
	<div class="bdsharebuttonbox bdshare-button-style1-32" data-bd-bind="1541754863457"><a href="#" class="bds_more" data-cmd="more" draggable="false"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间" draggable="false"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博" draggable="false"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博" draggable="false"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信" draggable="false"></a><a href="#" class="bds_tieba" data-cmd="tieba" title="分享到百度贴吧" draggable="false"></a><a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友" draggable="false"></a></div>

		  <script>                  window._bd_share_config = { "common": { "bdSnsKey": {}, "bdText": "", "bdMini": "2", "bdMiniList": false, "bdPic": "", "bdStyle": "1", "bdSize": "32" }, "share": {} }; with (document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=0.js?cdnversion=' + ~(-new Date() / 36e5)];</script>
  </article>
  <div class="article-tags" style="text-align: left;">标签：<a href="#list/2/" rel="tag" draggable="false">DTcms博客</a><a href="#list/3/" rel="tag" draggable="false">木庄网络博客</a><a href="#list/4/" rel="tag" draggable="false">独立博客</a><a href="#list/5/" rel="tag" draggable="false">修复优化</a>
	</div>
  <div class="relates">
	<div class="title">
	  <h3>相关推荐</h3>
	</div>
	<ul style="text-align: left;">
	  <li><a href="#" title="" draggable="false">用DTcms做一个独立博客网站（响应式模板）-MZ-NetBlog主题</a></li>
	  <li><a href="#" title="" draggable="false">用DTcms做一个独立博客网站（响应式模板）-MZ-NetBlog主题</a></li>
	  <li><a href="#" title="" draggable="false">用DTcms做一个独立博客网站（响应式模板）-MZ-NetBlog主题</a></li>
	  <li><a href="#" title="" draggable="false">用DTcms做一个独立博客网站（响应式模板）-MZ-NetBlog主题</a></li>
	  <li><a href="#" title="" draggable="false">用DTcms做一个独立博客网站（响应式模板）-MZ-NetBlog主题</a></li>
	  <li><a href="#" title="" draggable="false">用DTcms做一个独立博客网站（响应式模板）-MZ-NetBlog主题</a></li>
	  <li><a href="#" title="" draggable="false">用DTcms做一个独立博客网站（响应式模板）-MZ-NetBlog主题</a></li>
	  <li><a href="#" title="" draggable="false">用DTcms做一个独立博客网站（响应式模板）-MZ-NetBlog主题</a></li>
	</ul>
  </div>
  <div class="title" id="comment">
	<h3>评论</h3>
  </div>
  <div id="respond">
		<form id="comment-form" name="comment-form" action="" method="POST">
			<div class="comment">
				<input name="" id="" class="form-control" size="22" placeholder="您的昵称（必填）" maxlength="15" autocomplete="off" tabindex="1" type="text">
				<input name="" id="" class="form-control" size="22" placeholder="您的网址或邮箱（非必填）" maxlength="58" autocomplete="off" tabindex="2" type="text">
				<div class="comment-box">
					<textarea placeholder="您的评论或留言（必填）" name="comment-textarea" id="comment-textarea" cols="100%" rows="3" tabindex="3"></textarea>
					<div class="comment-ctrl">
						<div class="comment-prompt" style="display: none;"> <i class="fa fa-spin fa-circle-o-notch"></i> <span class="comment-prompt-text">评论正在提交中...请稍后</span> </div>
						<div class="comment-success" style="display: none;"> <i class="fa fa-check"></i> <span class="comment-prompt-text">评论提交成功...</span> </div>
						<button type="submit" name="comment-submit" id="comment-submit" tabindex="4">评论</button>
					</div>
				</div>
			</div>
		</form>
		
	</div>
  <div id="postcomments" style="text-align: left;">
	<ol id="comment_list" class="commentlist">        
	<li class="comment-content"><span class="comment-f">#2</span><div class="comment-main"><p><a class="address" href="#" rel="nofollow" target="_blank" draggable="false">木庄网络博客</a><span class="time">(2016/10/28 11:41:03)</span><br>不错的网站主题，看着相当舒服</p></div></li>
	<li class="comment-content"><span class="comment-f">#1</span><div class="comment-main"><p><a class="address" href="#" rel="nofollow" target="_blank" draggable="false">木庄网络博客</a><span class="time">(2016/10/14 21:02:39)</span><br>博客做得好漂亮哦！</p></div></li></ol>
  </div>
</div>
@endsection