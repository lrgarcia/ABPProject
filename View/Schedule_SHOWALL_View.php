<?php
class Schedule_SHOWALL_View{

    function __construct($championships){
        $this->championships = $championships;
        $this->render();
    }
    function render(){
        include '../View/Header.php';
        ?>

        <div class="jumbotron">
            <div class="container">
                <h1>Ver Horario Actividades</h1>
            </div>
        </div>


        <div class="container">

            <div class="row section">
                <div class="col-md-10">
                    <h2>HORARIO</h2>
                </div>
            </div>
            <div class="row">




            </div>

        </div>

        <?php
        include '../View/Footer.php';
    }
}
?>
