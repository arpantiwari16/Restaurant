function fn() {
    let a = new Date();
    let timeString = a.toLocaleTimeString(); // Get the time portion
    let dateString = a.toLocaleDateString(); // Get the time portion
    // $(".date").text(dateString);
    $(".time").text(timeString);

}
setInterval(fn, 1000);

function logout()
{
window.location.assign('login.php')

}

