window.addEventListener("load",function(){
    var divpreguntas=this.document.getElementsByClassName("OCULTA");
    var container=this.document.getElementById("container");
    var anterior=this.document.getElementById("anterior");
    var siguiente=this.document.getElementById("siguiente");
    var j=0;
    
    
    this.fetch("../examenprueba.json")
        .then(x=>x.json())
        .then(y=>{
            var preguntas = y.Examen.preguntas;

            mostrarPregunta(divpreguntas, preguntas,container);


            
            siguiente.addEventListener("click", function () {

                j++;
                if (j >= preguntas.length) {
                    j = 0;
                }
            });

            anterior.addEventListener("click", function () {
                divpreguntas[j].classList.add("OCULTA");
                divpreguntas[j].classList.remove("MUESTRA");
                j--;
                alert(j);
                if (j < 0) {
                    j = preguntas.length - 1;
                }

                divpreguntas[j].classList.remove("OCULTA");
                divpreguntas[j].classList.add("MUESTRA");
            });


            
        
        });


        function mostrarPregunta(divpreguntas,preguntas,contenedor) {
            for (let i=0;i<preguntas.length;i++){
                var divpregunta = document.createElement("div");
                var pregunta = preguntas[i];
                var imagen = document.createElement("img");
                var ruta = "../" + pregunta.imagen;
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
                inputdudosa.setAttribute("type", "radio");
                inputdudosa.setAttribute("name", "dudosa" + i);
        
                dudosa.appendChild(inputdudosa);
                dudosa.appendChild(lbl);
        
                rep1.appendChild(input1);
                rep2.appendChild(input2);
                rep3.appendChild(input3);
                rep1.appendChild(prep1);
                rep2.appendChild(prep2);
                rep3.appendChild(prep3);
        
                divfoto.appendChild(imagen);
                divenunciado.appendChild(p);
                divrespuestas.appendChild(rep1);
                divrespuestas.appendChild(rep2);
                divrespuestas.appendChild(rep3);

        
                divpregunta.appendChild(divfoto);
                divpregunta.appendChild(dudosa);
                divpregunta.appendChild(divenunciado);
                divpregunta.appendChild(divrespuestas);
        
                contenedor.appendChild(divpregunta);

        
                if (i!=0){
                    divpregunta.classList.add("OCULTA");
                }else{
                    divpregunta.classList.add("MUESTRA");
                }
                

            }
                    
            


        }
        
            


        
});