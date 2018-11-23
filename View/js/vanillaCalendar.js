var vanillaCalendar = {

  month: document.querySelectorAll('[data-calendar-area="month"]')[0],
  next: document.querySelectorAll('[data-calendar-toggle="next"]')[0],
  previous: document.querySelectorAll('[data-calendar-toggle="previous"]')[0],
  label: document.querySelectorAll('[data-calendar-label="month"]')[0],
  activeDates: null,
  date: new Date(),
  todaysDate: new Date(),

  init: function (options) {
    this.options = options
    this.date.setDate(1)
    this.createMonth()
    this.createListeners()
  },

  createListeners: function () {
    var _this = this
    this.next.addEventListener('click', function () {
      _this.clearCalendar()
      var nextMonth = _this.date.getMonth() + 1
      _this.date.setMonth(nextMonth)
      _this.createMonth()
    })
    // Clears the calendar and shows the previous month
    this.previous.addEventListener('click', function () {
      _this.clearCalendar()
      var prevMonth = _this.date.getMonth() - 1
      _this.date.setMonth(prevMonth)
      _this.createMonth()
    })
  },

  createDay: function (num, day, year) {
    var newDay = document.createElement('div')
    var dateEl = document.createElement('span')
    dateEl.innerHTML = num
    newDay.className = 'vcal-date'
    newDay.setAttribute('data-calendar-date', this.date)

    // if it's the first day of the month
    if (num === 1) {
      if (day === 0) {
        newDay.style.marginLeft = (6 * 14.28) + '%'
      } else {
        newDay.style.marginLeft = ((day - 1) * 14.28) + '%'
      }
    }

    if (this.options.disablePastDays && this.date.getTime() <= this.todaysDate.getTime() - 1) {
      newDay.classList.add('vcal-date--disabled')
    } else {
      // Aqui mete cuando es seleccionable una fecha 
      newDay.classList.add('vcal-date--active')
      newDay.setAttribute('data-calendar-status', 'active')
    }

    if (this.date.toString() === this.todaysDate.toString()) {
      newDay.classList.add('vcal-date--today')
    }

    newDay.appendChild(dateEl)
    this.month.appendChild(newDay)
  },

  dateClicked: function () {
    var _this = this
    this.activeDates = document.querySelectorAll(
      '[data-calendar-status="active"]'
    )
    for (var i = 0; i < this.activeDates.length; i++) {
      this.activeDates[i].addEventListener('click', function (event) {
        var picked = document.querySelectorAll(
          '[data-calendar-label="picked"]'
        )[0]

        executeAjax(this.dataset.calendarDate)

        picked.innerHTML = this.dataset.calendarDate
        
        _this.removeActiveClass()
        this.classList.add('vcal-date--selected')
      })
    }
  },



  createMonth: function () {
    var currentMonth = this.date.getMonth()
    while (this.date.getMonth() === currentMonth) {
      this.createDay(
        this.date.getDate(),
        this.date.getDay(),
        this.date.getFullYear()
      )
      this.date.setDate(this.date.getDate() + 1)
    }
    // while loop trips over and day is at 30/31, bring it back
    this.date.setDate(1)
    this.date.setMonth(this.date.getMonth() - 1)

    this.label.innerHTML =
      this.monthsAsString(this.date.getMonth()) + ' ' + this.date.getFullYear()
    this.dateClicked()
  },

  monthsAsString: function (monthIndex) {
    return [
      'January',
      'Febuary',
      'March',
      'April',
      'May',
      'June',
      'July',
      'August',
      'September',
      'October',
      'November',
      'December'
    ][monthIndex]
  },

  clearCalendar: function () {
    vanillaCalendar.month.innerHTML = ''
  },

  removeActiveClass: function () {
    for (var i = 0; i < this.activeDates.length; i++) {
      this.activeDates[i].classList.remove('vcal-date--selected')
    }
  }


}





function executeAjax($date){

  var $splitted = $date.split(" ");
  var $dayWeek=$splitted[0];
  var $month=$splitted[1];
  var $day=$splitted[2];
  var $year=$splitted[3];
  var $arrayMonth=['Jan','Feb','Mar','Apr','May','Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
  var $numberMonth= $arrayMonth.indexOf($month)+1;

  jQuery.ajax({
    type: "POST",
    url: 'Function_Controller.php',
    dataType: 'json',
    data: {functionname: 'getFreeCourt', arguments: [$day,$numberMonth,$year]},

    success: function (obj, textstatus) {
                  if( !('error' in obj) ) {
                    var freeCourt = obj.result;
                      // console.log(freeCourt);
                      // alert(freeCourt);

                      generateModal(freeCourt);
                  }
                  else {
                      console.log(obj.error);
                  }
            }
});



}



function generateModal(freeCourt){
var court;
var i;
var hour=8;
var minutes=0;
var stringHour="";
var hourHTML=""
var dateHTML="";
var occuped=false;
 console.log(freeCourt['9:30']);

 

var html= '<div id = "myModal" class="modal fade">';
 html+='<div class="modal-dialog">';
 html+='<div class="modal-content">';
 html+= '<div class="modal-header">';
 html+= '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
    // html+= ' <h4 class="modal-title">'+$day+' '+$month+'</h4>';
 html+=  '</div>';
 html+=   '<div class="modal-body">';
   
 while(hour<22){

  if(minutes==60){
    minutes=0;
    hour++;
  }




  if(minutes==30){
    stringHour=hour+":"+minutes;
  }else{
  //En caso que lo minutos sean igual a 0, añado un 0 mas para que tenga dos digitos siempre
    stringHour=hour+":"+minutes+"0";

  }//Fin creacion de stringHour







//Comprueba en este if cuantas pistas tiene en una hora determinada, si no tiene niguna quiere decirque esta petada
  if(freeCourt[stringHour]!=null){
    occuped=false;
    html+='<div class="row section" style="background-color:#32CD32">';
  }else{
     html+='<div class="row section" style="background-color:red">';
     occuped=true;
  }  
    html+='<div class="col-md-8">';
    //En caso de que los minutos sean 30 no pasa nada
    if(minutes==30){
    html+='<a>Hora: '+hour+':'+minutes+'</a><br>'; 
   }else{
    //Pero si es igual a 0, añade un 0 mas en el string
    html+='<a>Hora: '+hour+':'+minutes+'0</a><br>'; 
   }
    html+='</div>';
   html+= '<div class="col-md-2">';


   // console.log(freeCourt["1:00"][0]['date']);
   // console.log(stringHour);
   var dateFinal=freeCourt["1:00"][0]['date'];
   var hourFinal=stringHour;
   hourHTML=hourFinal.replace(/:/g,"%3A");
   dateHTML=dateFinal.replace(/\//g,"%2F");
   console.log(hourHTML);
   console.log(dateHTML);



   console.log('<a class="btn btn-outline-success" href="../Controller/Reservation_Controller.php?action=ADD&hour="'+hourHTML+'"&date="'+dateHTML+'">Reservar</a>');

   if(!occuped){
   html+='<a class="btn btn-outline-success" href="../Controller/Reservation_Controller.php?action=ADD&hour='+hourHTML+'&date='+dateHTML+'">Reservar</a>';

   }


   

    html+='</div>';
    html+='</div>';

  hour++;
  minutes=minutes+30;
 }

    //  for (i=0; i<freeCourt.length;i++) {
    //   html+='<div class="row section">';
    //   html+='<div class="col-md-10">';
     
   
    //   console.log("dentro del for"+freeCourt[i]['hour']);
    //   html+='<a>Hora Libre: '+freeCourt[i]['hour']+'                         </a><br>'; 
    //   html+='<a>Numero de pista: '+freeCourt[i]['numberCourt']+'                </a><br>'; 
    //   html+='</div>'
    //   html+='</div>' 
    // }







   // Meter aqui las weas
   html+=   '</div>';
   html+=  '<div class="modal-footer">';
   html+=  '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
   html+=    '<button type="button" class="btn btn-primary">Save changes</button>';
   html+=   '</div>';
   html+= '</div>';
   html+= '</div>';
  
html+= '</div>';

    $('body').append(html);
    $("#myModal").modal();
    $("#myModal").modal('show');

     $('#myModal').on('hidden.bs.modal', function (e) {
        $(this).remove();
    });
  // $('#myModal').modal('show');
}