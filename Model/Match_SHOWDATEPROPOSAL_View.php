<?php

require_once '../Model/ProposedMatch_Model.php';
require_once '../Model/ProposedMatch.php';
require_once '../Model/Promotion_Model.php';
require_once '../Model/Promotion.php';
class Match_SHOWDATEPROPOSAL_View{

    function __construct($group,$category,$championship,$match,$user,$proposedMatchsPairLogged,$proposedMatchsPair2){	
      $this->group = $group; 
        $this->category = $category;
        $this->championship = $championship;
        $this->match = $match; 
        $this->user = $user;
        $this->proposedMatchsPairLogged = $proposedMatchsPairLogged;
        $this->proposedMatchsPair2 = $proposedMatchsPair2;
 
		$this->render($group,$category,$championship,$match,$user,$proposedMatchsPairLogged,$proposedMatchsPair2);

	}

	function render($group,$category,$championship,$match,$user,$proposedMatchsPairLogged,$proposedMatchsPair2){
    include '../View/Header.php';
	?>

    <style type="text/css">

    </style>
<div class="jumbotron">
    <div class="container">
      <h1>Concretar fecha de enfrentamiento</h1>
    </div>
  </div>


  <table id="blueTable" class="table table-bordered">
  <thead>
    <tr>
      <th scope="col" id="noBorder"></th>

      <?php

      foreach ($proposedMatchsPairLogged as $proposedMatch) {
        echo "<th scope='col'>".$proposedMatch->getDate()." ".$proposedMatch->getHour()."</th>";
      }
      ?>
    </tr>
    
    </thead> 
    <tbody>
      <tr>
      <?php
      $firstValue=$proposedMatchsPairLogged[0];

      $col=1;
      echo "<th scope='row'>Pareja ".$firstValue->getIdProposedMatch()."</th>";

      foreach ($proposedMatchsPairLogged as $proposedMatch) {

        if($proposedMatch->getAvailable()=='NO DISPONIBLE'){
        echo "<td class='selectable' id='".$col."'></td>";
        $col++;
        }else if($proposedMatch->getAvailable()=='DISPONIBLE'){
          echo "<td class='selectable highlighted' id='".$col."'></td>";
         }
      }
      ?>

      </tr>
     
      

      <tr class="offline">
         <?php
      $firstValue=$proposedMatchsPair2[0];
      echo "<th scope='row'>Pareja".$firstValue->getIdProposedMatch()."</th>";

      foreach ($proposedMatchsPair2 as $proposedMatch) {
        echo "<td></td>";
      }
      ?>
      </tr>
    </tbody>
  </table>











<!-- 
	<table id="blueTable" class="table table-bordered">
  <thead>
    <tr>
      <th scope="col" id="noBorder"></th>
      <th scope="col">20/11 10:00</th>
      <th scope="col">20/11 12:00</th>
      <th scope="col">20/11 13:00</th>
      <th scope="col">21/11 10:00</th>
      <th scope="col">21/11 14:00</th>
      <th scope="col">22/11 10:00</th>
      <th scope="col">22/11 14:00</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Pareja 1</th>
      <td class="selectable"></td>
      <td class="selectable"></td>
      <td class="selectable"></td>
      <td class="selectable"></td>
      <td class="selectable"></td>
      <td class="selectable"></td>
      <td class="selectable"></td>
    </tr>
    <tr class="offline">
      <th scope="row">Pareja 2</th>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>

  </tbody>
</table> -->



<?php


echo '<a href="../Controller/Match_Controller.php?action=CONFIRMDATE&idMatch='.$match->idMatch.'" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Confirmar</a>';
?>


</div>
	
	<?php
	 include '../View/Footer.php';		
   ?>

       <script type="text/javascript" charset="utf-8">
       
          // Create table dragging functionality
          var isMouseDown = false;
          var highlighted
          $(".table-bordered td.selectable")
            .mousedown(function () {
              isMouseDown = true;
              highlighted = $(this).hasClass('highlighted')
              var childNodes =  $(this).childNodes;
              if ( highlighted ) {
                $(this).removeClass('highlighted')
                var idSelect=$(this).attr('id');
                 executeAjax($(this));

               // console.log(idSelect);
      

              } else {
                var idSelect=$(this).attr('id');
                 


                //console.log(idSelect);
      

                $(this).addClass('highlighted')
                executeAjax($(this));
             
      
              }
              return false; // prevent text selection
            })
 


          $(document)
              .mouseup(function () {
              isMouseDown = false
          })

         function executeAjax(element){
          var idSelect=element.attr('id');
         var table = document.getElementById("blueTable");
          console.log(idSelect);

          var idMatch= <?php echo $match->getIdMatch();?>;
          console.log(idMatch);

          pair = table.rows[1].cells[0].innerText;
          console.log(pair);
          splitPair=pair.split(" ");
          idPair=splitPair[1];
          console.log(idPair);

          date = table.rows[0].cells[idSelect].innerText;
          //console.log(date);

          splitDate=date.split(" ");
          onlyDate=splitDate[0];
          hour=splitDate[1];
          console.log("Fecha: "+onlyDate);
          console.log("Hoora: "+hour);
          isHighlighted= $(element).hasClass("highlighted");
          console.log(isHighlighted);

          if(isHighlighted){
            available='DISPONIBLE';
          }else{
            available='NO DISPONIBLE';
          }
            jQuery.ajax({
    type: "POST",
    url: 'Function_Controller.php',
    dataType: 'json',
    data: {functionname: 'setAvailable', arguments: [idMatch,idPair,onlyDate,hour,available]},

    success: function (obj, textstatus) {
                  if( !('error' in obj) ) {
                    console.log("modficiacion hecha");
                      
                  }
                  else {
                      console.log(obj.error);
                  }
            }
});




         }

        </script>
  

<?php		
}
}

	?>
