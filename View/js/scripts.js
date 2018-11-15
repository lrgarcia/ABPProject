var roomf = 1;
var roomp = 1;
function add_fields() {
 
    roomf++;
    var objTo = document.getElementById('añadir_horario')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "rowf"+roomf);
    var rdiv = 'row'+roomf;
    divtest.innerHTML = '<div class="row"> <div class="col-sm-3 nopadding"><div class="form-group"><input type="date" class="form-control" id="dia" name="dia[]" value=""></div></div><div class="col-sm-3 nopadding"><div class="form-group"><input type="time" class="form-control" id="h_inicio" name="h_inicio[]" value=""></div></div><div class="col-sm-3 nopadding"><div class="form-group"><input type="time" class="form-control" id="h_fin" name="h_fin[]" value=""></div></div><div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_fieldsf('+ roomf +');"> Eliminar </button></div></div></div></div></div>';
    
    objTo.appendChild(divtest)
}

function remove_fieldsf(rid) {
   $('.rowf'+rid).remove();
}

function add_participants() {
 
    roomp++;
    var objTo = document.getElementById('añadir_participantes')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "rowp"+roomp);
    var rdiv = 'row'+roomp;
    divtest.innerHTML = '<div class="row"> <div class="col-sm-3 nopadding"><div class="form-group"><input type="text" class="form-control" id="users" name="users[]" value=""></div></div><div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_fieldsp('+ roomp +');"> Eliminar </button></div></div></div></div></div>';
    
    objTo.appendChild(divtest)
}

function remove_fieldsp(rid) {
    $('.rowp'+rid).remove();
}

function add_roomf(){
    roomf++;
}

function add_roomp(){
    roomp++;

}