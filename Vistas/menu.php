<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú</title>

    <link rel="stylesheet" href="../Diseño/styles.css">
    
    <!-- Fuentes Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="favicon.ico" type="image/x-icon"> 
</head>

<body>
    <div class="content-wrapper">
        <div class="header-bg">
            <header class="header container">
        
                <div class="titulo-contenedor">
                    <h1 class="titulo">Nuevos datos</h1>
                </div>
        
                <div class="navegacion">
                    <ul class="links">
                        <li class="link"><a href="inicio.html">Inicio</a></li>
                        <li class="link"><a href="edificios.php">Edificios</a></li>
                        <li class="link"><a href="espaciosUrbanos.php">Espacios Urbanos</a></li>
                        <li class="link"><a href="biografias.php">Biografías</a></li>
                        <li class="link"><a href="login.php">Iniciar Sesión</a></li>
                    </ul>
                </div>
        
            </header>
        </div>

        <main>
            <section class="inicio container">
                <h2 class="titulo">Bienvenido</h2>
                <div class="accordion">
                    <!-- Acordión Edificios -->
                    <div class="accordion-item">
                        <div class="accordion-item-header">
                            Añadir Edificio
                        </div>
                        <div class="accordion-item-body">
                            <div class="form-container">
                                <form action="insert_edificio.php" method="post" class="formulario">
                                <label for="nombre">Nombre del edificio:</label>
                                <input type="text" id="nombre" name="nombre">

                                <label for="ubicacion">Ubicación:</label>
                                <input type="text" id="ubicacion" name="ubicacion">

                                <label for="contexto_historico">Contexto histórico:</label>
                                <textarea id="contexto_historico" name="contexto_historico"></textarea>

                                <label for="descripcion_espacio">Descripción del espacio:</label>
                                <textarea id="descripcion_espacio" name="descripcion_espacio"></textarea>

                                <label for="plantas_arquitectonicas">Plantas arquitectónicas:</label>
                                <textarea id="plantas_arquitectonicas" name="plantas_arquitectonicas"></textarea>

                                <label for="fachadas_ornamentos">Fachadas y ornamentos:</label>
                                <textarea id="fachadas_ornamentos" name="fachadas_ornamentos"></textarea>

                                <label for="corriente_estilistica">Corriente estilística:</label>
                                <input type="text" id="corriente_estilistica" name="corriente_estilistica">

                                <label for="materiales_sistemas_constructivos">Materiales y sistemas constructivos:</label>
                                <textarea id="materiales_sistemas_constructivos" name="materiales_sistemas_constructivos"></textarea>

                                <label for="contexto_urbano">Contexto urbano:</label>
                                <textarea id="contexto_urbano" name="contexto_urbano"></textarea>

                                <label for="transformaciones">Transformaciones:</label>
                                <textarea id="transformaciones" name="transformaciones"></textarea>

                                <label for="activo">Activo:</label>
                                <input type="checkbox" id="activo" name="activo">

                                <input type="submit" value="Añadir edificio">
                            </div>
                        </div>
                    </div>

                    <!-- Acordión Biografías -->
                    <div class="accordion-item">
                        <div class="accordion-item-header">
                            Añadir Biografía
                        </div>
                        <div class="accordion-item-body">
                            <div class="form-container">
                                <form action="insert_biografia.php" method="post" class="formulario">
                                <label for="arquitecto_id">ID de arquitecto:</label>
                                <input type="number" id="arquitecto_id" name="arquitecto_id">

                                <label for="año_ciudad_nacimiento">Año y ciudad de nacimiento:</label>
                                <input type="text" id="año_ciudad_nacimiento" name="año_ciudad_nacimiento">

                                <label for="lugar_estudios">Lugar de estudios:</label>
                                <input type="text" id="lugar_estudios" name="lugar_estudios">

                                <label for="disciplina">Disciplina:</label>
                                <input type="text" id="disciplina" name="disciplina">

                                <label for="principales_obras">Principales obras:</label>
                                <input type="text" id="principales_obras" name="principales_obras">

                                <label for="elementos_caracteristicos">Elementos característicos:</label>
                                <input type="text" id="elementos_caracteristicos" name="elementos_caracteristicos">
                                <input type="submit" value="Añadir biografía">
                            </div>
                        </div>
                    </div>

                    <!-- Acordión Espacios Urbanos -->
                    <div class="accordion-item">
                        <div class="accordion-item-header">
                            Añadir Espacio Urbano
                        </div>
                        <div class="accordion-item-body">
                            <div class="form-container">
                                <form action="insert_espacioUrbano.php" method="post" class="formulario">
                                <label for="nombre">Nombre del espacio urbano:</label>
                                <input type="text" id="nombre" name="nombre">

                                <label for="año_establecimiento">Año de establecimiento:</label>
                                <input type="number" id="año_establecimiento" name="año_establecimiento">

                                <label for="funcion">Función:</label>
                                <input type="text" id="funcion" name="funcion">

                                <label for="arquitecto_id">ID del arquitecto:</label>
                                <input type="number" id="arquitecto_id" name="arquitecto_id">

                                <label for="latitud">Latitud:</label>
                                <input type="number" id="latitud" name="latitud" step="any">

                                <label for="longitud">Longitud:</label>
                                <input type="number" id="longitud" name="longitud" step="any">

                                <label for="contexto_historico">Contexto histórico:</label>
                                <textarea id="contexto_historico" name="contexto_historico"></textarea>

                                <label for="descripcion_proyecto_original">Descripción del proyecto original:</label>
                                <textarea id="descripcion_proyecto_original" name="descripcion_proyecto_original"></textarea>

                                <label for="orientacion">Orientación:</label>
                                <input type="text" id="orientacion" name="orientacion">

                                <label for="dimensiones">Dimensiones:</label>
                                <input type="text" id="dimensiones" name="dimensiones">

                                <label for="secciones">Secciones:</label>
                                <textarea id="secciones" name="secciones"></textarea>

                                <label for="elementos_imagen_urbana">Elementos de imagen urbana:</label>
                                <textarea id="elementos_imagen_urbana" name="elementos_imagen_urbana"></textarea>

                                <label for="tipos_edificaciones">Tipos de edificaciones:</label>
                                <input type="text" id="tipos_edificaciones" name="tipos_edificaciones">

                                <label for="transformaciones">Transformaciones:</label>
                                <textarea id="transformaciones" name="transformaciones"></textarea>

                                <label for="principios_diseno">Principios de diseño:</label>
                                <textarea id="principios_diseno" name="principios_diseno"></textarea>

                                <input type="submit" value="Añadir espacio urbano">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <footer>
        <div class="Pie-pagina">
            <p>
                Lorem ipsum dolor, s
            </p>
        </div>
    </footer>

    <script>
        var accordions = document.getElementsByClassName("accordion-item");

        for (var i = 0; i < accordions.length; i++) {
            accordions[i].onclick = function() {
                this.classList.toggle('is-open');

                var content = this.nextElementSibling;
                if (content.style.maxHeight) {
                    // si está abierto, ciérralo
                    content.style.maxHeight = null;
                } else {
                    // si está cerrado, ábrelo
                    content.style.maxHeight = content.scrollHeight + "px";
                } 
            }
        }
    </script>
</body>
</html>
