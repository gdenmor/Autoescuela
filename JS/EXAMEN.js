window.addEventListener("load",function(){
    var foto=this.document.getElementById("foto");
    var anterior=this.document.getElementById("anterior");
    var siguiente=this.document.getElementById("siguiente");
    var indice=0;
    var divpregunta=this.document.getElementById("pregunta");
    var respuestas=this.document.getElementsByClassName("respuestas");
    var inputs=this.document.getElementsByClassName("inputs");
    var container=this.document.getElementById("container");
    var respuestasUsuario = new Array();

    container.style.display="none";
    
    this.fetch("../examenprueba.json")
        .then(x=>x.json())
        .then(y=>{
            preguntas = y.Examen.preguntas;
            mostrarPregunta(indice,preguntas,foto,divpregunta,respuestas,inputs,container);

            siguiente.addEventListener("click", function () {
                indice++;
                if (indice >= preguntas.length) {
                    indice = 0;
                }

                mostrarPregunta(indice,preguntas,foto,divpregunta,respuestas,inputs,container);
    
            });

            anterior.addEventListener("click", function () {
                indice--;
                if (indice<0) {
                    indice = preguntas.length-1;
                }
                mostrarPregunta(indice,preguntas,foto,divpregunta,respuestas,inputs,container);
            });
        
        });


        function mostrarPregunta(index,preguntas,divfoto,divpregunta,divrespuestas,inputs,container) {
            debugger;
            
            container.style.display="block";
            var pregunta = preguntas[index];
            var imagen=document.createElement("img");
            divfoto.innerHTML="";
            divpregunta.innerHTML="";
            for (let i=0;i<divrespuestas.length;i++){
                divrespuestas[i].innerHTML="";
            }
            var ruta="../"+pregunta.imagen;
            imagen.src=ruta;
            var p=document.createElement("p");
            var enunciado=pregunta.enunciado;
            p.innerHTML=(index+1)+"."+" "+enunciado;
            var respuestas=pregunta.respuestas;

            for (let i=0;i<respuestas.length;i++){
                divrespuestas[i].innerHTML=respuestas[i].respuesta;
            }

            for(let j = 0; j < inputs.length; j++){
                inputs[j].name = inputs[j].name+(index+1);
                inputs[j].addEventListener("change", function () {
                    // Almacena la respuesta seleccionada por el usuario
                    respuestasUsuario[index] = j;
                });
            }

            divpregunta.appendChild(p);
            divfoto.appendChild(imagen);
        }
});