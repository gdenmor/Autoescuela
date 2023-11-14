<?php
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $Preguntas=[];

    }
?>
<div id="contenedor-crea">
    <div>
        <?php
            
        ?>
    </div>
<form>
<div class="pregunta-examen-creada">
        <div>
            <select name="categoria-examen-pregunta1">
                <?php
                    $categorias=CATEGORIA_REPOSITORY::FindAll();
                    for ($i= 0; $i < count($categorias); $i++) {
                        echo '<option value="'.$categorias[$i]->getNombre().'">'.$categorias[$i]->getNombre().'</option>';
                    }


                ?>
            </select>
        </div>
        <div>
            <select name="dificultad-examen-pregunta1">
                <?php
                    $Dificultad=DIFICULTAD_REPOSITORY::FindAll();
                    for ($i= 0; $i < count($Dificultad); $i++) {
                        echo "<option>".$Dificultad[$i]->getNom()."</option>";
                    }


                ?>
            </select>
        </div>
        <div id="imagenpreguntaexamen1">
            <input type="file" name="archivo" id="imagenpreguntas">
        </div>
        <div id="enunciadopreguntaexamen1">
            <input type="text" name="enunciado" placeholder="Introduzca la pregunta" id="enunc">
        </div>
        <div>
            <div class="respuesta1">
                <input type="radio" name="respuestas" value="1"><input type="text" name="rep1" class="respuestass">
            </div>
            <div class="respuesta1">
                <input type="radio" name="respuestas" value="2"><input type="text" name="rep2" class="respuestass">
            </div>
            <div class="respuesta1">
                <input type="radio" name="respuestas" value="3"><input type="text" name="rep3" class="respuestass">
            </div>
        </div>
</div>
<div class="pregunta-examen-creada">
        <div>
            <select name="categoria-examen-pregunta2">
                <?php
                    $categorias=CATEGORIA_REPOSITORY::FindAll();
                    for ($i= 0; $i < count($categorias); $i++) {
                        echo '<option value="'.$categorias[$i]->getNombre().'">'.$categorias[$i]->getNombre().'</option>';
                    }


                ?>
            </select>
        </div>
        <div>
            <select name="dificultad-examen-pregunta2">
                <?php
                    $Dificultad=DIFICULTAD_REPOSITORY::FindAll();
                    for ($i= 0; $i < count($Dificultad); $i++) {
                        echo "<option>".$Dificultad[$i]->getNom()."</option>";
                    }


                ?>
            </select>
        </div>
        <div id="imagenpreguntaexamen2">
            <input type="file" name="archivo" id="imagenpreguntas">
        </div>
        <div id="enunciadopreguntaexamen2">
            <input type="text" name="enunciado" placeholder="Introduzca la pregunta" id="enunc">
        </div>
        <div>
            <div class="respuesta2">
                <input type="radio" name="respuestas" value="1"><input type="text" name="rep1" class="respuestass">
            </div>
            <div class="respuesta2">
                <input type="radio" name="respuestas" value="2"><input type="text" name="rep2" class="respuestass">
            </div>
            <div class="respuesta2">
                <input type="radio" name="respuestas" value="3"><input type="text" name="rep3" class="respuestass">
            </div>
        </div>
</div>
<div class="pregunta-examen-creada">
        <div>
            <select name="categoria-examen-pregunta3">
                <?php
                    $categorias=CATEGORIA_REPOSITORY::FindAll();
                    for ($i= 0; $i < count($categorias); $i++) {
                        echo '<option value="'.$categorias[$i]->getNombre().'">'.$categorias[$i]->getNombre().'</option>';
                    }


                ?>
            </select>
        </div>
        <div>
            <select name="dificultad-examen-pregunta3">
                <?php
                    $Dificultad=DIFICULTAD_REPOSITORY::FindAll();
                    for ($i= 0; $i < count($Dificultad); $i++) {
                        echo "<option>".$Dificultad[$i]->getNom()."</option>";
                    }


                ?>
            </select>
        </div>
        <div id="imagenpreguntaexamen3">
            <input type="file" name="archivo" id="imagenpreguntas">
        </div>
        <div id="enunciadopreguntaexamen3">
            <input type="text" name="enunciado" placeholder="Introduzca la pregunta" id="enunc">
        </div>
        <div>
            <div class="respuesta3">
                <input type="radio" name="respuestas" value="1"><input type="text" name="rep1" class="respuestass">
            </div>
            <div class="respuesta3">
                <input type="radio" name="respuestas" value="2"><input type="text" name="rep2" class="respuestass">
            </div>
            <div class="respuesta3">
                <input type="radio" name="respuestas" value="3"><input type="text" name="rep3" class="respuestass">
            </div>
        </div>
</div>
<div class="pregunta-examen-creada">
        <div>
            <select name="categoria-examen-pregunta4">
                <?php
                    $categorias=CATEGORIA_REPOSITORY::FindAll();
                    for ($i= 0; $i < count($categorias); $i++) {
                        echo '<option value="'.$categorias[$i]->getNombre().'">'.$categorias[$i]->getNombre().'</option>';
                    }


                ?>
            </select>
        </div>
        <div>
            <select name="dificultad-examen-pregunta4">
                <?php
                    $Dificultad=DIFICULTAD_REPOSITORY::FindAll();
                    for ($i= 0; $i < count($Dificultad); $i++) {
                        echo "<option>".$Dificultad[$i]->getNom()."</option>";
                    }


                ?>
            </select>
        </div>
        <div id="imagenpreguntaexamen4">
            <input type="file" name="archivo" id="imagenpreguntas">
        </div>
        <div id="enunciadopreguntaexamen4">
            <input type="text" name="enunciado" placeholder="Introduzca la pregunta" id="enunc">
        </div>
        <div>
            <div class="respuesta4">
                <input type="radio" name="respuestas" value="1"><input type="text" name="rep1" class="respuestass">
            </div>
            <div class="respuesta4">
                <input type="radio" name="respuestas" value="2"><input type="text" name="rep2" class="respuestass">
            </div>
            <div class="respuesta4">
                <input type="radio" name="respuestas" value="3"><input type="text" name="rep3" class="respuestass">
            </div>
        </div>
</div>
<div class="pregunta-examen-creada">
        <div>
            <select name="categoria-examen-pregunta5">
                <?php
                    $categorias=CATEGORIA_REPOSITORY::FindAll();
                    for ($i= 0; $i < count($categorias); $i++) {
                        echo '<option value="'.$categorias[$i]->getNombre().'">'.$categorias[$i]->getNombre().'</option>';
                    }


                ?>
            </select>
        </div>
        <div>
            <select name="dificultad-examen-pregunta5">
                <?php
                    $Dificultad=DIFICULTAD_REPOSITORY::FindAll();
                    for ($i= 0; $i < count($Dificultad); $i++) {
                        echo "<option>".$Dificultad[$i]->getNom()."</option>";
                    }


                ?>
            </select>
        </div>
        <div id="imagenpreguntaexamen5">
            <input type="file" name="archivo" id="imagenpreguntas">
        </div>
        <div id="enunciadopreguntaexamen5">
            <input type="text" name="enunciado" placeholder="Introduzca la pregunta" id="enunc">
        </div>
        <div>
            <div class="respuesta5">
                <input type="radio" name="respuestas" value="1"><input type="text" name="rep1" class="respuestass">
            </div>
            <div class="respuesta5">
                <input type="radio" name="respuestas" value="2"><input type="text" name="rep2" class="respuestass">
            </div>
            <div class="respuesta5">
                <input type="radio" name="respuestas" value="3"><input type="text" name="rep3" class="respuestass">
            </div>
        </div>
</div>
<div class="pregunta-examen-creada">
        <div>
            <select name="categoria-examen-pregunta6">
                <?php
                    $categorias=CATEGORIA_REPOSITORY::FindAll();
                    for ($i= 0; $i < count($categorias); $i++) {
                        echo '<option value="'.$categorias[$i]->getNombre().'">'.$categorias[$i]->getNombre().'</option>';
                    }


                ?>
            </select>
        </div>
        <div>
            <select name="dificultad-examen-pregunta6">
                <?php
                    $Dificultad=DIFICULTAD_REPOSITORY::FindAll();
                    for ($i= 0; $i < count($Dificultad); $i++) {
                        echo "<option>".$Dificultad[$i]->getNom()."</option>";
                    }


                ?>
            </select>
        </div>
        <div id="imagenpreguntaexamen6">
            <input type="file" name="archivo" id="imagenpreguntas">
        </div>
        <div id="enunciadopreguntaexamen6">
            <input type="text" name="enunciado" placeholder="Introduzca la pregunta" id="enunc">
        </div>
        <div>
            <div class="respuesta6">
                <input type="radio" name="respuestas" value="1"><input type="text" name="rep1" class="respuestass">
            </div>
            <div class="respuesta6">
                <input type="radio" name="respuestas" value="2"><input type="text" name="rep2" class="respuestass">
            </div>
            <div class="respuesta6">
                <input type="radio" name="respuestas" value="3"><input type="text" name="rep3" class="respuestass">
            </div>
        </div>
</div>
</form>
</div>