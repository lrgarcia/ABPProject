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

        generateModal(this.dataset.calendarDate)

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






function executeModal($date){



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
                      freeCourt = obj.result;
                      // console.log(freeCourt);
                      // alert(freeCourt);

                      generateModal($freeCourt);
                  }
                  else {
                      console.log(obj.error);
                  }
            }
});


}

function generateModal($freeCourt){
console.log("Fuera de ajax"+$freeCourt);

var html= '<div id = "myModal" class="modal fade">';
 html+='<div class="modal-dialog">';
 html+='<div class="modal-content">';
 html+= '<div class="modal-header">';
 html+= '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
    // html+= ' <h4 class="modal-title">'+$day+' '+$month+'</h4>';
 html+=  '</div>';
 html+=   '<div class="modal-body">';
   
     // for ($court in $freeCourt) {
     //  console.log("dentro del for"+$freeCourt)
     //  html+='<a>'+$court+'</a>'; 
     //  }



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