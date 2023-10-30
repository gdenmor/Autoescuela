window.addEventListener("load",function(){

    var elementosdesplegables=this.document.getElementsByClassName("elementos_desplegable")[0];
    var boton=this.document.getElementsByClassName("boton")[0].addEventListener("click",function(){
        if (elementosdesplegables.style.display === "block") {
            elementosdesplegables.style.display = "none";
        } else {
            elementosdesplegables.style.display = "block";
        }
    });
    var elementosdesplegablesrepetir=this.document.getElementsByClassName("elementos_desplegable")[1];
    var botonotro=this.document.getElementsByClassName("boton")[1].addEventListener("click",function(){
        if (elementosdesplegablesrepetir.style.display === "block") {
            elementosdesplegablesrepetir.style.display = "none";
        } else {
            elementosdesplegablesrepetir.style.display = "block";
        }
    });

    elementosdesplegables.style.display="none";
    elementosdesplegablesrepetir.style.display="none";

    var login=this.document.getElementById("click",function(){
        fetch("http://localhost/AUTOESCUELA/APIS/USUARIOSESSION.php")
            .then(x=>x.json())
            .then(y=>{
                alert(y.nombre);
            })
    })


})