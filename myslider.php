<div class="myslider">
    <div class="arrowsContainer">
        <div class="vCenter">
            <div class="arrowLeft"><img src="./img/left.png" class="imgArrowLeft"></div>
            <div class="arrowRight"><img src="./img/right.png" class="imgArrowRight"></div>
        </div>
    </div>
    <?php
    $dir = "./foto/zeny/";
    $files = scandir($dir, 1);

    $zindex = 10;
    foreach ($files as $fotka) {
        if ($fotka != "." && $fotka != "..") {
            echo "<div class='fotkaObal'><img  src='" . $dir . $fotka . "' class='fotka'/ style='z-index:" . $zindex . ";'></div>";
            if ($zindex % 2 == 0) {
                $zindex+= 3;
            } else {
                $zindex--;
            }
        }
    }
    ?>


</div>


<script>

    $(document).ready(function () {
        nastavVysku();

    });

    $(window).resize(function () {
        nastavVysku();
    });

    function nastavVysku() {




        $(".myslider").height($(window).height() / 100 * 43);
        $(".fotka").height($(window).height() / 100 * 43);

        var sirka = 0; //šířka obrázků ve slideru
        $(".fotka").each(function () {
            sirka = sirka + $(this).width();
        });


        console.log(sirka);



        $(".arrowsContainer").width($(window).width());

        $(".arrowLeft").height(50);

    }

</script>