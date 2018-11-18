<?php
// ESTA SIN ACABAR 
class championship_EDIT_View{
	var $id;
	var $name;
	var $dateStart;
	var $dateInscriptions;

	function __construct($id, $nombre, $dateStart, $dateInscriptions){
		$this->id = $id;
		$this->nombre = $nombre;
		$this->dateStart = $dateStart;
		$this->dateInscriptions = $dateInscriptions;
		$this->render();
	}
	function render(){
		
	include '../View/Header.php';
	?>

	<div class="jumbotron">
		<div class="container">
			<h1><?php echo($strings['Editar campeonato']);?></h1>
		</div>
	</div>

	<form action="../Controller/Championship_Controller.php" method='post'> 

	<div id="añadir_horario" class="container">

		<div class="row">
			<div class="col-sm-3 nopadding">
				<div class="form-group">
				<label><?php echo($strings['Nombre de la encuesta']);?>:</label>
				<input required type="text" class="form-control" id="nombre" name="nombre" value='<?php echo ($this->nombre); ?>'>
				</div>
			</div>
		</div>

		<input type="text" name="id" hidden value="<?php echo $this->id ?>">

<?php
		
		for ($i=0; $i < sizeof($this->dia) ; $i++) { 
			
?>
			<div class="row<?php if($i>0) echo ("f".($i+101));?>"> 
<?php
			if ($i>0) echo ('<div class="row">');
?>
				<div class="col-sm-3 nopadding">
					<div class="form-group">
<?php
			if ($i==0) echo ('<label>' . $strings['Día'] . '</label>');
?>
					<input type="date" class="form-control" id="dia" name="dia[]" value="<?php echo ($this->dia[$i])?>">
					</div>
				</div>

				<div class="col-sm-3 nopadding">
					<div class="form-group">
<?php
			if ($i==0) echo ('<label>'. $strings['Hora inicio'] . '</label>');
?>
					<input type="time" class="form-control" id="h_inicio" name="h_inicio[]" value="<?php echo ($this->h_inicio[$i])?>">
					</div>
				</div>

				<div class="col-sm-3 nopadding">
					<div class="form-group">
<?php
			if ($i==0) echo ('<label>' . $strings['Hora fin'] . '</label>');
?>
					<input type="time" class="form-control" id="h_fin" name="h_fin[]" value="<?php echo ($this->h_fin[$i])?>">
					</div>
				</div>
<?php 
				if ($i == 0) {
?>
					<div class="col-sm-3 nopadding" id="fix-btn">
						<div class="form-group">
						<button id="search-input btn-left" class="btn btn-success" type="button"  onclick="add_fields();"> <?php echo($strings['Añadir horario']);?> </button>
						</div>
					</div>
<?php
				}else {
?>	
					<div class="input-group-btn"> 
					<button class="btn btn-danger" type="button" onclick="remove_fieldsf('<?php echo ($i+101);?>');"> <?php echo $strings['Eliminar']?> </button>
					</div>
				</div>
<?php		
				}
?>			
				
		</div>
		
<?php
		
		} 
?>

		</div>
		<div id="añadir_participantes" class="container">
<?php
		for ($i=-1; $i < sizeof($this->users) ; $i++) {		
?>
			<div class="row<?php if($i>-1) echo ("p".($i+102));?>"> 

<?php
			if ($i>-1) echo ('<div class="row">');
?>

				<div class="col-sm-3 nopadding">
					<div class="form-group">
					<?php
			if ($i==-1) echo ('<label>' . $strings['Participantes'] . '</label>');
?>
					<input <?php if($i==-1) echo ("readonly"); ?> type="text" placeholder="Login..." class="form-control" id="users" name="users[]" value="<?php if($i==-1) {echo ($this->user_logged);} else{ echo ($this->users[$i]);} ?>">
					</div>
				</div>

<?php 
				if ($i == -1) {
?>
					<div class="col-sm-3 nopadding" id="fix-btn">
						<div class="form-group">
						<button id="search-input btn-left" class="btn btn-success" type="button"  onclick="add_participants();"> <?php echo $strings['Añadir participante']?> </button>
						</div>
					</div>
<?php
				}else {
?>	
					<div class="input-group-btn"> 
					<button class="btn btn-danger" type="button" onclick="remove_fieldsp('<?php echo ($i+102);?> ');"> <?php echo $strings['Eliminar']?> </button>
					</div>
				</div>
<?php		
				}
				
?>			
		</div>

<?php		
	} 
?>
	</div>
</div>
		<div class="container">
			<button type="submit" name="action" value="EDIT" class="btn btn-default"><?php echo($strings['Enviar']);?></button>
		</div>

		</form>
<?php
		include '../View/Footer.php';
	}
}
?>