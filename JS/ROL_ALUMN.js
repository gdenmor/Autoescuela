window.addEventListener("load",function(){

    const filas=this.document.getElementsByClassName("Examenes");

    for (let i=0;i<filas.length;i++){
        filas[i].addEventListener("click",function(){
            var idExamen=filas[i].textContent.trim();
            var idExamenes = idExamen.match(/\d+/);
            var idUser=document.getElementById("idUser").value;
            alert(idUser);
            window.location.href = 'http://localhost/AUTOESCUELA/index.php?menu=examen&&examen='+idExamenes+"&&usuario="+idUser;
        })
    }

    
})