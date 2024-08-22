let date = new Date();

function renderCalendar() {
    date.setDate(1);

    const monthDays = document.getElementById('calendar-body');
    const month = document.getElementById('month');


    //creates a date object in order to hold the current date
    const lastDay = new Date(
        date.getFullYear(),
        date.getMonth() + 1,
        0
    ).getDate();
    //Defining, some key variables which include lastDay, which is the last day of the current month
    const prevLastDay = new Date(
        date.getFullYear(),
        date.getMonth(),
        0
    ).getDate();
    //prevLastDay is the last day of the previous month
    const firstDayIndex = date.getDay();
    //firstDayIndex is the day of the week that the current month starts on
    const lastDayIndex = new Date(
        date.getFullYear(),
        date.getMonth() + 1,
        0
    ).getDay();

    const nextDays = 7 - lastDayIndex - 1;
    //lastDayIndex is the last day of the week the month ends ends on
    const months = [
        'January',
        'February',
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
    ];

    month.innerText = `${months[date.getMonth()]} ${date.getFullYear()}`;





    let days = '';

    for (let x = firstDayIndex; x > 0; x--) {
        days += `<div class='prev-date'>${prevLastDay - x + 1}</div>`;
    }

    for (let i = 1; i <= lastDay; i++) {
        if (i === new Date().getDate() &&
            date.getMonth() === new Date().getMonth()) {
            days += '<div class='; today; '>${i}</div>';
        } else {
            days += `<div>${i}</div>`;
        }
    }

    for (let j = 1; j <= nextDays; j++) {
        days += `<div class='next-date'>${j}</div>`;
        monthDays.innerHTML = days;
    }

    document.getElementById('month-prev').addEventListener('click', () => {
        document.getElementById('calendar-body').classList.add('fade-out');
        setTimeout(() => {
            date.setMonth(date.getMonth() - 1);
            renderCalendar();
            document.getElementById('calendar-body').classList.remove('fade-out');
        }, 500);
    });

    document.getElementById('month-next').addEventListener('click', () => {
        document.getElementById('calendar-body').classList.add('fade-out');
        setTimeout(() => {
            date.setMonth(date.getMonth() + 1);
            renderCalendar();
            document.getElementById('calendar-body').classList.remove('fade-out');
        }, 500);
    });

    renderCalendar();

}

