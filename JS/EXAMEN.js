window.addEventListener("load",function(){
    var divpreguntas=this.document.getElementsByClassName("OCULTA");
    var container=this.document.getElementById("container");
    var j=0;
    var respuestas=[];
    
    this.fetch("../AUTOESCUELA/examenprueba.json")
        .then(x=>x.json())
        .then(y=>{
            var preguntas = y.Examen.preguntas;

            mostrarPregunta(divpreguntas, preguntas,container);
            
            muestraBotones(container);

            var siguiente=this.document.getElementById("siguiente");

            var anterior=this.document.getElementById("anterior");

            var divs=this.document.getElementsByClassName("Hola");

            divs[j].classList.remove("OCULTA");

            siguiente.addEventListener("click", function () {
                divs[j].classList.add("OCULTA"); // Oculta la pregunta actual
                j++;
                if (j>=preguntas.length){
                    j=0;
                }
                divs[j].classList.remove("OCULTA");
              },false);

              anterior.addEventListener("click", function () {
                divs[j].classList.add("OCULTA"); // Oculta la pregunta actual
                j--;
                if (j<0){
                    j=preguntas.length-1;
                }
                divs[j].classList.remove("OCULTA");
              },false);

            
            

            var finalizar=this.document.getElementById("finalizar").addEventListener("click",function(){
                fetch("recibeexamen.php" ,{
                    method: "POST",
                    body: JSON.stringify(respuestas)
                })
            })

            
        
        });


        function mostrarPregunta(divpreguntas,preguntas,contenedor) {
            for (let i=0;i<preguntas.length;i++){
                var divpregunta = document.createElement("div");
                var pregunta = preguntas[i];
                var imagen = document.createElement("img");
                var ruta = "../AUTOESCUELA/" + pregunta.imagen;
                imagen.src = ruta;
                var p = document.createElement("p");
                var enunciado = pregunta.enunciado;
                p.innerHTML = (i + 1) + "." + " " + enunciado;
        
                var divfoto = document.createElement("div");
                var divenunciado = document.createElement("div");
                var divrespuestas = document.createElement("div");
                var rep1 = document.createElement("div");
                var rep2 = document.createElement("div");
                var rep3 = document.createElement("div");
        
                var respuestas = pregunta.respuestas;
        
                var input1 = document.createElement("input");
                input1.setAttribute("type", "radio");
                input1.setAttribute("name", "rep" + i);
        
                var input2 = document.createElement("input");
                input2.setAttribute("type", "radio");
                input2.setAttribute("name", "rep" + i);
        
                var input3 = document.createElement("input");
                input3.setAttribute("type", "radio");
                input3.setAttribute("name", "rep" + i);

                const inputs=[input1,input2,input3];
        
                var prep1 = document.createElement("p");
                prep1.innerHTML = respuestas[0].respuesta;
        
                var prep2 = document.createElement("p");
                prep2.innerHTML = respuestas[1].respuesta;
        
                var prep3 = document.createElement("p");
                prep3.innerHTML = respuestas[2].respuesta;
        
                var dudosa = document.createElement("div");
                var inputdudosa = document.createElement("input");
                var lbl = document.createElement("label");
                lbl.innerHTML = "DUDOSA: ";
                inputdudosa.setAttribute("type", "checkbox");
                inputdudosa.setAttribute("name", "dudosa" + i);
        
                dudosa.appendChild(inputdudosa);
                dudosa.appendChild(lbl);

                dudosa.style.width="20%";
        
                rep1.appendChild(input1);
                rep2.appendChild(input2);
                rep3.appendChild(input3);
                rep1.appendChild(prep1);
                rep2.appendChild(prep2);
                rep3.appendChild(prep3);
        
                divfoto.appendChild(imagen);
                divfoto.appendChild(dudosa);
                divenunciado.appendChild(p);


                divrespuestas.appendChild(rep1);
                divrespuestas.appendChild(rep2);
                divrespuestas.appendChild(rep3);


                var borrar=document.createElement("div");

                var inputborra=document.createElement("input");
                inputborra.setAttribute("type", "button");
                inputborra.setAttribute("value","BORRAR");
                inputborra.id="borra"+i;


                inputborra.addEventListener("click",function(ev){
                    ev.preventDefault();
                    for (let i=0;i<inputs.length;i++){
                        inputs[i].checked=false;
                        console.log(inputs[i]);
                    }
                });


                borrar.appendChild(inputborra);


        
                divpregunta.appendChild(divfoto);
                divpregunta.appendChild(dudosa);
                divpregunta.appendChild(divenunciado);
                divpregunta.appendChild(divrespuestas);
                divpregunta.appendChild(borrar);

                divpregunta.classList.add("Hola");

        
                contenedor.appendChild(divpregunta);

                divpregunta.classList.add("OCULTA");

                

                

            }

        }

        function muestraBotones(container){
            var div=document.createElement("div");
            var anterior=document.createElement("input");
            anterior.setAttribute("type","button");
            anterior.setAttribute("value","ANTERIOR");
            anterior.id="anterior";

            var siguiente=document.createElement("input");
            siguiente.setAttribute("type","button");
            siguiente.setAttribute("value","SIGUIENTE");
            siguiente.id="siguiente";

            var finalizar=document.createElement("input");
            finalizar.setAttribute("type","button");
            finalizar.setAttribute("value","FINALIZAR TEST");
            finalizar.id="finalizar";

            div.appendChild(anterior);
            div.appendChild(siguiente);
            div.appendChild(finalizar);
            div.id="botones";

            container.appendChild(div);
        }
        
});