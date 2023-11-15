window.addEventListener("load",function(){
    var idUser=this.document.getElementById("idUser").value;
    const link=this.document.getElementsByClassName("link1");

    this.alert(link);

    for (let i=0;i<link.length;i++){
        link[i].addEventListener("click",function(){
            window.location.href="http://localhost/AUTOESCUELA/index.php?menu=pila&idUser="+idUser;
        });
    }

})