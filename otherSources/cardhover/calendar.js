document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay'
    },
    events: [
      {
        title: 'Event 1',
        start: '2023-07-01',
        end: '2023-07-03'
      },
      {
        title: 'Event 2',
        start: '2023-07-07',
        end: '2023-07-10'
      },
      // Add more events as needed
    ]
  });

  calendar.render();
});
