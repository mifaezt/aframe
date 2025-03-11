import "./bootstrap";
import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";

document.addEventListener("DOMContentLoaded", function () {
    const calendarEl = document.getElementById("calendar");

    const calendar = new Calendar(calendarEl, {
        plugins: [dayGridPlugin, interactionPlugin],
        initialView: "dayGridMonth",
        events: "/bookings/events",
        dateClick: function (info) {
            const startDateInput = document.getElementById("start_date");
            const endDateInput = document.getElementById("end_date");

            if (!startDateInput.value) {
                startDateInput.value = info.dateStr;
            } else {
                endDateInput.value = info.dateStr;
            }
        },
    });

    calendar.render();
});
