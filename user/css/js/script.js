var menuIcon =  document.querySelector(".menu-icon");
var sidebar =  document.querySelector(".sidebar");
var container =  document.querySelector(".container");

menuIcon.onclick = function(){
    sidebar.classlist.toggle("small-sidebar");
    container.classlist.toggle("large-container");
}