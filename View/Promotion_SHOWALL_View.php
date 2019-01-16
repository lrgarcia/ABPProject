<?php

require_once '../Model/Game_Model.php';
require_once '../Model/Game.php';
require_once '../Model/Promotion_Model.php';
require_once '../Model/Promotion.php';
class Promotion_SHOWALL_View{

    function __construct($games){	
        $this->games = $games;
		$this->render();

	}

	function render(){
    include '../View/Header.php';
	?>

	<div class="jumbotron">
		<div class="container">
			<h1>VER TODOS LOS PARTIDOS PROMOCIONADOS</h1>
		</div>
	</div>
	<div class="container">

	
		<div class="row">
			<div class="col-md-12">
				<a class="btn btn-outline-success" id="search-input" href="../Controller/Promotion_Controller.php?action=ADD" role="button">Crear promocion</a>
			</div>
		</div>
<?php
		
?>
		 <div class="row">
            <table id="championships">
                <tr>
                    <th width="25%">Id</th>
                    <th width="25%">Fecha</th>
                    <th width="25%">Hora</th>
                    <th width="25%"></th>
                </tr>
                <?php foreach ($this->games as $game) { ?>
                <tr>
                    <td>
                       
                        <div><?php echo 'Identificador: '.$game->idGame ?></div>
                       
                    </td>
                    <td>
                       
                            <div><?php echo $game->date ?></div>
                            
                    </td>
                    <td>
                       
                            <div><?php echo $game->hour ?></div>
                            
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="groupbuttons">
                    
                            <a class="btn btn-outline-danger" id="deletePromotion<?php echo($game->idGame)?>" data-toggle="modal" data-target="#modalDelete">
                                Eliminar
                            </a>

                        </div>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>

        <form action="../Controller/Promotion_Controller.php" method='post'>
            <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalDeleteLabel">Eliminar promocion</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <span>¿Está seguro de eliminar la promocion?</span>
                        </div>
                        <div class="modal-footer">
                            <input  type="hidden" name="idPromotion" value="id" />
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" name="action" value="DELETE" class="btn btn-primary" id="confirmDeletePromotion">Eliminar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>



	
	<?php
	 include '../View/Footer.php';		
	}	
}
	?>
