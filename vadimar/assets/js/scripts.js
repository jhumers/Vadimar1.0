var licenceCar = $("#licenceCarH") 
var licenceMot = $("#licenceMotH")
var spanlicence = $("#span-licence")

if(localStorage.getItem("licence") === null){

}else{
    $("#span-licence").text(localStorage.getItem("licence"))
    document.getElementById("span-licence").setAttribute("value", localStorage.getItem("licence"));
}

function setlicenceCar(){
    $("#span-licence").text(licenceCar.text());
    localStorage.setItem("licence", $("#licenceCarH").text());
    document.getElementById("span-licence").removeAttribute("value");
    document.getElementById("span-licence").setAttribute("value", localStorage.getItem("licence"));
}

function setlicenceMot(){
    $("#span-licence").text(licenceMot.text());
    localStorage.setItem("licence", $("#licenceMotH").text());
    document.getElementById("span-licence").removeAttribute("value");
    document.getElementById("span-licence").setAttribute("value", localStorage.getItem("licence"));
}


