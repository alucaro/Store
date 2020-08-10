//the alert is collapsible yay
$(".alert").on("click", function() {
    $(this).hide("slow");
});

//apprearance
$("input.variation").on("click", function() {
    if ($(this).val() > 3) {
        $("body").css("background", "#111");
        $("footer").attr("class", "dark");
    } else {
        $("body").css("background", "#f9f9f9");
        $("footer").attr("class", "");
    }
});

//login works
$("#login").on("click", function() {
    $(".form-login .spinner__wrapper").css({
        opacity: 1,
        "z-index": 5
    });
});

//heart button works
$('a.comment__reaction__heart').on('click', function() {
    $(this).toggleClass('toggled');
    if ($(this).hasClass('toggled')) {
        $(this).find('span').html('26 hearts');
    } else {
        $(this).find('span').html('25 hearts');
    }
});

$('button.simbol_minus').on('click', function() {
    $(this).toggleClass('toggled');
    $value = document.getElementById("cantidad").value;
    if ($value >= 1) {
        $value = Number($value) - 1;
        document.getElementById("cantidad").value = $value;
    }
    $total = 25000 * $value;
    document.getElementById("total").value = $total;

});

$('button.simbol_plus').on('click', function() {
    $(this).toggleClass('toggled');
    $value = document.getElementById("cantidad").value;
    if ($value <= 100) {
        $value = Number($value) + 1;
        document.getElementById("cantidad").value = $value;
    }
    $total = 25000 * $value;
    document.getElementById("total").value = $total;

});