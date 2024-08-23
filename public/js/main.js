$("#example").DataTable();

(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($("#spinner").length > 0) {
                $("#spinner").removeClass("show");
            }
        }, 1);
    };
    spinner();

    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $(".back-to-top").fadeIn("slow");
        } else {
            $(".back-to-top").fadeOut("slow");
        }
    });
    $(".back-to-top").click(function () {
        $("html, body").animate({ scrollTop: 0 }, 1500, "easeInOutExpo");
        return false;
    });

    // Sidebar Toggler
    $(".sidebar-toggler").click(function () {
        $(".sidebar, .content").toggleClass("open");
        return false;
    });

    // Progress Bar
    $(".pg-bar").waypoint(
        function () {
            $(".progress .progress-bar").each(function () {
                $(this).css("width", $(this).attr("aria-valuenow") + "%");
            });
        },
        { offset: "80%" }
    );

    // Calender
    $("#calender").datetimepicker({
        inline: true,
        format: "L",
    });

    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        items: 1,
        dots: true,
        loop: true,
        nav: false,
    });

    // Pie Chart
    var ctx5 = $("#pie-chart").get(0).getContext("2d");
    var myChart5 = new Chart(ctx5, {
        type: "pie",
        data: {
            labels: ["Extreme", "High", "Medium", "Low"],
            datasets: [
                {
                    backgroundColor: [
                        "rgba(255,0,0,1)",
                        "rgba(255,128,0,1)",
                        "rgba(255,255,0,1)",
                        "rgba(0,255,64,1)",
                        "rgba(0, 156, 255, 1)",
                    ],
                    data: [5, 49, 44, 20, 0],
                },
            ],
        },
        options: {
            responsive: true,
        },
    });
    var ctx3 = $("#pie-chart3").get(0).getContext("2d");
    var myChart3 = new Chart(ctx3, {
        type: "pie",
        data: {
            labels: ["Extreme", "High", "Medium", "Low"],
            datasets: [
                {
                    backgroundColor: [
                        "rgba(255,0,0,1)",
                        "rgba(255,128,0,1)",
                        "rgba(255,255,0,1)",
                        "rgba(0,255,64,1)",
                        "rgba(0, 156, 255, 1)",
                    ],
                    data: [15, 49, 44, 20, 0],
                },
            ],
        },
        options: {
            responsive: true,
        },
    });
    var ctx2 = $("#pie-chart2").get(0).getContext("2d");
    var myChart2 = new Chart(ctx2, {
        type: "pie",
        data: {
            labels: ["Extreme", "High", "Medium", "Low"],
            datasets: [
                {
                    backgroundColor: [
                        "rgba(255,0,0,1)",
                        "rgba(255,128,0,1)",
                        "rgba(255,255,0,1)",
                        "rgba(0,255,64,1)",
                        "rgba(0, 156, 255, 1)",
                    ],
                    data: [5, 49, 44, 20, 0],
                },
            ],
        },
        options: {
            responsive: true,
        },
    });
    var ctx1 = $("#pie-chart1").get(0).getContext("2d");
    var myChart1 = new Chart(ctx1, {
        type: "pie",
        data: {
            labels: ["Extreme", "High", "Medium", "Low"],
            datasets: [
                {
                    backgroundColor: [
                        "rgba(255,0,0,1)",
                        "rgba(255,128,0,1)",
                        "rgba(255,255,0,1)",
                        "rgba(0,255,64,1)",
                        "rgba(0, 156, 255, 1)",
                    ],
                    data: [5, 49, 44, 20, 0],
                },
            ],
        },
        options: {
            responsive: true,
        },
    });
})(jQuery);
