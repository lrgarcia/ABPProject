<?php
class Clasifications_SHOWALL_View{

    function __construct($championships){
        $this->championships = $championships;
        $this->render();
    }
    function render(){
        include '../View/Header.php';
        ?>

        <div class="jumbotron">
            <div class="container">
                <h1>CONSULTA DE CLASIFICACIONES</h1>
            </div>
        </div>


        <div class="container">

            <div class="row section">
                <div class="col-md-10">
                    <h2>Consultar clasificaciones de campeonatos</h2>
                </div>
            </div>
            <div class="row">
                <table id="championships">
                    <tr>
                        <th width="100%">Campeonato a consultar</th>
                    </tr>
                    <?php foreach ($this->championships as $championship) { ?>
                        <tr>

                            <td>
                                <a href='../Controller/Clasification_Controller.php?action=SHOWCURRENT&id=<?php echo $championship->idChampionship ?>'>
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
