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
                            <a class="btn btn-outline-danger" href="#">
                                Eliminar
                            </a>
                        </div>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>

        
        
	<?php
	 include '../View/Footer.php';		
	}	
}
	?>
