/*
if( !window.console ){
    window.console = {
        log: function(){}
    }
}
 * jsui
 * ====================================================
*/
jsui.bd = $('body');

if( $('.widget-nav').length>0){
    $('.widget-nav li').each(function(e){
        $(this).hover(function(){
            $(this).addClass('active').siblings().removeClass('active');
            $('.widget-navcontent .item:eq('+e+')').addClass('active').siblings().removeClass('active');
        })
    })
}

if( $('.carousel').length ){
    var el_carousel = $('.carousel');

    el_carousel.carousel({
        interval: 4000
    })
}
/* 
 * rollbar
 * ====================================================
*/
jsui.bd.append('\
    <div class="m-mask"></div>\
    <div class="rollbar"><ul><li><a href="javascript:(scrollTo());"><i class="fa fa-angle-up"></i></a><h6>去顶部<i></i></h6></li>\
    </ul></div>\
');

var _wid = $(window).width();
$(window).resize(function(event) {
    _wid = $(window).width();
});



var scroller = $('.rollbar');
var _fix = jsui.is_fix==2 ? true : false;
$(window).scroll(function() {
    var h = document.documentElement.scrollTop + document.body.scrollTop;

    if(_fix&& h > 21 && _wid > 720 ){
        jsui.bd.addClass('nav-fixed');
    }else{
        jsui.bd.removeClass('nav-fixed');
    }

    h > 200 ? scroller.fadeIn() : scroller.fadeOut();
})

/* 
 * sign
 * ====================================================
*/
if (_wid>720 && !jsui.bd.hasClass('logged-in')) {
    require(['signpop'], function(signpop) {
        signpop.init();
    })
}

/*二级导航下拉框
 *
 */
 	$(".site-navbar li ul").prev("a").each(function() {
		ls_href = $(this).html();
		$(this).html(ls_href + ' <i class="fa fa-angle-down"></i>');
	});

	
/*
 * 单页面标题框
*/
	$(".pagemenu li").each(function() {
		var a = $(".content h1.article-title").text();
		if ($(this).children("a").text() == a) {
			$(this).addClass("active");
		}
	});

	/*
	*搜索框
	*/
		$(".search-show").bind("click", function() {
		var a = $(".site-search");
		$(this).parent().toggleClass("active");
		$(this).find(".fa").toggleClass("fa-remove");
		a.toggleClass("active");
		if (a.hasClass("active")) {
			a.find("input").focus();
		}
	});
	
	
		/*$(".m-icon-nav").on("click", function() {
		if ($(this).hasClass("active")) {
			$(".site-navbar").css("display","none");
			$(this).removeClass("active");
			$("body").removeClass("m-nav-show");
			
		} else {
			$(".site-navbar").css("display","block");
			$("body").addClass("m-nav-show");
			$(".site-navbar").css("bottom", "0");
			$(this).addClass("active");
		}
	});*/
	

/* 
 * phone
 * ====================================================
*/

jsui.bd.append( $('.site-navbar').clone().attr('class', 'm-navbar') )

$('.m-icon-nav').on('click', function(){
	$(this).show()
    jsui.bd.addClass('m-nav-show')

    $('.m-mask').show()

    jsui.bd.removeClass('search-on')
    $('.search-show .fa').removeClass('fa-remove') 
})

$('.m-mask').on('click', function(){
    $(this).hide()
    jsui.bd.removeClass('m-nav-show')
})



/* 
 * single
 * ====================================================
*/

var fix = $('.widget_fix');
if (_wid>1024 && fix.length) {


side_high = fix.height();
side_top = fix.offset().top;
$(window).scroll(function () {
	var scrollTop = $(window).scrollTop();
	var a = $(".widget.widget_fix");
	var mh = $('.content').height();
//如果距离顶部的距离小于浏览器滚动的距离，则添加fixed属性。
if (side_top + side_high < scrollTop){
	 a.addClass("affix");
	 if(scrollTop + side_high > mh){
		a.css('top',mh-scrollTop-side_high+'px');	
	}else{
		a.css('top','0px');	
	}	
}
//否则清除fixed的css属性
else {a.removeClass("affix");
	  a.css("top","inherit");
	  };
});



}

/* 友情链接 favorite图标*/
$('.plinks a').each(function(){
    var imgSrc = "http://g.soz.im/"+$(this).attr('href')+'/cdn.ico?defaulticon=lightpng';
    $(this).prepend( '<img src="'+imgSrc+'">' );
})


/* 
 * phone
 * ====================================================
*/



/*
 * 表情
 */
	var m = $(".comment_face_btn");
	var n = $("#Face");
	n.hide();
	m.click(function() {
		n.slideToggle();
	});
	$("#Face a").bind({
		"click": function() {
			var a = $(this).attr("data-title");
				obj = $("#comment").get(0);
			if (document.selection) {
				obj.focus();
				var b = document.selection.createRange();
				b.text = a;
			} else {
				if (typeof obj.selectionStart === "number" && typeof obj.selectionEnd === "number") {
					obj.focus();
					var c = obj.selectionStart;
					var d = obj.selectionEnd;
					var e = obj.value;
					obj.value = e.substring(0, c) + a + e.substring(d, e.length)
				} else {
					obj.value += a;
				}
			}
		}
	});
	
/*
 * User用户
 */


if ($(".container-user").length > 0) {
	/*$("head").append("<link>");
	css = $("head").children(":last");
	css.attr({
		rel: "stylesheet",
		type: "text/css",
		href: "./content/templates/emlog_dux/style/user.css"
	});*/
	//var action1 = window.location.;


	$('.usermenu li').each(function() {
		var nr = $(".useridx").html()
		if($(this).hasClass("usermenu-" + nr)){
			$(this).addClass("active");
		}
	})
}


 
/* functions
 * ====================================================
 */
function scrollTo(name, add, speed) {
    if (!speed) speed = 300
    if (!name) {
        $('html,body').animate({
            scrollTop: 0
        }, speed)
    } else {
        if ($(name).length > 0) {
            $('html,body').animate({
                scrollTop: $(name).offset().top + (add || 0)
            }, speed)
        }
    }
}


function is_name(str) {
    return /.{2,12}$/.test(str)
}
function is_url(str) {
    return /^((http|https)\:\/\/)([a-z0-9-]{1,}.)?[a-z0-9-]{2,}.([a-z0-9-]{1,}.)?[a-z0-9]{2,}$/.test(str)
}
function is_qq(str) {
    return /^[1-9]\d{4,13}$/.test(str)
}
function is_mail(str) {
    return /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/.test(str)
}


$.fn.serializeObject = function(){
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};
function video_ok(){
    $('.article-content embed, .article-content video, .article-content iframe').each(function(){
        var w = $(this).attr('width'),
            h = $(this).attr('height')
        if( h ){
            $(this).css('height', $(this).width()/(w/h))
        }
    })
}
video_ok();
function strToDate(str, fmt) { //author: meizz   
    if( !fmt ) fmt = 'yyyy-MM-dd hh:mm:ss'
    str = new Date(str*1000)
    var o = {
        "M+": str.getMonth() + 1, //月份   
        "d+": str.getDate(), //日   
        "h+": str.getHours(), //小时   
        "m+": str.getMinutes(), //分   
        "s+": str.getSeconds(), //秒   
        "q+": Math.floor((str.getMonth() + 3) / 3), //季度   
        "S": str.getMilliseconds() //毫秒   
    };
    if (/(y+)/.test(fmt))
        fmt = fmt.replace(RegExp.$1, (str.getFullYear() + "").substr(4 - RegExp.$1.length));
    for (var k in o)
        if (new RegExp("(" + k + ")").test(fmt))
            fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
    return fmt;
}
 /** ToolTip.js **/
$(function() {
	$('a').not('.close_login_box').each(function(b) {
		if (this.title) {
			var c = this.title;
			var a = 30;
			$(this).mouseover(function(d) {
				this.title = "";
				$("body").append('<div id="tooltip">' + c + "</div>");
				$("#tooltip").css({
					left: (d.pageX + a) + "px",
					top: d.pageY + "px",
					opacity: "0.8"
				}).show(250)
			}).mouseout(function() {
				this.title = c;
				$("#tooltip").remove()
			}).mousemove(function(d) {
				$("#tooltip").css({
					left: (d.pageX + a) + "px",
					top: d.pageY + "px"
				})
			})
		}
	})
		$('span').not('.close_login_box').each(function(b) {
		if (this.title) {
			var c = this.title;
			var a = 30;
			$(this).mouseover(function(d) {
				this.title = "";
				$("body").append('<div id="tooltip">' + c + "</div>");
				$("#tooltip").css({
					left: (d.pageX + a) + "px",
					top: d.pageY + "px",
					opacity: "0.8"
				}).show(250)
			}).mouseout(function() {
				this.title = c;
				$("#tooltip").remove()
			}).mousemove(function(d) {
				$("#tooltip").css({
					left: (d.pageX + a) + "px",
					top: d.pageY + "px"
				})
			})
		}
	})
});
