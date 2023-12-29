$(document).ready(function () {
    // Add an event listener for when a collapse element is shown
    $('.collapse').on('shown.bs.collapse', function () {
        // Find the corresponding nav-link and add a class to apply block design
        var targetId = $(this).attr('id');
        $('.nav-link[data-bs-target="#' + targetId + '"]').addClass('active nav-link-custom');
    });

    // Add an event listener for when a collapse element is hidden
    $('.collapse').on('hidden.bs.collapse', function () {
        // Find the corresponding nav-link and remove the class
        var targetId = $(this).attr('id');
        $('.nav-link[data-bs-target="#' + targetId + '"]').removeClass('active nav-link-custom');
    });

    // Add an event listener for when a tabcontent is shown
    $('.tabcontent').on('shown.bs.tab', function () {
        // Find the corresponding nav-link and add the class
        var targetId = $(this).attr('id');
        $('.nav-link[data-bs-target="#' + targetId + '"]').addClass('active nav-link-custom');
    });

    // Add an event listener for when a tabcontent is hidden
    $('.tabcontent').on('hidden.bs.tab', function () {
        // Find the corresponding nav-link and remove the class
        var targetId = $(this).attr('id');
        $('.nav-link[data-bs-target="#' + targetId + '"]').removeClass('active nav-link-custom');
    });
});

function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("nav-link");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].classList.remove("active", "nav-link-custom");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.classList.add("active", "nav-link-custom");
}