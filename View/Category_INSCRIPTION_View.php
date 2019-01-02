<?php
class Category_INSCRIPTION_View{
    function __construct($championship,$category){    

        $this->render($championship,$category);
    }
    function render($championship,$category){
    include '../View/Header.php';
    ?>

    <div class="jumbotron">
    <?php    
    echo "<h1>Inscribirse</h1>";    
        
    ?>
    </div>
    <form action="../Controller/Category_Controller.php" method='post'> 
    
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <button type="submit" name="action" value="INSCRIPTION" class="btn btn-success">Inscribirse</button>
            </div>
            <div class="col-sm-3 nopadding">
                <div class="form-group">
                    <label>Usuario Capitan:</label>
                    <input required type="text" class="form-control" id="name" name="name" value="<?php echo $_SESSION['login'];?>" readonly>
                </div>
                <div class="form-group">
                    <label>Usuario2:</label>
                    <input required type="text" class="form-control" id="name2" name="name2" value="">
                </div>
            </div>
        <?php
        echo '<input type="text" name="idChampionship" hidden value="'.$championship->idChampionship.'">';
        echo '<input type="text" name="idCategory" hidden value="'.$category->idCategory.'">';
        ?>
     
        <input type="text" name="login_creator" hidden value="<?php echo $_SESSION['login'] ?>">      
 
        </div>
      


    </div>
    </form>
        
    <?php
     include '../View/Footer.php';      
    }   
}
    ?>
