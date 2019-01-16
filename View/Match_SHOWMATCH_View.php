<?php
class Match_SHOWMATCH_View{
    function __construct($championship){    
        $this->championship = $championship;
        $this->render($championship);
    }
    function render($championship){
    include '../View/Header.php';
    ?>

    <div class="jumbotron">
    <?php    
    echo "<h1>".$championship->name."</h1>";    
        
    ?>
    </div>
    <form action="../Controller/Inscription_Controller.php" method='post'> 
    
    <div class="container">
        <div class="row">
            <div class="col-sm-3 nopadding">
                <div class="form-group">
                    <label>Pareja1:</label>
                    <br>
                    <label>Usuario Capitan:</label>
                    <input required type="text" class="form-control" id="name" name="name" value="<?php echo $_SESSION['login'];?>" readonly>
                </div>
                <div class="form-group">
                    <label>Usuario2:</label>
                    <input required type="text" class="form-control" id="name2" name="name2" value="" readonly="">
                </div>
            </div>


            <div class="col-sm-3 nopadding">

                <div class="form-group">
                    <label>Pareja2:</label>
                    <br>
                    <label>Usuario Capitan:</label>
                    <input required type="text" class="form-control" id="name" name="name" value="<?php echo $_SESSION['login'];?>" readonly>
                </div>
                <div class="form-group">
                    <label>Usuario2:</label>
                    <input required type="text" class="form-control" id="name2" name="name2" value="" readonly>
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
