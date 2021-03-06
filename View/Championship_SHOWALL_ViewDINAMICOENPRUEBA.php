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
			<h1>VER TODAS LAS CAMPEONATOS</h1>
		</div>
	</div>



	<div class="container">

<?php
			if($_SESSION['type']="admin"){
				echo('<div class="row">');
				echo('<div class="col-md-12">');
				echo('<a class="btn btn-outline-success" id="search-input" href="../Controller/calendario_Controller.php?action=ADD" role="button">'.$strings['Crear campeonato'].'</a>');
				echo('</div>');
				echo('</div>');
			}
?>	
		<div class="row">
			<div class="col-md-12">
				<a class="btn btn-outline-success" id="search-input" href="../Controller/calendario_Controller.php?action=ADD" role="button"><?php echo $strings['Crear campeonato']?></a>
			</div>
		</div>
<?php
		
		foreach ($this->championships as $championship) {	
?>
		<div class="row section">
			<div class="col-md-10">
				<h2><?php echo $championship['name'] ?></h2>
			</div>
			<div class="col-md-2">
				<a class="btn btn-outline-success" href="../Controller/Championship_Controller.php?action=SHOWCURRENT&id=<?php echo $championship['id'] ?>"><?php echo $strings['Ver']?></a>
<?php
			
				echo('<a class="btn btn-outline-success" href="../Controller/Championship_Controller.php?action=EDIT&id=');
				echo($championship["id"]);
				echo('">' . $strings['Editar'] . '</a>');
			
?>			
			</div>
		</div>
<?php
		}
?>



	<?php
	 include '../View/Footer.php';		
	}	
}
	?>
