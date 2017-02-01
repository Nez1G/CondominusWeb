function criarTextField(){
    var y = document.createElement("INPUT");
    y.setAttribute("type", "text");
    y.setAttribute("Placeholder", "Indroduza por favor de Imputação");
    y.setAttribute("class", "form-control");
    document.getElementById("myForm").appendChild(y);
   
    }

function resetField(){
document.getElementById('myForm').innerHTML = '';
}
