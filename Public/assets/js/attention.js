/**
 * Created by Administrator on 2016/12/16.
 */
var meDialog = {
    'getID': {
        'b': 'meButton' + (new Date()).valueOf(),
        'c': 'meContent' + (new Date()).valueOf(),
        'i': 'meDialog' + (123).valueOf(),
        'o': 'meOverlay' + (121).valueOf(),
        't': 'meTtile' + (new Date()).valueOf(),
        'ob': 'meOBtn' + (new Date()).valueOf(),
        'cb': 'meCBtn' + (new Date()).valueOf()
    },
    // 'button': {
    //     'ok': {
    //         'text': '确定',
    //         'handler': false
    //     },
    //     'cancel': {
    //         'text': '取消',
    //         'handler': false
    //     }
    // },
    'config': {
        'width': '100%',
        'height': 'auto',
        'timer': false,
        'autoClose': false,
        'title': false,
        'close': false,
        'button': false,
        'animate': 'fade',
        'content': 'Error...'
    },
    'custom': function(a) {
        var c = this.config;
        var r = Array;
        $.each(c, function(n) {
            r[n] = a && a[n] ? a[n] : c[n]
        });
        return r
    },
    'tips': function(a) {
        this.close();
        var config = this.custom(a);
        var id = this.getID;
        var content = "<div class=\"meContentBox\" id=\"" + id.c + "\">" + "<img style =\"width: 100%\" src=\"Public/images/hello.jpg\" >" + "</div>";
        if (config.title) {
            content = "<h3 id=\"" + id.t + "\">" + config.title + "</h3>" + content
        }
        if (config.button) {
            var button = '<button class="allButton" id="' + id.ob + '">' + this.button.ok.text + '</button>';
            if (config.button.ok || config.button.cancel) {
                var ok = '';
                var cancel = '';
                var oc = 'rightButton';
                var cc = 'leftButton';

                if (config.button.ok) {
                    oc = config.button.cancel ? oc : 'allButton';
                    ok = '<button class="' + oc + '" id="' + id.ob + '">' + config.button.ok.text + '</button>'
                }
                if (config.button.cancel) {
                    cc = config.button.ok ? cc : 'allButton';
                    cancel = '<button class="' + cc + '" id="' + id.cb + '">' + config.button.cancel.text + '</button>'
                }
                button = ok + cancel
            }
            content = content + "<div class=\"meButton\" id=\"" + id.b + "\">" + button + "</div>"
        }

        $("#" + id.i + " .meContent").html(content).css({
            'width': config.width,
            'height': config.height
        });
        $("#" + id.i).addClass("meShow");

        if ($("#" + id.ob)[0]) {
            $("#" + id.ob).bind('click', function() {
                if (config.button.ok && config.button.ok.handler) {
                    meDialog.trigger(config.button.ok.handler);
                } else {
                    meDialog.close();
                }
            })
        }

        if ($("#" + id.cb)[0]) {
            $("#" + id.cb).bind('click', function() {
                if (config.button.cancel && config.button.cancel.handler) {
                    meDialog.trigger(config.button.cancel.handler);
                } else {
                    meDialog.close();
                }
            })
        }

        $("#" + id.o).bind("click", function() {
            meDialog.close()
        });

        if (config.button) {
            $("#" + id.o).unbind("click");
        }

        if (config.autoClose && config.button === false) {
            this.config.timer = setInterval(this.close, config.autoClose)
        }
    },
    'close': function(a) {
    var id = meDialog.getID;
    $("#" + id.i).removeClass("meShow");
    clearInterval(meDialog.config.timer)
},
'trigger': function(a) {
    meDialog.close();
    return a.call();
},
'init': function(a) {
    var config = this.custom(a);
    var id = this.getID;
    if (!$("#" + id.i)[0]) {
        var html = "<div class=\"meDialog me-effect-" + config.animate + "\" id=\"" + id.i + "\"><div class=\"meContent\"></div></div><div class=\"meOverlay\" id=\"" + id.o + "\"></div>";
        $("body").prepend(html);
    }
}
};
meDialog.init({
    'animate': 'fade'
});