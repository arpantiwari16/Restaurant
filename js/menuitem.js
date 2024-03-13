$(document).ready(function () {
    $("#save").on("click", function () {
        if ($("#available").prop("checked") == true) {
            $("#available").val("yes");
        } else {
            $("#available").val("no");

        }
        var menu_id = $("#menu_id").val();
        var menuitem = $("#menuitem").val();
        var description = $("#description").val();
        var for_people = $("#forpeople").val();
        var rate = $("#rate").val();
        var available = $("#available").val();
        var img = $("#img").val();
        console.log(img);

        $.get("insertmenu.php?menu_id=" + menu_id + "&menuitem=" + menuitem + "&description=" +
            description + "&for_people=" + for_people + "&rate=" + rate +
            "&available=" + available + "&picture=" + "img",
            function (response) {
                console.log(response);
            });
    });

    $("#save_menu").on("click", function () {
        var category_id = $("#category_id").val();
        var menu_insert = $("#menu_insert").val();
        console.log(menu_insert);
        $.get("insertmenu1.php?cat_id=" + category_id + "&menu_i=" + menu_insert,
            function (response) {
                console.log(response);
            });
    });
    $("#new_category").on("click", function () {
        console.log("working");
        $("#cat_insert").css("display", "inline-block");
        $("#save_category").show();
    });

    $("#save_category").on("click", function () {
        var cat_i = $("#cat_insert").val();
        $.get("insertcategory.php?cat=" + cat_i, function (response) {
            console.log(response);
        });
    });
    $("#save").on("click", function () {
        if ($("#available").prop("checked") == true) {
            $("#available").val("yes");
        } else {
            $("#available").val("no");

        }
        var menu_id = $("#menu_id").val();
        var menuitem = $("#menuitem").val();
        var description = $("#description").val();
        var for_people = $("#forpeople").val();
        var rate = $("#rate").val();
        var available = $("#available").val();
        var img = $("#img").val();
        console.log(img);

        $.get("insertmenu.php?menu_id=" + menu_id + "&menuitem=" + menuitem + "&description=" +
            description + "&for_people=" + for_people + "&rate=" + rate +
            "&available=" + available + "&picture=" + "img",
            function (response) {
                console.log(response);
            });
    });

    $(".anc").on("click", function () {
        var id = $(this).attr("value");
        console.log(id);
    });

    $("#save_menu").on("click", function () {
        var category_id = $("#category_id").val();
        var menu_insert = $("#menu_insert").val();
        console.log(menu_insert);
        $.get("insertmenu1.php?cat_id=" + category_id + "&menu_i=" + menu_insert,
            function (response) {
                console.log(response);
            });
    });
    $("#new_category").on("click", function () {
        console.log("working");
        $("#cat_insert").css("display", "inline-block");
        $("#save_category").show();
    });

    $("#save_category").on("click", function () {
        var cat_i = $("#cat_insert").val();
        $.get("insertcategory.php?cat=" + cat_i, function (response) {
            console.log(response);
        });
    });
});