import $ from 'jquery';
import VanillaCalendar from 'vanilla-calendar-pro';
import 'vanilla-calendar-pro/build/vanilla-calendar.min.css';

// Wrap the code inside a function
function initializeCalendar() {
  if (!$('#calendar').length) {
    return;
  }

  const options = {
    type: 'multiple',
    months: 2,
    jumpMonths: 2,
    settings: {
      range: {
        disablePast: true,
      },
      selection: {
        day: 'multiple-ranged',
      },
      visibility: {
        daysOutside: false,
      },
    },
  };

  const calendar = new VanillaCalendar('#calendar', {
    actions: {
      clickDay(e, self) {
        let selectedDates = self.selectedDates;

        let startDate = '';
        let endDate = '';

        if (selectedDates.length > 1) {
          endDate = selectedDates[selectedDates.length - 1];
          startDate = selectedDates[0];
        }

        $('#start_date').val(startDate);
        $('#end_date').val(endDate);
      },
    },
    ...options
  });

  calendar.init();
}

// Call the function to initialize the calendar
initializeCalendar();
