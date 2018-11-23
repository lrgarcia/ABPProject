<?php
class Championship_SHOWALL_View{

	function __construct($championships){	
		$this->championships = $championships;
		$this->render();

	}

	function render(){
    include '../View/Header.php';
	?>

	<div class="jumbotron">
		<div class="container">
			<h1>VER TODOS LOS CAMPEONATOS</h1>
		</div>
	</div>
	<div class="container">

	
		<div class="row">
			<div class="col-md-12">
				<a class="btn btn-outline-success" id="search-input" href="../Controller/Championship_Controller.php?action=ADD" role="button">Crear campeonato</a>
			</div>
		</div>

		<div class="row section">
			<div class="col-md-10">
				<h2>Campeonatos</h2>
			</div>
        </div>

        <div class="row">
            <table id="championships">
                <tr>
                    <th width="40%">Campeonato</th>
                    <th width="20%">Fecha de inicio</th>
                    <th width="20%">Fecha de inscripción</th>
                    <th width="20%"></th>
                </tr>
                <?php foreach ($this->championships as $championship) { ?>
                <tr>
                    <td>
                        <a href='../Controller/Championship_Controller.php?action=SHOWCURRENT&id=<?php echo $championship->idChampionship ?>'>
                        <div><?php echo $championship->name ?></div>
                        </a>
                    </td>
                    <td>
                        <a href='../Controller/Championship_Controller.php?action=SHOWCURRENT&id=<?php echo $championship->idChampionship ?>'>
                            <div><?php echo $championship->dateStart ?></div>
                        </a>
                    </td>
                    <td>
                        <a href='../Controller/Championship_Controller.php?action=SHOWCURRENT&id=<?php echo $championship->idChampionship ?>'>
                            <div><?php echo $championship->dateInscriptions ?></div>
                        </a>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="groupbuttons">
                            <a class="btn btn-outline-success" href='../Controller/Championship_Controller.php?action=EDIT&id=<?php echo $championship->idChampionship ?>'>
                                Editar
                            </a>
                            <a class="btn btn-outline-danger" id="deleteChampionship<?php echo($championship->idChampionship)?>" data-toggle="modal" data-target="#modalDelete">
                                Eliminar
                            </a>
                           <a class="btn btn-outline-info" href="../Controller/Championship_Controller.php?action=GENERATECHAMP&idChampionship=<?php echo $championship->getIdChampionship()?>">
                          		Generar
                           </a>
                                
                        </div>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>

        <form action="../Controller/Championship_Controller.php" method='post'>
            <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalDeleteLabel">Eliminar campeonato</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <span>¿Está seguro de eliminar el campeonato?</span>
                        </div>
                        <div class="modal-footer">
                            <input  type="hidden" name="idChampionship" value="id" />
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" name="action" value="DELETE" class="btn btn-primary" id="confirmDeleteChampionship">Eliminar</button>
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
