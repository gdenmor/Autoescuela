window.addEventListener("load",function(){
    var idUser=this.document.getElementById("idUser").value;
    var link=this.document.getElementById("link1");
    link.addEventListener("click",function(){
        window.location.href="http://localhost/AUTOESCUELA/index.php?menu=pila&idUser="+idUser;
    });

})