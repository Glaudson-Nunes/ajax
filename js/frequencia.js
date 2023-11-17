
function abrir_calendar() {

    $.ajax({
        url: "http://localhost/PRATICAAJAX/app/controller/frequenciaController.php",
        data: {
            s: "1",
            
        },
        type: 'POST',
        dataType: 'json',
        success: function (events) {	
            
            let eventos_para_listar = [];
            let cor = "";


            events.forEach((el)=>{


                if(el.houve_falta == true){

                  cor = 'red';

                }else if(el.houve_presenca){

                  cor = 'green';

                }else if(el.e_feriado){

                  cor = "blue";
                }

                eventos_para_listar.push({title: el.nome, start: el.data_atual, color: cor, display: "block" })

            })

            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
              headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
              },
              //initialDate: '2023-01-12',
              navLinks: true, // can click day/week names to navigate views
              selectable: true,
              selectMirror: true,
              initialView: 'multiMonthYear',
              locale: 'pt-br',
              themeSystem: 'bootstrap5',
              select: function(arg) {
                var title = prompt('Event Title:');
                if (title) {
                  calendar.addEvent({
                    title: title,
                    start: arg.start,
                    end: arg.end,
                    allDay: arg.allDay
                  })
                }
                calendar.unselect()
              },
              eventClick: function(arg) {
                if (confirm('Are you sure you want to delete this event?')) {
                  arg.event.remove()
                }
              },
              editable: true,
              dayMaxEvents: true, // allow "more" link when too many events
              events:eventos_para_listar
            });
        
            calendar.render();
            
        },
        error: function (e) {
            console.log("ERRO: "+ e);
        }
    });
}

abrir_calendar();