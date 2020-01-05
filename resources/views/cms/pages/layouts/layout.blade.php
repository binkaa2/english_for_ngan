<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="3km">
    <meta name="author" content="STDIO HUE">
    <title>WEB ANH VAN</title>
    <base href="{{ asset('')}}">
    <!-- Favicon -->
    <link rel="icon" href="https://demos.creative-tim.com/argon-dashboard-pro/assets/img/brand/favicon.png"
        type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="cms-admin/css/css">
    <!-- Icons -->
    <link rel="stylesheet" href="cms-admin/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="cms-admin/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="cms-admin/css/argon.min.css" type="text/css">
    <link rel="stylesheet" href="cms-admin/css/sweetalert2.min.css" type="text/css">
    <link rel="stylesheet" href="cms-admin/css/animate.min.css" type="text/css">
    <link rel="stylesheet" href="cms-admin/css/dataTables.bootstrap4.min.css" type="text/css">
    <link rel="stylesheet" href="/css/base.css" type="text/css">
    <style type="text/css">
        /* Chart.js */
        @keyframes chartjs-render-animation {
            from {
                opacity: .99
            }

            to {
                opacity: 1
            }
        }

        .chartjs-render-monitor {
            animation: chartjs-render-animation 1ms
        }

        .chartjs-size-monitor,
        .chartjs-size-monitor-expand,
        .chartjs-size-monitor-shrink {
            position: absolute;
            direction: ltr;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
            pointer-events: none;
            visibility: hidden;
            z-index: -1
        }

        .chartjs-size-monitor-expand>div {
            position: absolute;
            width: 1000000px;
            height: 1000000px;
            left: 0;
            top: 0
        }

        .chartjs-size-monitor-shrink>div {
            position: absolute;
            width: 200%;
            height: 200%;
            left: 0;
            top: 0
        }

    </style>
</head>

<body class="g-sidenav-show g-sidenav-pinned">

   <!-- Topnav -->
   @include('cms.includes.navbar')
        <!-- Header -->
        <!-- Header -->
        @yield('content')
        @include('cms.includes.footer')

    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="cms-admin/js/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    
    <script src="cms-admin/js/bootstrap.bundle.min.js"></script>
    <script src="cms-admin/js/js.cookie.js"></script>
    <script src="cms-admin/js/jquery.scrollbar.min.js"></script>
    <script src="cms-admin/js/jquery-scrollLock.min.js"></script>
    <!-- Optional JS -->
    <script src="cms-admin/js/Chart.min.js"></script>
    <script src="cms-admin/js/list.min.js"></script>
    <script src="cms-admin/js/Chart.extension.js"></script>
    <script src="cms-admin/js/sweetalert2.min.js"></script>
    <script src="/js/base.js"></script>
    <script src="cms-admin/js/table2csv.min.js"></script>
    <!-- Argon JS -->
    <script src="cms-admin/js/bootstrap-datepicker.min.js"></script>
    <script src="cms-admin/js/argon.min.js"></script>
    
    
    <div class="backdrop d-xl-none" data-action="sidenav-unpin" data-target="undefined"></div>
    <div
        style="left: -1000px; overflow: scroll; position: absolute; top: -1000px; border: none; box-sizing: content-box; height: 200px; margin: 0px; padding: 0px; width: 200px;">
        <div style="border: none; box-sizing: content-box; height: 200px; margin: 0px; padding: 0px; width: 200px;">
        </div>
    </div>
    <script src="cms-admin/js/jquery.dataTables.min.js"></script>
    <script src="cms-admin/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="cms-admin/css/lightbox.css" type="text/css">
    <script src="cms-admin/js/lightbox.js"></script>
    <script src="cms-admin/js/dropzone.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">var scrolltotop={setting:{startline:100,scrollto:0,scrollduration:1e3,fadeduration:[500,100]},controlHTML:'<img src="https://i1155.photobucket.com/albums/p559/scrolltotop/arrow84.png" />',controlattrs:{offsetx:5,offsety:5},anchorkeyword:"#top",state:{isvisible:!1,shouldvisible:!1},scrollup:function(){this.cssfixedsupport||this.$control.css({opacity:0});var t=isNaN(this.setting.scrollto)?this.setting.scrollto:parseInt(this.setting.scrollto);t="string"==typeof t&&1==jQuery("#"+t).length?jQuery("#"+t).offset().top:0,this.$body.animate({scrollTop:t},this.setting.scrollduration)},keepfixed:function(){var t=jQuery(window),o=t.scrollLeft()+t.width()-this.$control.width()-this.controlattrs.offsetx,s=t.scrollTop()+t.height()-this.$control.height()-this.controlattrs.offsety;this.$control.css({left:o+"px",top:s+"px"})},togglecontrol:function(){var t=jQuery(window).scrollTop();this.cssfixedsupport||this.keepfixed(),this.state.shouldvisible=t>=this.setting.startline?!0:!1,this.state.shouldvisible&&!this.state.isvisible?(this.$control.stop().animate({opacity:1},this.setting.fadeduration[0]),this.state.isvisible=!0):0==this.state.shouldvisible&&this.state.isvisible&&(this.$control.stop().animate({opacity:0},this.setting.fadeduration[1]),this.state.isvisible=!1)},init:function(){jQuery(document).ready(function(t){var o=scrolltotop,s=document.all;o.cssfixedsupport=!s||s&&"CSS1Compat"==document.compatMode&&window.XMLHttpRequest,o.$body=t(window.opera?"CSS1Compat"==document.compatMode?"html":"body":"html,body"),o.$control=t('<div id="topcontrol">'+o.controlHTML+"</div>").css({position:o.cssfixedsupport?"fixed":"absolute",bottom:o.controlattrs.offsety,right:o.controlattrs.offsetx,opacity:0,cursor:"pointer"}).attr({title:"Scroll to Top"}).click(function(){return o.scrollup(),!1}).appendTo("body"),document.all&&!window.XMLHttpRequest&&""!=o.$control.text()&&o.$control.css({width:o.$control.width()}),o.togglecontrol(),t('a[href="'+o.anchorkeyword+'"]').click(function(){return o.scrollup(),!1}),t(window).bind("scroll resize",function(t){o.togglecontrol()})})}};scrolltotop.init();
    </script>


    @yield('script')
</body>

</html>
