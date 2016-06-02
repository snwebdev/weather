$("#getForecast").click(function (event) {
    event.preventDefault();

    if ($("#city").val() === "") {
        $("#fail").html("You need to give me a city!").fadeIn();
    } else {
        $.get("php/scraper.php?city=" + $("#city").val(), function (data) {

            if (data.length <= 1) {
                $("#fail").fadeIn();
                $("#success").hide();
            } else {
                $("#fail").hide();
                $("#success").html(data).fadeIn();
            }
        });
    }
});
