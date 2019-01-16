<?php

class Promotion_ADD_view
{
    function __construct($games){
        $this->games = $games;
        $this->render();
    }
    function render(){
        
        include '../View/Header.php';
        ?>

	<div class="jumbotron">
		<div class="container">
			<h1> Añadir promocion </h1>
		</div>
	</div>

	<form action="../Controller/Promotion_Controller.php" method='post'> 



	<div id="game" class="container">

		<div class="row">
			<div class="col-sm-6 nopadding">
				<div class="form-group">
				<label>Partido:</label>
				<select required class="form-control" id="game" name="idGame">
					<?php 
					
					foreach ($this->games as $game)
					{
					    echo "<option value='".$game->getIdGame()."'>".$game->getIdGame()." - ".$game->getDate()." ".$game->getHour()."</option>"; 
					}
					
					
					?>
    			</select>
				</div>
			</div>
		</div>
			
		
			

			<input type="text" name="login_creator" hidden value="<?php echo $_SESSION['login'] ?>">
			






<!-- 		   <div class = "row">
            <div class="col-sm-3 nopadding">
                <div class="form-group">
                  
                    <select required class="form-control" id="categoria[]" name="categoria[]">
                    <option>Masculino</option>
                    <option>Femenino</option>
                    <option>Mixto</option>
                </select>
                </div>
            </div>

            <div class="col-sm-3 nopadding">
                <div class="form-group">
                    
                    <select required class="form-control" id="modalidad[]" name="modalidad[]">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                </select>
                </div>
            </div>
            <div class="col-sm-3 nopadding">

             <div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_fieldsC('+ roomC +');"> Eliminar </button>
            </div>
        </div>
          
        </div> -->





		</div>







	<div class="container">
		<button type="submit" name="action" value="ADD" class="btn btn-default"><?php echo($strings['Enviar']);?></button>
	</div>

	</form>

	<?php
	 include '../View/Footer.php';
		
	} 
}
?>