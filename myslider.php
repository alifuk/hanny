<div class="slider">

    <div class="arrowsContainer">
        <div class="vCenter">
            <div class="arrowLeft"><img src="./img/left.png" class="imgArrowLeft"></div>
            <div class="arrowRight"><img src="./img/right.png" class="imgArrowRight"></div>
        </div>
    </div>

    <div class="myslider">

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

    <div class="whiteArea">

        <img src="" class="bigImg">


    </div>
</div>








<script>

    var moveStep = 800;
    var timerTime = 3000; //časovač v ms po kolika se slider automaticky pohne
    var canMove = true; //pokud je kurzor nad sliderem, tak se to nebude pohybovat
    var movesRight = true;
    $(document).ready(function () {
        nastavVysku();

        $(".whiteArea").hide();

        $(".arrowLeft").click(function () {
            move(moveStep);
        });

        $(".arrowRight").click(function () {
            move(-1 * moveStep);
        });

        $(".slider").hover(function () {
            canMove = false;
        }, function () {
            canMove = true;
        });




        timeruj();




    });

    $(window).resize(function () {
        nastavVysku();
    });

    function timeruj() {
        setTimeout(function () {
            if (canMove) {
                if (movesRight) {
                    move(-moveStep);
                } else {
                    move(moveStep);
                }
            }
            timeruj()
        }, timerTime);
    }

    function nastavVysku() {




        $(".myslider").height($(window).height() / 100 * 43);
        $(".fotka").height($(window).height() / 100 * 43);

        var sirka = 0; //šířka obrázků ve slideru
        $(".fotka").each(function () {
            sirka = sirka + $(this).width();
        });


        $(".arrowsContainer").width($(window).width());
        $(".arrowsContainer").height(0);


    }

    function move(smoveStep) {

        var sirka = 0; //šířka obrázků ve slideru
        $(".fotka").each(function () {
            sirka = sirka + $(this).width();
        });

        var imoveStep = parseInt(smoveStep); //o kolik se máme pohnout


        var vlevo = $(".myslider").css("left");
        var vlevoInt = parseInt(vlevo.substring(0, vlevo.length - 2)) + imoveStep;
        if (vlevoInt >= 0) {
            vlevoInt = 0;
            movesRight = true;
        }

        if (vlevoInt + sirka <= +$(window).width()) {
            vlevoInt = -sirka + $(window).width();
            movesRight = false;
        }

        $(".myslider").css("left", (vlevoInt + "px").toString());
    }

</script>