window.addEventListener("load",function(){
    const preguntas=[];
    const filas=this.document.querySelectorAll("#tablapreg tr");
    var params=new URLSearchParams(this.window.location.search);
    var idUser=params.get("idUser");
    var fecha=new Date();
    var string=fecha.getFullYear()+"-"+fecha.getMonth()+"-"+fecha.getDate()+" "+fecha.getHours()+":"+fecha.getMinutes()+":"+fecha.getSeconds();
    const id=this.document.getElementsByClassName("ids");
    const idus=this.document.getElementsByClassName("idus");
    var examen={};
    for (let i=1;i<filas.length;i++){
        const datos=filas[i].getElementsByTagName("td");
        var pregunta;
        for (let j=0;j<datos.length;j++){
            if (j==11){
                const input=datos[j].firstElementChild;
                console.log(input);
                input.addEventListener("change",function(){
                    if (input.checked==true){
                        pregunta={
                            enunciado: datos[0].textContent,
                            rep1: datos[1].textContent,
                            rep2: datos[2].textContent,
                            rep3: datos[3].textContent,
                            correcta: datos[4].textContent,
                            categoria: {
                                idCategoria: datos[5].textContent,
                                nombre: datos[6].textContent
                            },
                            dificultad:{
                                idDificultad: datos[7].textContent,
                                nombre: datos[8].textContent
                            },
                            url: datos[9].textContent,
                            tipo: datos[10].textContent,
                            id: id[i].value
                        }
                        preguntas.push(pregunta);
                    }
                });
            }
            
        }
    }

    const filasus=this.document.querySelectorAll("#tablaus tr")
    const users=[];
    for (let i=1;i<filasus.length;i++){
        const datosi=filasus[i].getElementsByTagName("td");
        var pregunta;
        for (let j=0;j<datosi.length;j++){
            if (j==1){
                const input=datosi[j].firstElementChild;
                console.log(input);
                input.addEventListener("change",function(){
                    if (input.checked==true){
                        usuario={
                            id: idus[i].value,
                            username: datosi[0].textContent
                        }

                        users.push(usuario);
                    }
                });
            }
            
        }
    }

    

    var pila=this.document.getElementById("pila").addEventListener("click",function(){
        examen={
            usuarios: users,
            fecha: string,
            preguntass: preguntas
        }
        fetch("../Autoescuela/APIS/PREGUNTA_EXAMENAPI.php",{
            method: "POST",
            headers:{
                "Content-type": "application/json"
            },
            body: JSON.stringify(examen)
        })
    })


})