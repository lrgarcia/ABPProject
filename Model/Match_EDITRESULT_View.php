<?php
class Match_EDITRESULT_View{
    function __construct($idGroup,$idPair1,$idPair2){    
        
        $this->render($idGroup,$idPair1,$idPair2);
    }
    function render($idGroup,$idPair1,$idPair2){
    include '../View/Header.php';
    ?>

    <div class="jumbotron">
    <?php    
    echo "<h1>Añadir resultados</h1>";    
        
    ?>
    </div>
    <form action="../Controller/Match_Controller.php" method='post'> 
    
    <div class="container">
        <div class="row">
            <div class="col-sm-3 nopadding">
                <label>Primer set</label>
                <br>
                <div class="form-group">
                    <label>Resultado pareja 1</label>
                    <input required type="text" class="form-control" id="set1Pareja1" name="set1Pareja1" >
                </div>
                <div class="form-group">
                    <label>Resultado pareja 2</label>
                    <input required type="text" class="form-control" id="set1Pareja2" name="set1Pareja2">
                </div>
            </div>


            <div class="col-sm-3 nopadding">
                <label>Segundo set</label>
                <br>
                <div class="form-group">
                    <label>Resultado pareja 1</label>
                    <input required type="text" class="form-control" id="set2Pareja1" name="set2Pareja1" >
                </div>
                <div class="form-group">
                    <label>Resultado pareja 2</label>
                    <input required type="text" class="form-control" id="set2Pareja2" name="set2Pareja2">
                </div>
            </div>



            <div class="col-sm-3 nopadding">
                <label>Tercer set</label>
                <br>
                <div class="form-group">
                    <label>Resultado pareja 1</label>
                    <input required type="text" class="form-control" id="set3Pareja1" name="set3Pareja1" >
                </div>
                <div class="form-group">
                    <label>Resultado pareja 2</label>
                    <input required type="text" class="form-control" id="set3Pareja2" name="set3Pareja2">
                </div>
            </div>



        </div>
        <input type="text" name="idGroup" hidden value="<?php echo $idGroup ?>">
        <input type="text" name="idPair1" hidden value="<?php echo $idPair1 ?>">
        <input type="text" name="idPair2" hidden value="<?php echo $idPair2 ?>">




    
  
       
     
    </div>

    <button type="submit" name="action" value="EDITRESULT" class="btn btn-default">Añadir</button>
    </form>
        
    <?php
     include '../View/Footer.php';      
    }   
}
    ?>
