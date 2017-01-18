/**
 * Created by Administrator on 2017/1/4.
 */
function uploadFile(url, file_id, class_id) {
    var url = url;
    var file_id = file_id;
    var file_obj = $('#' + file_id);
    var class_obj = $('#' + class_id);
    var n = $('#' + file_id).next();
    console.log(url);
    console.log(file_id);
    console.log(file_obj);
    console.log('ddd' + class_obj);

    $.ajaxFileUpload({
        url: url,
        fileElementId: file_id,
        secureuri: false,
        dataType: 'json',
        data: {fid: file_obj.attr('name'), id: file_obj.attr('id')},
        type: 'post',
        success: function (data) {
            console.log('1111:'+data);
            n.val(data.url);
//                data.url = data.url + '?' + parseInt(Math.random()*10000);
            class_obj.attr('value', data.url);
            console.log(data.url);
        }
    })
}

jQuery(function ($) {
    $.extend({
        sub: function (obj) {
            obj = $(obj);
            console.log(obj);
            $.ajax({
                url: obj.attr('action'),
                type: 'post',
                data: obj.serialize(),
                success: function (data) {
                    console.log(data);
                    alert(data.msg);
                    window.location.reload();
                }
            });
            return false;
        }
    })


});

