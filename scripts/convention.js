function fillEntrForm(id){
//get parent div
var parentDiv = document.getElementById(id);
//select h3 and p elements
var nomEntr = parentDiv.getElementsByTagName("h3")[0].textContent;
var locEntr = parentDiv.getElementsByTagName("p")[0].textContent;
//put them in the form 
document.getElementById("add-entr-form").elements["nom-entr"].value = nomEntr;
document.getElementById("add-entr-form").elements["entr-loc"].value = locEntr;
}