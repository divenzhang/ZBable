$(function () {
    H_modify = {};

    H_modify.openModify = function(){
        $('.modify-header').click(function(){
            var btn_id=$(this).attr("id");
            var td = $(this).parents('tr').children('td');
            var flag =td.eq(4).text();
            var num = flag%10;
            var sorts =(flag-flag%10)/10;
            //把表格的信息赋值到input
            $('#name').attr('value',td.eq(0).text());
            $('#briefing').attr('value',td.eq(1).text());
            $('#aurl').attr('value',td.eq(2).text());
            $('#imgurl').attr('value',td.eq(3).text());
            $("#sorts1 option[value='"+sorts+"']").attr('selected',true);
            $("#flag1 option[value='"+num+"']").attr('selected',true);


            $('#btn_id').attr('value',btn_id);
            $('.modify').show();
            $('.modify-bg').show();
        });
    };
    H_modify.closeModify = function(){
        $('.close-modify').click(function(){
            $("#sorts1").find("option:selected").attr('selected',false);
            $("#flag1").find("option:selected").attr('selected',false);
            $('.modify').hide();
            $('.modify-bg').hide();

        });
    };
    H_modify.run = function () {
        this.closeModify();
        this.openModify();
        // this.modifyForm();
    };
    H_modify.run();
});