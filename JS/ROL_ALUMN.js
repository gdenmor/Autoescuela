window.addEventListener("load",function(){

    const filas=this.document.getElementsByClassName("Examenes");

    for (let i=0;i<filas.length;i++){
        filas[i].addEventListener("click",function(){
            var idExamen=filas[i].textContent.trim();
            var idExamenes = idExamen.match(/\d+/);
            var idUser=document.getElementById("idUser").value;
            window.location.href = 'http://localhost/AUTOESCUELA/index.php?menu=examen&&examen='+idExamenes+"&&usuario="+idUser;
        })

    }

    const tabla=this.document.getElementsByClassName("fila");
    this.alert(tabla);

    for (let i=0;i<tabla.length;i++){
        var fila=tabla[i].getElementsByTagName("td");
        for (let j=0;j<fila.length;j++){
            fila[3].addEventListener("click",function(){
                var id=document.getElementsByClassName("idIntento")[i].value;
                var examen=fila[1].textContent;
                window.location.href='http://localhost/AUTOESCUELA/index.php?menu=visualizacion&id='+id+'&examen='+examen;
            })
        }
    }

    const dificultad=this.document.getElementsByClassName("dificultad")
    for (let i=0;i<dificultad.length;i++){
        dificultad[i].addEventListener("click",function(){
            var idUser=document.getElementById("idUser").value;
            var dif=dificultad[i].textContent;
            window.location.href = 'http://localhost/AUTOESCUELA/index.php?menu=practica&&usuario='+idUser+'&dificultad='+dif;
        })

    }



    
})