
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Stagiu</title>
        <link rel="stylesheet" type="text/css" href="public/reset.css"/>
        <link rel="stylesheet" type="text/css" href="public/style.css"/>
    </head>
    <body>


        <div class="wrapper">
            <div class="line center bold">
                <h1>PHPentaStagiu 2018</h1>
                <h2>M01.03 <span class="fun"> The Fun One</span></h2>
                <h3>
                    <a href="https://docs.google.com/presentation/d/19YulX3DUaNkP9aT8-jX9g4mPdwY6-F-rt8BOv8xQ1VA/" target="_blank">M01.02</a>
                </h3>
            </div>
            <div class="line">
                <ol class="ml20">
                    <li>Generati un array de numere
                        <ul>
                            <li>cuprins intre <span class="bold">Numar de pornire</span> si <span class="bold">Numar de sfarsit</span> excluzand cele doua numere</li>
                            <li>numarul maxim de elemente este <span class="bold">Numar de elemente</span></li>
                        </ul>
                    </li>
                    <li>Afisati toate numerele multiplu de 3</li>
                    <li>Numar de numere multiplu de 4</li>
                    <li>Suma numerelor multiplu de 5</li>
                    <li class="error">* Campuri obligatorii</li>
                </ol>
            </div>
            <div class="line">
                <form method="POST" class="center">
                    <p class="label">Numar de pornire</p>
                    <input type="text" name="startPoint"/>
                    <span id="err1" class="error">*</span>

                    <p class="label">Numar de sfarsit</p>
                    <input type="text" name="endPoint"/>
                    <span id="err2" class="error">*</span>

                    <p class="label">Numar de elemente</p>
                    <input type="text" name="iterations"/>
                    <span id="err3" class="error">*</span>

                    <br/><br/>
                    <input type="submit"/>
                </form>
            </div>

            <div class="clear"></div>
        </div>
    </body>
</html>

<?php
//Preluam valorile in ele
$start = $end = $nr = "";

//Stocheza erori
$startErr = $endErr = $nrErr = "";

if(!$_POST) {
    exit();
}
else {
//Verificam inputul

    if (empty($_POST['startPoint'])) {
        $startErr = "Introduceti numarul de inceput";
        echo "<script>document.getElementById(\"err1\").textContent=\"".$startErr."\";</script>";
        exit();
    } else {
        if (is_numeric($_POST['startPoint'])) {
            $start = $_POST['startPoint'];

        } else {
            $startErr = "Introduceti doar cifre";
            echo "<script>document.getElementById(\"err1\").textContent=\"".$startErr."\";</script>";
            exit();
        }
    }

    if (empty($_POST['endPoint'])) {
        $endErr = "Introduceti numarul de sfarsit";
        echo "<script>document.getElementById(\"err2\").textContent=\"".$endErr."\";</script>";
        exit();
    } else {
        if (is_numeric($_POST['endPoint'])) {
            $end = $_POST['endPoint'];
        } else {
            $endErr = "Introduceti doar cifre";
            echo "<script>document.getElementById(\"err2\").textContent=\"".$endErr."\";</script>";
            exit();
        }
    }

    if (empty($_POST['iterations'])) {
        $nrErr = "Introduceti numarul de elemente";
        echo "<script>document.getElementById(\"err3\").textContent=\"".$nrErr."\";</script>";
        exit();
    } else {
        if (is_numeric($_POST['iterations'])) {
            $nr = $_POST['iterations'];
        } else {
            $nrErr = "Introduceti doar cifre";
            echo "<script>document.getElementById(\"err3\").textContent=\"".$nrErr."\";</script>";
            exit();
        }
    }

    if ($end <= $start) {
        $endErr = "Numarul de sfarsit mai mic decat nr. de start";
        echo "<script>document.getElementById(\"err2\").textContent=\"".$endErr."\";</script>";
        exit();
    }
    if ($nr > $end - $start + 1) {
        $nrErr = "Nu exista " . $nr . " elemente in interval";
        echo "<script>document.getElementById(\"err3\").textContent=\"".$nrErr."\";</script>";
        exit();
    }

    //Daca trecem de conditii rezolvam cerintele
    //Adaugam elementele corespunzatoare in array

    $elements = array();
    for( $x = $start+1; $x < $end; $x++ )
    {
        array_push($elements,$x);
        if( sizeof($elements) > $nr ){
            break;
        }
    }

//Verificam valorile din array

    $multiplu3 = "Multiple de 3:";
    $multiplu4 = 0;
    $multiplu5 = 0;
    foreach ( $elements as $value )
    {
        if ( $value % 3 ==0 )
        {
            $multiplu3 .= " ".$value;
        }
        if ( $value % 4 ==0 )
        {
            $multiplu4++;
        }
        if ( $value % 5 == 0 )
        {
            $multiplu5+=$value;
        }
    }
}
echo "<pre>";
print_r($_POST);
print_r("\n");
print_r('<p class=output>');
print_r($multiplu3. "\n");
print_r('Numere multiple de 4: '. $multiplu4. "\n");
print_r('Suma numerelor multiple de 5: '. $multiplu5. "\n");
print_r('</p>');


