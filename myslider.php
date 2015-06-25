<div class="slider">

    <div class="arrowLeft"><img src="./img/left.png" class="imgArrowLeft"></div>
    <div class="arrowRight"><img src="./img/right.png" class="imgArrowRight"></div>


    <div class="myslider">
        <!-- <div class='fotkaObal'><img  src='" . $dir . $fotka . "' class='fotka'/ style='z-index:" . $zindex . ";'></div> -->



    </div>

    <div class="whiteArea">
        <div class="whiteAreaInner">
            <div style="display: table-cell; vertical-align: middle;/* height: 100%; *//* width: 100%; */position: relative;box-sizing: border-box;top: 0;left: 0;">
                <img src="./img/loading.gif" class="loading">
            </div>
        </div>


        <div class="whiteAreaInner innersobrazem">
            <img src="" class="bigImg">
        </div>




    </div>
</div>








<script>

<?php
$adresare = array(
    "./foto/zenysmall/",
    "./foto/aktsmall/",
    "./foto/muzismall/",
    "./foto/parysmall/",
    "./foto/produktysmall/",
    "./foto/retrosmall/",
    "./foto/rodinasmall/",
    "./foto/svatbysmall/",
    "./foto/tehotnesmall/",
);

/*
  foreach ($adresare as $adresar) {
  $files = scandir($adresar, 1);

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
  } */

echo "var fotky = [";
$prvniAdr = true;
foreach ($adresare as $adresar) {
    $files = scandir($adresar);
    $prvni = true;
    if (!$prvniAdr) {
        echo ",";
    } else {
        $prvniAdr = false;
    }
    echo "[";
    foreach ($files as $fotka) {
        if ($fotka != "." && $fotka != "..") {
            if (!$prvni) {
                echo ",";
            } else {
                $prvni = false;
            }
            echo "\"" . $adresar . $fotka . "\"";
        }
    }

    echo "]";
}

echo "];";
?>
    var moveStep = 800;
    var timerTime = 3000; //časovač v ms po kolika se slider automaticky pohne
    var canMove = true; //pokud je kurzor nad sliderem, tak se to nebude pohybovat
    var movesRight = true;
    var swiping = false;
    var aktualniGalerie = 0;
    $(document).ready(function () {


        nastavGalerii(0);
        nastavVysku();


        $(".whiteArea").fadeTo(400, 0, function () {
            $(".whiteArea").hide();

        });

        $(".arrowLeft").click(function () {
            move(moveStep);
        });

        $(".arrowRight").click(function () {
            move(-1 * moveStep);
        });


        $(function () {

            $(".slider").swipe({
                //Generic swipe handler for all directions
                swipe: function (event, direction, distance, duration, fingerCount, fingerData) {


                    if (direction == "right") {

                        swiping = true;
                        console.log("swiping true");
                        setTimeout(function () {
                            swiping = false;
                            console.log("swiping false");
                        }, 200);


                        if ($(".whiteArea").css("display") == "none") {
                            move(moveStep);
                        }
                        else {
                            fotodalsi(-1);
                        }

                    } else if (direction == "left") {

                        swiping = true;
                        console.log("swiping true");
                        setTimeout(function () {
                            swiping = false;
                            console.log("swiping false");
                        }, 200);


                        if ($(".whiteArea").css("display") == "none") {
                            move(-moveStep);
                        }
                        else {
                            fotodalsi(1);
                        }
                    }


                }
            });
        });




        $(".slider").hover(function () {
            canMove = false;
            console.log("canmove false");
        }, function () {
            canMove = true;
            console.log("canmove true");
        });


        $(document).on('click', '.fotka', function (event) {
            THIS = $(this);
            
            setTimeout(function () {

                if (!swiping) {
                    
                    
                    $(".whiteArea").show();
                    $(".whiteArea").fadeTo(400, 1);
                    canMove = false;

                    var fotka = new Image();
                    fotka.src = THIS.attr("src").replace("small", "big");

                    $(fotka).load(function () {

                        $(".bigImg").attr("src", THIS.attr("src").replace("small", "big"));
                        $(".bigImg").fadeTo(400, 1);

                    });
                }

            }, 50);





        });

        $(".whiteArea").click(function () {

            setTimeout(function () {
                console.log("clicknuto swiping" + swiping);

                if (!swiping) {
                    $(".bigImg").fadeTo(400, 0);
                    $(".whiteArea").fadeTo(400, 0, function () {
                        $(".whiteArea").hide();
                    });
                    canMove = true;
                }

            }, 50);




        });

        timeruj();




    });

    $(window).resize(function () {
        nastavVysku();
    });


    $(document).keydown(function (e) {
        switch (e.which) {
            case 37: // left
                if ($(".whiteArea").css("display") == "none") {
                    move(moveStep);
                }
                else {
                    fotodalsi(-1);
                }
                break;

            case 39: // right
                if ($(".whiteArea").css("display") == "none") {
                    move(-moveStep);
                }
                else {
                    fotodalsi(1);
                }
                break;


        }
        //e.preventDefault(); // prevent the default action (scroll / move caret)
    });

    function fotodalsi(dopredu) { //nastaví další fotku 
        //alert("ha");
        var aktualniSrc = $(".bigImg").attr("src").replace("big", "small");
        var i = fotky[aktualniGalerie].indexOf(aktualniSrc);
        console.log("puvodni" + i);
        var ni = i + dopredu; //index další fotky
        if (ni == fotky[aktualniGalerie].length) {
            ni = 0;
        }
        else if (ni == -1) {
            ni = fotky[aktualniGalerie].length - 1;
        }
        $(".bigImg").attr("src", fotky[aktualniGalerie][ni].replace("small", "big"));

        var ni = i + dopredu; //index další fotky
        if (ni == fotky[aktualniGalerie].length) {
            ni = 0;
        }
        else if (ni == -1) {
            ni = fotky[aktualniGalerie].length - 1;
        }
        var preload = new Image();
        preload.src = fotky[aktualniGalerie][ni].replace("small", "big");

    }







    function nastavGalerii(zvolenaKategorie) {
        aktualniGalerie = zvolenaKategorie;
        hideAll();
        setTimeout(function () {
            zmenKodGalerie(zvolenaKategorie);
        }, trvaniPrechodu);
    }

    function zmenKodGalerie(zvolenaKategorie) {
        var obsahSlideru = "";

        $(".myslider").css("left", ("0px").toString());
        for (index = 0; index < fotky[zvolenaKategorie].length; index++) {
            var zindex = index;
            if (index % 2 == 0) {
                zindex = index + 2;
            }
            obsahSlideru += "<div class='fotkaObal'><img  src='" + fotky[zvolenaKategorie][index] + "' class='fotka' style='z-index:" + zindex + ";'></div>";
        }


        $(".myslider").html(obsahSlideru);

        $(".slider").slideToggle(trvaniPrechodu);
        nastavVysku();

    }

    function timeruj() {
        setTimeout(function () {
            if (canMove) {
                if (movesRight) {
                    move(-moveStep);
                } else {
                    move(moveStep);
                }
            }
            timeruj();
        }, timerTime);
    }

    function nastavVysku() {
        $(".myslider").height($(window).height() / 100 * 43);
        $(".fotka").height($(window).height() / 100 * 43);
        
        
        $(".bigImg").css("max-height", ($(window).height() - 80 ) +"px") ;
        $(".bigImg").css("max-width", ($(window).width() - 80 ) +"px") ;
        

        var sirka = 0; //šířka obrázků ve slideru
        $(".fotka").each(function () {
            sirka = sirka + $(this).width();
        });

        $(".arrowLeft").css("top", $(".myslider").height() / 2 - 56 / 2);
        $(".arrowRight").css("top", $(".myslider").height() / 2 - 56 / 2);


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