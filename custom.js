function changeColour(themeMode) {

  if (themeMode == "darkMode") {
      document.getElementById("body").style.backgroundColor = "black";
      document.getElementById("body").style.color = "white";
      document.getElementById("theme").innerHTML = "Light Theme";
  } else if (themeMode == "custom") {
      document.getElementById("body").style.backgroundColor = "";
      document.getElementById("body").style.color = "black";
      document.getElementById("theme").innerHTML = "custom";
  }
}
