/**
 * Created by Administrator on 2016/12/19.
 */
//浮动层定位设置插件
jQuery.fn.selectCity = function(targetId) {
    var _seft = this;
    var targetId = $(targetId);
    this.click(function(){
        var A_top = $(this).offset().top + $(this).outerHeight(true);  //  1
        var A_left =  $(this).offset().left;
        // targetId.bgiframe();
        targetId.show().css({"position":"absolute","top":A_top+"px"});
        $('#meDialog123').addClass("meShow");
        $('#Search').css('z-index','1002');
    });
    targetId.find("#tag_Close").click(function(){
        targetId.hide();
        $('#meDialog123').removeClass("meShow");
        $('#Search').css('z-index','1');
    });
//    $(document).click(function(event){
//      if(event.target.id!=_seft.selector.substring(1)){
//        targetId.hide();
//      }
//    });
    targetId.click(function(e){
        e.stopPropagation(); //  2
    });
    return this;
};

//调用浮动层
$(function(){
    $("#selecttags").selectCity("#searchTag");
});