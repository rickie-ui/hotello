$(document).ready(function () {
    $("#booking").DataTable();
    $("#dashboard").DataTable();
    $("#check-in").flatpickr({
        minDate: "today",
        enableTime: true,
        minTime: "12:00",
        maxTime: "22:00",
    });
    $("#check-out").flatpickr({
        minDate: "today",
        enableTime: true,
        maxTime: "12:00",
    });

    let duration = document.getElementById("duration");

    setTimeout(() => {
        duration.style.cssText = `display: none;`;
    }, 3000);

    let success = document.getElementById("success");

    setTimeout(() => {
        success.style.cssText = `display: none;`;
    }, 3000);
    let profile = document.getElementById("profile");

    setTimeout(() => {
        profile.style.cssText = `display: none;`;
    }, 3000);
});
