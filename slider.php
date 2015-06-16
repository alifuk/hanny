<script type="text/javascript" src="./jssor/js/jquery-1.9.1.min.js"></script>
<!-- use jssor.slider.mini.js (40KB) instead for release -->
<!-- jssor.slider.mini.js = (jssor.js + jssor.slider.js) -->
<script type="text/javascript" src="./jssor/js/jssor.js"></script>
<script type="text/javascript" src="./jssor/js/jssor.slider.js"></script>
<script>

    jQuery(document).ready(function ($) {

        var _SlideshowTransitions = [
            //Fade in R
            {$Duration: 1200, x: -0.3, $During: {$Left: [0.3, 0.7]}, $Easing: {$Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear}, $Opacity: 2}
            //Fade out L
            , {$Duration: 1200, x: 0.3, $SlideOut: true, $Easing: {$Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear}, $Opacity: 2}
        ];



        var options = {
            $AutoPlay: true, //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
            $AutoPlaySteps: 2,
            $AutoPlayInterval: 3000,
            $SlideDuration: 800,
            $PauseOnHover: 1, //[Optional] Whether to pause when mouse over if a slideshow is auto playing, default value is false
            $FillMode: 2,
            $ArrowKeyNavigation: true, //Allows arrow key to navigate or not
            $SlideWidth: 600, //[Optional] Width of every slide in pixels, the default is width of 'slides' container
            $SlideHeight: 600, //[Optional] Height of every slide in pixels, the default is width of 'slides' container
            $SlideSpacing: 0, //Space between each slide in pixels
            $DisplayPieces: 4, //Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
            $ParkingPosition: 500, //The offset position to park slide (this options applys only when slideshow disabled).

            $ArrowNavigatorOptions: {//[Optional] Options to specify and enable arrow navigator or not
                $Class: $JssorArrowNavigator$, //[Requried] Class to create arrow navigator instance
                $ChanceToShow: 2, //[Required] 0 Never, 1 Mouse Over, 2 Always
                $AutoCenter: 2, //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
            }
        };

        var jssor_slider1 = new $JssorSlider$("slider1_container", options);

        //responsive code begin
        //you can remove responsive code if you don't want the slider scales while window resizes
        function ScaleSlider() {

            //var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
            var bodyWidth = document.body.clientWidth;
            if (bodyWidth)
                jssor_slider1.$ScaleWidth(Math.min(bodyWidth, 1920));
            else
                window.setTimeout(ScaleSlider, 30);
        }
        ScaleSlider();

        $(window).bind("load", ScaleSlider);
        $(window).bind("resize", ScaleSlider);
        $(window).bind("orientationchange", ScaleSlider);
        //responsive code end
    });
</script>
<!-- Jssor Slider Begin -->
<!-- To move inline styles to css file/block, please specify a class name for each element. --> 
<div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 2000px;
     height: 600px; overflow: hidden;">
    <!-- Slides Container -->
    <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 2000px; height: 600px;
         overflow: hidden;">


        <?php
        $dir = "./foto/zeny/";
        $files2 = scandir($dir, 1);


        foreach ($files2 as $fotka) {
            if ($fotka != "." && $fotka != "..") {
                echo "<div><img u='image' src='" . $dir . $fotka . "' style='width:200px; !impotant'/></div>";
            }
        }
        ?>


        <!--
        <div><img u="image" src="./jssor/img/photography/002.jpg" /></div>
        <div><img u="image" src="./jssor/img/photography/003.jpg" /></div>
        <div><img u="image" src="./jssor/img/photography/004.jpg" /></div>
        <div><img u="image" src="./jssor/img/photography/005.jpg" /></div>
        <div><img u="image" src="./jssor/img/photography/006.jpg" /></div>
        <div><img u="image" src="./jssor/img/photography/007.jpg" /></div>
        <div><img u="image" src="./jssor/img/photography/008.jpg" /></div>
        <div><img u="image" src="./jssor/img/photography/009.jpg" /></div>
        
        -->
    </div>

    <!--#region Arrow Navigator Skin Begin -->
    <!-- Help: http://www.jssor.com/development/slider-with-arrow-navigator-jquery.html -->
    <style>
        /* jssor slider arrow navigator skin 13 css */
        /*
        .jssora13l                  (normal)
        .jssora13r                  (normal)
        .jssora13l:hover            (normal mouseover)
        .jssora13r:hover            (normal mouseover)
        .jssora13l.jssora13ldn      (mousedown)
        .jssora13r.jssora13rdn      (mousedown)
        */
        .jssora13l, .jssora13r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 40px;
            height: 50px;
            cursor: pointer;
            background: url(./jssor/img/a13.png) no-repeat;
            overflow: hidden;
        }
        .jssora13l { background-position: -10px -35px; }
        .jssora13r { background-position: -70px -35px; }
        .jssora13l:hover { background-position: -130px -35px; }
        .jssora13r:hover { background-position: -190px -35px; }
        .jssora13l.jssora13ldn { background-position: -250px -35px; }
        .jssora13r.jssora13rdn { background-position: -310px -35px; }
    </style>
    <!-- Arrow Left -->
    <span u="arrowleft" class="jssora13l" style="top: 123px; left: 30px;">
    </span>
    <!-- Arrow Right -->
    <span u="arrowright" class="jssora13r" style="top: 123px; right: 30px;">
    </span>
    <!--#endregion Arrow Navigator Skin End -->
    <a style="display: none" href="http://www.jssor.com">Bootstrap Slider</a>
</div>
<!-- Jssor Slider End -->