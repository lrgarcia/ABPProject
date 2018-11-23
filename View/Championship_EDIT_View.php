<?php
require_once '../Model/Category.php';
require_once '../Model/Category_Model.php';

class Championship_EDIT_View{
	var $id;
	var $name;
	var $dateStart;
	var $dateInscriptions;
    var $categorias;

	function __construct($id, $nombre, $dateStart, $dateInscriptions, $categorias){
		$this->id = $id;
		$this->nombre = $nombre;
		$this->dateStart = $dateStart;
		$this->dateInscriptions = $dateInscriptions;
        $this->categorias = $categorias;
		$this->render();
	}
	function render(){
		
	include '../View/Header.php';
	?>

        <div class="jumbotron">
            <div class="container">
                <h1>Editar campeonato</h1>
            </div>
        </div>

        <form action="../Controller/Championship_Controller.php" method='post'>
            <div id="addCategory" class="container">
                <div class="row">
                    <div class="col-sm-3 nopadding">
                        <div class="form-group">
                            <label>Nombre del campeonato:</label>
                            <input required type="text" class="form-control" id="name" name="name" value="<?php echo($this->nombre)?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 nopadding">
                        <div class="form-group">
                            <label>Fecha de inicio</label>
                            <input required type="date" class="form-control" id="dateStart" name="dateStart" value="<?php echo($this->dateStart)?>">
                        </div>
                    </div>
                    <div class="col-sm-3 nopadding">
                        <div class="form-group">
                            <label>Fecha de plazo</label>
                            <input required type="date" class="form-control" id="dateInscriptions" name="dateInscriptions" value="<?php echo($this->dateInscriptions)?>">
                        </div>
                    </div>
                    <div class="col-sm-6 nopadding">
                        <div class="form-group">
                            <label>Categoria:</label>
                            <select multiple required class="form-control" id="category" name="category[]" size=5>
                                <?php
                                $categoryModel = new Category_Model();
                                $categoryArray = $categoryModel->GETALL();

                                for($i=0; $i <count($categoryArray); $i++)
                                {
                                    echo "<option value='".$categoryArray[$i]->getIdCategory()."'>".$categoryArray[$i]->getCategory()." - Categoria ".$categoryArray[$i]->getModality()."</option>";
                                }
                                ?>
                            </select>
                            <input id="categoriasSelected" hidden value="<?php echo($this->categorias)?>">
                        </div>
                    </div>


                    <input type="text" name="idChampionship" hidden value="<?php echo $this->id ?>">
                    <input type="text" name="login_creator" hidden value="<?php echo $_SESSION['login'] ?>">
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