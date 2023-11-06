window.addEventListener("load",function(){
    var cuerpo=this.document.getElementById("cuerpo");

    var filas=this.document.querySelectorAll("#cuerpo tr");

    for (let i=0;i<filas.length;i++){
                var datos=filas[i].getElementsByTagName("td");

                var aceptar = filas[i].getElementsByClassName("acepta")[0];


            
                aceptar.addEventListener("click",function(ev){
                    ev.preventDefault();
                    var indice=i;
                    datos=filas[i].getElementsByTagName("td");
                    var id = datos[0].textContent; // Supongo que el ID está en la primera celda
                    var usuario = datos[1].textContent; // Supongo que el nombre de usuario está en la segunda celda
                    var contrasena = datos[2].textContent;
                    var rol=datos[3].getElementsByTagName("select")[0];


                    var rolSeleccionado = rol.options[rol.selectedIndex].value;

                    var userData = {
                        id: id,
                        usuario: usuario,
                        contrasena: contrasena,
                        rol: rolSeleccionado
                    };


                    fetch("../FORMS/ADMIN_ROL.php",{
                        method: "POST",
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(userData)
                    }).then(x=>x.json()
                       
                        /*var p=document.createElement("p");
                        p.innerHTML=x.json();
                        document.body.appendChild(p);*/
                    )

                    .then(y=>{
                        alert(y);
                    })
                });
            }
        }
);