/* 02. Handle Sidebar - Menu
 ------------------------------------------------ */
var handleSidebarMenu = function() {
    "use strict";
    $('.sidebar .nav > .has-sub > a').click(function() {
        var target = $(this).next('.sub-menu');
        var otherMenu = '.sidebar .nav > li.has-sub > .sub-menu';

        if ($('.page-sidebar-minified').length === 0) {
            $(otherMenu).not(target).slideUp(250, function() {
                $(this).closest('li').removeClass('expand');
            });
            $(target).slideToggle(250, function() {
                var targetLi = $(this).closest('li');
                if ($(targetLi).hasClass('expand')) {
                    $(targetLi).removeClass('expand');
                } else {
                    $(targetLi).addClass('expand');
                }
            });
        }
    });
    $('.sidebar .nav > .has-sub .sub-menu li.has-sub > a').click(function() {
        if ($('.page-sidebar-minified').length === 0) {
            var target = $(this).next('.sub-menu');
            $(target).slideToggle(250);
        }
    });
};


/* 03. Handle Sidebar - Mobile View Toggle
 ------------------------------------------------ */
var handleMobileSidebarToggle = function() {
    var sidebarProgress = false;
    $('.sidebar').bind('click touchstart', function(e) {
        if ($(e.target).closest('.sidebar').length !== 0) {
            sidebarProgress = true;
        } else {
            sidebarProgress = false;
            e.stopPropagation();
        }
    });

    $(document).bind('click touchstart', function(e) {
        if ($(e.target).closest('.sidebar').length === 0) {
            sidebarProgress = false;
        }
        if (!e.isPropagationStopped() && sidebarProgress !== true) {
            if ($('#page-container').hasClass('page-sidebar-toggled')) {
                sidebarProgress = true;
                $('#page-container').removeClass('page-sidebar-toggled');
            }
            if ($(window).width() <= 767) {
                if ($('#page-container').hasClass('page-right-sidebar-toggled')) {
                    sidebarProgress = true;
                    $('#page-container').removeClass('page-right-sidebar-toggled');
                }
            }
        }
    });

    $('[data-click=right-sidebar-toggled]').click(function(e) {
        e.stopPropagation();
        var targetContainer = '#page-container';
        var targetClass = 'page-right-sidebar-collapsed';
        targetClass = ($(window).width() < 979) ? 'page-right-sidebar-toggled' : targetClass;
        if ($(targetContainer).hasClass(targetClass)) {
            $(targetContainer).removeClass(targetClass);
        } else if (sidebarProgress !== true) {
            $(targetContainer).addClass(targetClass);
        } else {
            sidebarProgress = false;
        }
        if ($(window).width() < 480) {
            $('#page-container').removeClass('page-sidebar-toggled');
        }
    });

    $('[data-click=sidebar-toggled]').click(function(e) {
        e.stopPropagation();
        var sidebarClass = 'page-sidebar-toggled';
        var targetContainer = '#page-container';

        if ($(targetContainer).hasClass(sidebarClass)) {
            $(targetContainer).removeClass(sidebarClass);
        } else if (sidebarProgress !== true) {
            $(targetContainer).addClass(sidebarClass);
        } else {
            sidebarProgress = false;
        }
        if ($(window).width() < 480) {
            $('#page-container').removeClass('page-right-sidebar-toggled');
        }
    });
};


/* 04. Handle Sidebar - Minify / Expand
 ------------------------------------------------ */
var handleSidebarMinify = function() {
    $('[data-click=sidebar-minify]').click(function(e) {
        e.preventDefault();
        var sidebarClass = 'page-sidebar-minified';
        var targetContainer = '#page-container';
        $('#sidebar [data-scrollbar="true"]').css('margin-top','0');
        $('#sidebar [data-scrollbar="true"]').removeAttr('data-init');
        $('#sidebar [data-scrollbar=true]').stop();
        if ($(targetContainer).hasClass(sidebarClass)) {
            $(targetContainer).removeClass(sidebarClass);
            if ($(targetContainer).hasClass('page-sidebar-fixed')) {
                if ($('#sidebar .slimScrollDiv').length !== 0) {
                    $('#sidebar [data-scrollbar="true"]').slimScroll({destroy: true});
                    $('#sidebar [data-scrollbar="true"]').removeAttr('style');
                }
                generateSlimScroll($('#sidebar [data-scrollbar="true"]'));
                $('#sidebar [data-scrollbar=true]').trigger('mouseover');
            } else if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                if ($('#sidebar .slimScrollDiv').length !== 0) {
                    $('#sidebar [data-scrollbar="true"]').slimScroll({destroy: true});
                    $('#sidebar [data-scrollbar="true"]').removeAttr('style');
                }
                generateSlimScroll($('#sidebar [data-scrollbar="true"]'));
            }
        } else {
            $(targetContainer).addClass(sidebarClass);

            if(!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                if ($(targetContainer).hasClass('page-sidebar-fixed')) {
                    $('#sidebar [data-scrollbar="true"]').slimScroll({destroy: true});
                    $('#sidebar [data-scrollbar="true"]').removeAttr('style');
                }
                $('#sidebar [data-scrollbar=true]').trigger('mouseover');
            } else {
                $('#sidebar [data-scrollbar="true"]').css('margin-top','0');
                $('#sidebar [data-scrollbar="true"]').css('overflow', 'visible');
            }
        }
        $(window).trigger('resize');
    });
};

/*
0.5 ------------Handles course selection
 */
var handleCourseSelection = function() {
    $("#level").on('change',function(){
        $.ajax({
            type: "GET",
            url: "courses/get_courses",
            data: { school_id: $('#school').val(), level_id: $(this).val() },
            dataType: 'html',
            success: function(data,status){
                console.log(status);
                $("#courses").html(data);
            }
        });
    });
};

/*
0.6 -------- handle select all
 */
var handleSelectall = function() {
    $("#selectall").change(function () {
        $(".checkbox1").prop('checked', $(this).prop("checked"));
    });
};


    /*-
    ====================================
     */
var App = function(){
    "use strict";

    return {
        // main init
        init:function(){
            handleSidebarMenu();
            handleMobileSidebarToggle();
            handleSidebarMinify();
            handleCourseSelection();
            handleSelectall();
        },
    }
}();