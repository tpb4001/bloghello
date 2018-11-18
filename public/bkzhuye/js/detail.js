/*用户钩子*/
userHook = function () {
    if (blog.user.get()) {
        $(".new-comment").find('img').attr('src',blog.user.get().headimg);
        $(".new-comment").find(".avatar").attr("href", "/" + blog.user.get().userid);
    }
}

$(function () {
    blogObj.loadData();
    blogObj.loadComment();
    blogObj.previewBody();
    blogObj.rightFixde();
    $(window).on("resize", blogObj.rightFixde);
});

var page = 1;
var flag = true;
blogObj.previewBody = function () {
    var windowH = $(window).height();
    var previewBody = $(".preview-body");
    var previewMain = $(".preview-main");
    // 注释展示更多
    // var previewMainH = previewMain.outerHeight();
    // if (previewMainH > windowH * 2) {
    //     previewBody.after('<button class="ready-more-btn layui-btn layui-btn-primary" onclick=$(this).remove();$(".preview-body").removeClass("windowH")>阅读更多</button>');
    // }
    // ;
}


/*初始化加载数据*/
blogObj.loadData = function () {
    var id = $("#blogId").val();
    var data = {id: id};
    $._ajax({
        url: '/getBlogData/',
        type: 'get',
        dataType: 'json',
        data: data,
        success: function (data) {
            var data = data.data;
            $(".icon-see").text(data.viewnum);
            $(".icon-comment").text(data.replynum);
            $("#praise .num").text(data.praisenum);
            $("#collect .num").text(data.collect);
            if (data.ispraise) {
                $("#praise").addClass('beon')
            }
            if (data.isfavour) {
                $("#collect").addClass('beon')
            }
            if (data.canEdit) {
                $('.superman').css('display', 'block');
            }
            if(data.isshow==1)
            {
                $(".preview-main").html(data.content);
                $(".zhaiyao_goumai").hide();
            }
        }
    })
}

/*点赞、收藏*/
blogObj.praise = function (ele, url) {
    var type = ele.hasClass('beon') ? 0 : 1;
    $._ajax({
        url: url,
        data: {blogid: $("#blogId").val()},
        type: 'post',
        dataType: 'json',
        success: function (data) {
            if (data.code == 200) {
                if (type) {
                    ele.addClass('beon');
                    ele.children(".num").text(parseInt(ele.children(".num").text()) + 1);
                    praiseHtml = $("#praise.beon").html();
                } else {
                    ele.removeClass('beon');
                    ele.children(".num").text(parseInt(ele.children(".num").text()) - 1);
                }
            } else {
                blogObj.alert(data.msg);
            }
        }
    })
}

/*加载评论*/
blogObj.loadComment = function (url, count) {
    if (blog.user.get())
        $(".sign-container").hide();
    else
        $(".sign-container").next().hide();

    var count = count ? count : 5;
    var url = url ? url : "/comment/blog/";

    var blogid = $("input[name='hid']").val();
    var data = {
        page: page,
        blogid: blogid
    }
    if (!flag) {
        return;
    }
    $._ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        data: data,
        success: function (data) {
            if (data.code == 200) {
                var data = data.data;
                var total = data.total;
                var items = data.items;
                //console.log(items);
                var obj = {
                    items: items
                }
                var resultStr = template('blog_template', obj);
                if (page == 1 && total > 0) {
                    $(".top-title .colorbb").html(total);
                }
                $("#comment_items").append(resultStr);

                if (total == 0) {
                    $("#comment_items").after(' <div class="blog-default"> <img src="/images/search_pic_kong.svg" alt=""> </div>');
                }
                if (total > count && page == 1) {
                    $("#comment_items").after('<button class="layui-btn layui-btn-primary layui-btn-fluid mt30" onclick=blogObj.loadComment()>点击加载更多</button>');
                }
                ;

                if (Math.ceil(total / count) <= page) {
                    flag = false;
                    $("#comment_items").siblings(".layui-btn-fluid").text("没有更多了");
                }
                page++;
            }
        }
    });
    blogObj.rightFixde();
}

/*加载更多子评论*/
blogObj.loadSubComment = function (ele, commentid) {
    var url = url ? url : "/subcomment/blog/";
    var subpage = parseInt(ele.attr("data-count"));
    //var subflag = parseInt(ele.attr("data-subflag"));
    var blogid = $("input[name='hid']").val();
    var data = {
        blogid: blogid,
        mainid: commentid,
        page: subpage + 1

    };
    var num = 5; //每次加载的数量
    //if(!subflag){return;}
    $._ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        data: data,
        success: function (data) {
            if (data.code == 200) {
                var data = data.data;
                var items = data.items;
                if (!ele.parent().siblings(".more-comment-items").length) {
                    ele.parent().before('<div class="more-comment-items"></div>');
                }
                for (var i = 0; i < items.length; i++) {
                    var item = items[i];
                    ele.parent().siblings(".more-comment-items").append('' +
                        '<div class="sub-comment">' +
                        '<div class="color77 time-reply">' +
                        '<span class="time">' + item.createtime + '</span>' +
                        '<span class="reply-btn fr" onclick=blogObj.newComment($(this),"' + item.tousername + '")>回复</span>' +
                        '</div>' +
                        '<p><a href="/' + item.uid + '">' + item.username + '</a>&nbsp;&nbsp;&nbsp;回复&nbsp;&nbsp;&nbsp;<a href="/' + item.touid + '">' + item.tousername + '</a>： <span class="content">' + item.content + '</span></p>' +
                        '</div>');
                }
                var countEle = ele.siblings(".sub-comment-count").children(".count");
                var countEleNum = parseInt(countEle.text());
                if ((countEleNum - num) > 0) {
                    countEle.text(countEleNum - num);
                } else {
                    countEle.parent().html("评论已到底");

                    ele.attr({
                        "onclick": "blogObj.takeup($(this))"
                    }).text("收起")
                }
                ;
            }
        }
    });
    blogObj.rightFixde();
}

/*收起子互动*/
blogObj.takeup = function (ele) {
    var eleText = ele.text()
    if (eleText == "展开") {
        ele.text("收起").siblings(".sub-comment-count").html("评论已到底").parent().siblings(".more-comment-items").css({
            "display": "block"
        })
    } else {
        ele.text("展开").siblings(".sub-comment-count").html("还有" + ele.parent().siblings(".more-comment-items").children(".sub-comment").length + "条评论").parent().siblings(".more-comment-items").css({
            "display": "none"
        })
    }
    blogObj.rightFixde();
}

/*发送主评论*/
blogObj.sendPComment = function (ele, url) {
    var textareaEle = ele.parents(".write-function-block").prev();
    //$(".preview-wrap").append("<div style='height: 200px;background-color: #f6fbff;'></div>")
    if (!textareaEle.val().trim()) {
        blogObj.alert('回复内容不能为空')
        textareaEle.addClass("bdc-f6");
        return;
    }
    data = {
        blogid: $("input[name='hid']").val(),
        content: textareaEle.val()
    }
    $._ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        data: data,
        success: function (data) {
            if (data.code == 200) {
                if(data.data.msg==1)
                {
                    blogObj.message('您好，因内容因敏感词进入待审核列表。<br/>联系QQ：1913400965');
                }else {
                    blogObj.alert('评论成功');
                    $(".all-comment").siblings(".colorbb").text(Number($(".all-comment").siblings(".colorbb").text()) + 1)
                    var id = 90; //返回的id
                    var user = blog.user.get();
                    //console.log(user);
                    var commentContent = $('<p class="comment-wrap"></p>').text(textareaEle.val());
                    var commentItem = $('<div class="comment-item">' +
                        '<div class="author">' +
                        '<a href="/' + user.userid + '" class="avatar">' +
                        '<img src="' + user.headimg + '" alt="">' +
                        '</a>' +
                        '<div class="info">' +
                        '<div class="name"><a href="/' + user.userid + '">' + user.username + '</a> <span class="fr reply-btn" onclick="blogObj.newComment($(this),\'' + user.username + '\')">回复</span></div>' +
                        '<div class="time colorbb">' + blogObj.getTime() + '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>').append(commentContent)
                    $("#comment_items").children().eq(0).before(commentItem);
                }
                textareaEle.val('');
                blogObj.cancelComment(textareaEle.next());
            } else {
                blogObj.alert(data.msg);
            }
        }
    });
    blogObj.rightFixde();
}

/*发送子评论*/
blogObj.sendSubComment = function (ele, tousername, pid) {
    var url = "/comment/add/";
    var textareaEle = ele.parents(".write-function-block").prev();
    var newComment = ele.parents(".new-comment");
    if (!textareaEle.val().trim()) {
        blogObj.alert('回复内容不能为空');
        textareaEle.addClass("bdc-f6");
        return;
    }
    data = {
        blogid: $("input[name='hid']").val(),
        pid: pid,
        content: textareaEle.val()
    }
    $._ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        data: data,
        success: function (data) {
            if (data.code == 200) {
                if(data.data.msg==1)
                {
                    blogObj.message('您好，因内容因敏感词进入待审核列表。<br/>联系QQ：1913400965');
                }else {
                    blogObj.alert('评论成功');
                    var user = blog.user.get();
                    var id = 90; //返回的id
                    var commentContent = $('<span class="content"></span>').text(textareaEle.val());
                    var commentContentWrap = $('<p><span>' + user.username + '</span>&nbsp;&nbsp;&nbsp;回复&nbsp;&nbsp;&nbsp;<span>' + tousername + '</span>：</p>').append(commentContent)
                    var html = $('<div class="sub-comment" data-id=' + id + '>' +
                        '<div class="color77 time-reply">' +
                        '<span class="time">' + blogObj.getTime() + '</span>' +
                        '<span class="reply-btn fr" onclick=blogObj.newComment($(this),"' + user.username + '")>回复</span>' +
                        '</div></div>').append(commentContentWrap);
                    var moreComItems = newComment.siblings(".more-comment-items");
                    var moreComment = newComment.siblings(".more-comment");
                    if (moreComment.length) { //是否有加载更多按钮
                        if (moreComItems.length) { //是否加载了更多子评论
                            if (!moreComItems.attr("style") || moreComItems.attr("style").indexOf("block") != -1) { //更多子评论显示
                                moreComItems.append(html);
                            } else {
                                moreComItems.before(html);
                            }
                        } else {
                            moreComment.before(html);
                        }
                    } else {
                        newComment.before(html);
                    }
                }
                textareaEle.val('');
                blogObj.cancelComment(newComment);
            } else {
                blogObj.alert(data.msg);
            }
        }
    });
    blogObj.rightFixde();
}






