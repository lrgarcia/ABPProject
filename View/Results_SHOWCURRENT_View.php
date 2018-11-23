<?php
class Results_SHOWALL_View{

    function __construct($championships){
        $this->championships = $championships;
        $this->render();
    }
    function render(){
        include '../View/Header.php';
        ?>

        <div class="jumbotron">
            <div class="container">
                <h1>GESTIONAR RESULTADOS DE LOS CAMPEONATOS</h1>
            </div>
        </div>


        <div class="container">

            <div class="row section">
                <div class="col-md-10">
                    <h2>Gestion de Resultados de Campeonatos</h2>
                </div>
            </div>
            <div class="row">
                <table id="championships">
                    <tr>
                        <th width="25%">Match</th>
                        <th width="25%">Match</th>
                        <th width="25%">Fecha del Partido</th>
                        <th width="25%">Resultado</th>
                    </tr>
                    <?php foreach ($this->championships as $championship) { ?>
                        <tr>

                            <td>
                                <a href='../Controller/Results_Controller.php?action=SHOWCURRENT&id=<?php echo $championship->idChampionship ?>'>
                                    <div><?php echo $championship->name ?></div>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>

        </div>

        <?php
        include '../View/Footer.php';
    }
}
?>
