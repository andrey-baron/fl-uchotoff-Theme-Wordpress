$(function(){var e=[];$(".header__slider").bxSlider(),e[0]=$(".section-partner__slider").bxSlider({minSlides:1,maxSlides:4,slideWidth:360,slideMargin:10}),e[1]=$(".section_useful_articles__slider").bxSlider({minSlides:1,maxSlides:3,slideWidth:370,slideMargin:10}),$(".map-hover-point").each(function(e,i){var a=$(i),r=a.data("group-id"),s=".map-hover-point[data-group-id="+r+"]";a.hover(function(){$(s).addClass("active")},function(){$(s).removeClass("active")})}),$(".mask-hoer-png-icons").each(function(e,i){var a=$(i),r=a.data("icon-url"),s=$("<div>"),t=$("<img src='"+r+"'>");s.css({"-webkit-mask-image":"url("+r+")","mask-image":"url("+r+")","-webkit-mask-position":"center center","mask-position":"center center","-webkit-mask-repeat":"no-repeat","mask-repeat":"no-repeat","mask-size":"cover","-webkit-mask-size":"cover",width:"100%",height:"100%"}),a.append(s).append(t)})});