const date = new Date();
let minutes = date.getMinutes();
minutes = minutes <= 9 ? '0' + minutes : minutes;
document.getElementById("getTime").innerHTML = date.getHours() + ":" + minutes;