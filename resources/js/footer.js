document.addEventListener("DOMContentLoaded", function () {
  let footer = document.querySelector("footer");
  document.querySelector("main").setAttribute("style","--footer :"+footer.clientHeight+"px;");
})