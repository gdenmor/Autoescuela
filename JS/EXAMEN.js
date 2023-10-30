window.addEventListener("load",function(){
    var foto=this.document.getElementById("foto");
    var anterior=this.document.getElementById("anterior");
    var siguiente=this.document.getElementById("siguiente");
    var indice=0;
    var divpregunta=this.document.getElementById("pregunta");
    var respuestas=this.document.getElementsByClassName("respuestas");
    var inputs=this.document.getElementsByClassName("inputs");
    
    this.fetch("../examenprueba.json")
        .then(x=>x.json())
        .then(y=>{
            preguntas = y.Examen.preguntas;
            mostrarPregunta(indice,preguntas,foto,divpregunta,respuestas,inputs);

            siguiente.addEventListener("click", function () {
                indice++;
                if (indice >= preguntas.length) {
                    indice = 1;
                }

                mostrarPregunta(indice,preguntas,foto,divpregunta,respuestas,inputs);
            });

            anterior.addEventListener("click", function () {
                indice--;
                if (indice<0) {
                    indice = preguntas.length-1;
                }
                mostrarPregunta(indice,preguntas,foto,divpregunta,respuestas,inputs);
            });
        
        });

        function mostrarPregunta(index,preguntas,divfoto,divpregunta,divrespuestas,inputs) {
            debugger;
            var pregunta = preguntas[index];
            var imagen=document.createElement("img");
            divfoto.innerHTML="";
            divpregunta.innerHTML="";
            var ruta="../"+pregunta.imagen;
            imagen.src=ruta;
            var p=document.createElement("p");
            var enunciado=pregunta.enunciado;
            p.innerHTML=(index+1)+"."+" "+enunciado;
            var respuestas=pregunta.respuestas;

            /*for (let i=0;i<respuestas.length;i++){
                divrespuestas[i].innerHTML=respuestas[i].enunciado;
                inputs[i].setAttribute("name", "rep" + index);
            }*/

            divpregunta.appendChild(p);
            divfoto.appendChild(imagen);
        }
})