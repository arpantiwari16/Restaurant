$(document).ready(function () {
    // $(".category-box").on("click", function () {
    //     $(".category-box").css("background-color", "lightblue");
    // })


    $("#all").click(function () {
        if ($("#all").prop("checked") == true)
            $(".cb1").prop("checked", true);
        else {
            $(".cb1").prop("checked", false);

        }
    });

    $("#model_save").click(function () {
        var c = $("#category1").val();
        // console.log(c);
        $.get("save_category.php?id=1&category=" + c, function (response) {
            console.log(response);
        });
    });
    $("#delete").click(function () {
        var checked = $(".cb1:checked").val();
        console.log($(".cb1:checked").val());
        $.get("save_category.php?id=3&cat=" + checked, function (response) {
            console.log(response);
        });
        $($(".cb1:checked")).closest("tr").remove();
    });
    $(".anc").click(function () {
        $("#category2").val($(this).attr("value"));
        $("#catid").val($(this).attr("id"));
    });

    $("#model_save1").click(function () {
        var c = $("#category2").val();
        var i = $("#catid").val();
        // console.log(c);
        $.get("save_category.php?id=2&category=" + c + "&cat_id=" + i, function (response) {
            console.log(response);
        });
    });



});