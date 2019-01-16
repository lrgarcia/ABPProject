<?php
class Court_SHOWALL_View{
    
    function __construct($courts){
        $this->courts = $courts;
        $this->render();
        
    }
    
    function render(){
        include '../View/Header.php';
        ?>

	<style type="text/css">

    </style>
<div class="jumbotron">
		<div class="container">
			<h1>VER TODAS LAS PISTAS</h1>
		</div>
	</div>
	<div class="container">

	
		<div class="row">
			<div class="col-md-12">
				<a class="btn btn-outline-success" id="search-input" href="../Controller/Court_Controller.php?action=ADD" role="button">Crear pista</a>
			</div>
		</div>

		<div class="row section">
			<div class="col-md-10">
				<h2>Pistas</h2>
			</div>
        </div>

        <div class="row">
            <table id="championships">
                <tr>
                    <th width="50%">Pista</th>
                    <th width="50%"></th>
                </tr>
                <?php foreach ($this->courts as $court) { ?>
                <tr>
                    <td>
                        <div><?php echo "Pista ".$court->getNumber() ?></div>
                    </td>
                   
                    <td>
                        <div class="btn-group" role="group" aria-label="groupbuttons">
                            
                            <a class="btn btn-outline-danger" id="deleteCourt<?php echo($court->idCourt)?>" data-toggle="modal" data-target="#modalDelete">
                                Eliminar
                            </a>
                           

                        </div>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>

        <form action="../Controller/Court_Controller.php" method='post'>
            <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalDeleteLabel">Eliminar pista</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <span>Estas seguro de eliminar la pista?</span>
                        </div>
                        <div class="modal-footer">
                            <input  type="hidden" name="idCourt" value="id" />
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" name="action" value="DELETE" class="btn btn-primary" id="confirmDeleteCourt">Eliminar</button>
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