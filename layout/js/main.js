$(document).ready(function () {
    /* Forms Buttons */
    $("#register-btn").on('click', function () {
        // console.log($("div.row.wrapper")[0]);
        $("div.row.wrapper")[0].style.display = "none";
        $("div.row.wrapper")[1].style.display = "flex";
    });
    $(".login-btn").on('click', function () {
        // console.log($("div.row.wrapper")[0]);
        $("div.row.wrapper")[0].style.display = "flex";
        $("div.row.wrapper")[1].style.display = "none";
    });
    $("#forget-pass").on('click', function () {
        // console.log($("div.row.wrapper")[0]);
        $("div.row.wrapper")[0].style.display = "none";
        $("div.row.wrapper")[1].style.display = "none";
        $("div.row.wrapper")[2].style.display = "flex";
    });
});