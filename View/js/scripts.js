var roomC = 1;
var roomp = 1;
function add_fields() {

if(roomC<=8){

    roomC++;
    var objTo = document.getElementById('addCategory');
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "rowC"+roomC);
    var rdiv = 'row'+roomC;
    
    divtest.innerHTML='<div class = "row"> <div class="col-sm-3 nopadding"> <div class="form-group"> <select required class="form-control" id="categoria[]" name="categoria[]"> <option>Masculino</option> <option>Femenino</option> <option>Mixto</option> </select> </div> </div> <div class="col-sm-3 nopadding"> <div class="form-group"> <select required class="form-control" id="modalidad[]" name="modalidad[]"> <option>1</option> <option>2</option> <option>3</option> </select> </div> </div> <div class="col-sm-3 nopadding"> <div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_fieldsC('+ roomC +');"> Eliminar </button> </div> </div> </div>';   
    objTo.appendChild(divtest);
    
}
}

function remove_fieldsC(rid) {
   $('.rowC'+rid).remove();
   roomC--;

}

function add_participants() {
 
    roomp++;
    var objTo = document.getElementById('añadir_participantes');
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "rowp"+roomp);
    var rdiv = 'row'+roomp;
    divtest.innerHTML = '<div class="row"> <div class="col-sm-3 nopadding"><div class="form-group"><input type="text" class="form-control" id="users" name="users[]" value=""></div></div><div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_fieldsp('+ roomp +');"> Eliminar </button></div></div></div></div></div>';
    
    objTo.appendChild(divtest)
}

function remove_fieldsp(rid) {
    $('.rowp'+rid).remove();
}

function add_roomC(){
    roomC++;
}

function add_roomp(){
    roomp++;

}

$(document).ready(function() {
    $("a[id^=deleteChampionship]").click(function(){
        let idChampionship = $(this).attr('id').replace('deleteChampionship','');
        $('#confirmDeleteChampionship').attr("id","confirmDeleteChampionship" + idChampionship);
        $('input[name=idChampionship]').attr("value",idChampionship);
    });

    if($('input[id=categoriasSelected]').length !== 0){
        var values= $('input[id=categoriasSelected]').val();

        $.each(values.split(","), function(i,e){
            $("#category option[value='" + e + "']").prop("selected", true);
        });
    }


});
