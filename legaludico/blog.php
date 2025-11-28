<?php
session_start();

// Simulación de base de datos de artículos
$articulos = [
    [
        'id' => 1,
        'titulo' => 'Cómo Enseñar Derechos Humanos a los Niños de Forma Divertida',
        'resumen' => 'Descubre estrategias creativas y juegos interactivos para que los más pequeños comprendan sus derechos fundamentales mientras se divierten.',
        'contenido' => '
            <h2>La Importancia de la Educación Temprana en Derechos Humanos</h2>
            <p>Enseñar derechos humanos desde la infancia es fundamental para formar ciudadanos conscientes y responsables. Los niños que comprenden sus derechos desde pequeños desarrollan una mayor empatía y respeto por los demás.</p>
            
            <h3>Estrategias Prácticas para Padres y Educadores</h3>
            <div class="estrategia">
                <h4>🎮 Juegos de Rol</h4>
                <p>Crear situaciones donde los niños representen diferentes roles ayuda a entender perspectivas diversas. Por ejemplo, jugar a "ser juez por un día" o "construir una ciudad ideal".</p>
            </div>
            
            <div class="estrategia">
                <h4>📚 Cuentos y Fábulas</h4>
                <p>Utilizar historias con personajes que enfrentan situaciones relacionadas con derechos humanos. Los cuentos son una herramienta poderosa para transmitir valores.</p>
            </div>
            
            <div class="estrategia">
                <h4>🎨 Actividades Creativas</h4>
                <p>Dibujar, pintar o crear manualidades sobre los derechos permite internalizar conceptos de manera visual y memorable.</p>
            </div>
            
            <h3>Beneficios a Largo Plazo</h3>
            <ul>
                <li>Desarrollo de pensamiento crítico</li>
                <li>Fomento de la empatía y solidaridad</li>
                <li>Formación de ciudadanos responsables</li>
                <li>Prevención del bullying y discriminación</li>
            </ul>
        ',
        'imagen' => 'assets/images/blog/derechos-ninos.jpg',
        'fecha' => '2024-01-15',
        'autor' => 'Equipo Legalúdico',
        'categoria' => 'Estrategias Educativas',
        'tiempo_lectura' => '5 min'
    ],
    [
        'id' => 2,
        'titulo' => 'El Impacto de los Talleres Lúdicos en el Aprendizaje Jurídico Infantil',
        'resumen' => 'Estudio sobre cómo la metodología lúdica mejora la retención y comprensión de conceptos jurídicos en niños de 6 a 12 años.',
        'contenido' => '
            <h2>Metodología del Estudio</h2>
            <p>Realizamos un estudio comparativo con 200 niños divididos en dos grupos: uno utilizando métodos tradicionales y otro con nuestra metodología lúdica.</p>
            
            <h3>Resultados Clave</h3>
            <div class="resultado">
                <h4>📈 Mejora en la Retención</h4>
                <p>Los niños que participaron en talleres lúdicos mostraron un 85% de retención de conceptos después de 30 días, comparado con el 45% del grupo tradicional.</p>
            </div>
            
            <div class="resultado">
                <h4>😊 Mayor Motivación</h4>
                <p>El 92% de los niños expresó interés en aprender más sobre derechos después de los talleres interactivos.</p>
            </div>
            
            <div class="resultado">
                <h4>👥 Desarrollo de Habilidades Sociales</h4>
                <p>Observamos mejoras significativas en trabajo en equipo, empatía y resolución pacífica de conflictos.</p>
            </div>
            
            <h3>Conclusiones</h3>
            <p>La metodología lúdica no solo hace el aprendizaje más divertido, sino que también lo hace más efectivo y perdurable.</p>
        ',
        'imagen' => 'assets/images/blog/impacto-talleres.jpg',
        'fecha' => '2024-01-10',
        'autor' => 'Dra. María González',
        'categoria' => 'Investigación',
        'tiempo_lectura' => '4 min'
    ],
    [
        'id' => 3,
        'titulo' => '5 Actividades Prácticas para Enseñar Constitución a Niños de Primaria',
        'resumen' => 'Actividades sencillas y divertidas que puedes implementar en casa o en el aula para introducir conceptos constitucionales básicos.',
        'contenido' => '
            <h2>Actividades para Diferentes Edades</h2>
            
            <div class="actividad">
                <h3>1. 🏗️ "Construyamos Nuestra Constitución" (6-8 años)</h3>
                <p><strong>Materiales:</strong> Cartulinas, marcadores, material reciclado</p>
                <p><strong>Procedimiento:</strong> Los niños crean las "leyes" de su salón o casa, discutiendo y votando cada norma.</p>
                <p><strong>Objetivo:</strong> Comprender el proceso de creación de leyes y la importancia del consenso.</p>
            </div>
            
            <div class="actividad">
                <h3>2. 🎭 "Drama de Derechos" (8-10 años)</h3>
                <p><strong>Materiales:</strong> Disfraces simples, escenarios improvisados</p>
                <p><strong>Procedimiento:</strong> Representan situaciones donde se respetan o vulneran derechos fundamentales.</p>
                <p><strong>Objetivo:</strong> Identificar derechos en situaciones cotidianas.</p>
            </div>
            
            <div class="actividad">
                <h3>3. 🧩 "Rompecabezas Constitucional" (10-12 años)</h3>
                <p><strong>Materiales:</strong> Rompecabezas con artículos constituciles adaptados</p>
                <p><strong>Procedimiento:</strong> Arman el rompecabezas mientras discuten el significado de cada artículo.</p>
                <p><strong>Objetivo:</strong> Familiarizarse con la estructura constitucional.</p>
            </div>
        ',
        'imagen' => 'assets/images/blog/actividades-constitucion.jpg',
        'fecha' => '2024-01-05',
        'autor' => 'Prof. Carlos Rodríguez',
        'categoria' => 'Actividades Prácticas',
        'tiempo_lectura' => '6 min'
    ],
    [
        'id' => 4,
        'titulo' => 'Cómo Hablar de Justicia con los Más Pequeños',
        'resumen' => 'Guía para padres y educadores sobre cómo abordar conceptos de justicia y equidad con niños en edad preescolar.',
        'contenido' => '
            <h2>Conceptos Básicos Adaptados</h2>
            <p>Los niños pequeños pueden entender la justicia a través de situaciones cotidianas y ejemplos concretos.</p>
            
            <h3>Ejemplos Prácticos</h3>
            <div class="ejemplo">
                <h4>🍎 Compartir es Justo</h4>
                <p>Cuando repartimos galletas o juguetes, explicamos por qué todos merecen una parte equitativa.</p>
            </div>
            
            <div class="ejemplo">
                <h4>🎯 Reglas Claras</h4>
                <p>Establecer reglas simples y consistentes ayuda a entender que la justicia significa aplicar las mismas normas para todos.</p>
            </div>
            
            <div class="ejemplo">
                <h4>🤝 Resolución de Conflictos</h4>
                <p>Enseñar a escuchar ambas partes en una discusión y buscar soluciones que sean justas para todos.</p>
            </div>
            
            <h3>Errores Comunes a Evitar</h3>
            <ul>
                <li>No simplificar demasiado los conceptos</li>
                <li>Evitar mensajes de "premio y castigo" extremos</li>
                <li>No confundir justicia con igualdad absoluta</li>
            </ul>
        ',
        'imagen' => 'assets/images/blog/justicia-ninos.jpg',
        'fecha' => '2024-01-01',
        'autor' => 'Equipo Legalúdico',
        'categoria' => 'Guías para Padres',
        'tiempo_lectura' => '4 min'
    ]
];

// Obtener artículo específico si hay ID
$articulo_actual = null;
if (isset($_GET['id'])) {
    $id_articulo = intval($_GET['id']);
    foreach ($articulos as $articulo) {
        if ($articulo['id'] === $id_articulo) {
            $articulo_actual = $articulo;
            break;
        }
    }
}

// Procesar comentarios si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['comentario'])) {
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = htmlspecialchars($_POST['email']);
    $comentario = htmlspecialchars($_POST['comentario']);
    $articulo_id = intval($_POST['articulo_id']);
    
    // Aquí normalmente guardarías en base de datos
    $_SESSION['message'] = "✅ ¡Gracias por tu comentario! Será revisado y publicado pronto.";
    header("Location: blog.php?id=" . $articulo_id);
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Legalúdico | Educación Jurídica para Niños</title>
    <meta name="description" content="Blog especializado en educación jurídica infantil. Consejos, actividades y recursos para enseñar derechos y leyes a niños.">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* ESTILOS COMPLETOS DE LEGALÚDICO */
        :root {
            --primary: #1b5da4;
            --secondary: #3b9442;
            --accent: #e37c2c;
            --warning: #cf2328;
            --success: #ce156c;
            --light: #f8f9fa;
            --dark: #2c3e50;
            --text: #343a40;
            --gradient-primary: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            --gradient-accent: linear-gradient(135deg, #FFD700 0%, #FF8C00 40%, #cf2328 70%, #ce156c 100%);
            --gradient-hero: linear-gradient(135deg, #FFD700 0%, #FF8C00 40%, #cf2328 70%, #ce156c 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: var(--light);
            min-height: 100vh;
            overflow-x: hidden;
            color: var(--text);
            line-height: 1.6;
        }

        /* Loading Screen */
        .loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--gradient-hero);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s ease;
        }

        .loader {
            width: 60px;
            height: 60px;
            border: 5px solid rgba(255,255,255,0.3);
            border-top: 5px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-bottom: 20px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Navigation */
        .navbar {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            padding: 1rem 2rem;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            border-bottom: 3px solid var(--accent);
        }

        .navbar.scrolled {
            padding: 0.8rem 2rem;
            background: rgba(255, 255, 255, 0.98);
        }

        .nav-content {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.8em;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 15px;
            text-decoration: none;
            color: var(--dark);
        }

        .logo-img {
            height: 50px;
            width: auto;
            transition: transform 0.3s ease;
        }

        .logo:hover .logo-img {
            transform: scale(1.05);
        }

        .logo-text {
            display: flex;
            align-items: center;
            gap: 0;
        }

        .logo-LE { color: #1b5da4; font-weight: 800; }
        .logo-GA { color: #3b9442; font-weight: 800; }
        .logo-LÚ { color: #e37c2c; font-weight: 800; }
        .logo-DI { color: #cf2328; font-weight: 800; }
        .logo-CO { color: #ce156c; font-weight: 800; }

        .nav-links {
            display: flex;
            gap: 1.8rem;
            align-items: center;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--dark);
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            padding: 0.5rem 0;
            font-size: 1.05em;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 3px;
            background: var(--gradient-accent);
            transition: width 0.3s ease;
            border-radius: 2px;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .nav-cta {
            background: var(--gradient-primary);
            color: white !important;
            padding: 12px 30px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(27, 93, 164, 0.3);
            border: none;
            white-space: nowrap;
            font-size: 1em;
            min-width: 140px;
            text-align: center;
        }

        .nav-cta:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(27, 93, 164, 0.4);
            color: white !important;
        }

        .nav-cta::after {
            display: none !important;
        }

        /* Alert Message */
        .alert-message {
            position: fixed;
            top: 100px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--success);
            color: white;
            padding: 20px 35px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            z-index: 9999;
            animation: slideDown 0.5s ease;
            max-width: 90%;
            text-align: center;
            border-left: 5px solid var(--accent);
        }

        .alert-content {
            position: relative;
            padding-right: 30px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .close-alert {
            position: absolute;
            right: -10px;
            top: -10px;
            background: white;
            color: var(--success);
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            cursor: pointer;
            font-size: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .close-alert:hover {
            background: var(--accent);
            color: white;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateX(-50%) translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(-50%) translateY(0);
            }
        }

        /* Mobile Menu */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.5em;
            cursor: pointer;
            color: var(--dark);
            padding: 5px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .mobile-menu-btn:hover {
            background: var(--light);
        }

        .mobile-menu {
            position: fixed;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: white;
            z-index: 2000;
            transition: left 0.4s ease;
            display: flex;
            flex-direction: column;
            padding: 2rem;
            box-shadow: 0 0 50px rgba(0,0,0,0.2);
        }

        .mobile-menu.active {
            left: 0;
        }

        .close-menu {
            align-self: flex-end;
            background: none;
            border: none;
            font-size: 1.8em;
            cursor: pointer;
            margin-bottom: 2rem;
            color: var(--primary);
            padding: 10px;
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .close-menu:hover {
            background: var(--light);
        }

        .mobile-nav-links {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .mobile-nav-links a {
            text-decoration: none;
            color: var(--dark);
            font-size: 1.2em;
            font-weight: 600;
            padding: 1.2rem;
            border-radius: 12px;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }

        .mobile-nav-links a:hover {
            background: var(--light);
            border-left-color: var(--primary);
            padding-left: 1.5rem;
        }

        .mobile-cta {
            background: var(--gradient-primary);
            color: white !important;
            padding: 1.2rem;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            text-align: center;
            margin-top: 2rem;
            font-size: 1.1em;
            transition: all 0.3s ease;
        }

        .mobile-cta:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(27, 93, 164, 0.4);
            color: white !important;
        }

        /* Blog Hero */
        .blog-hero {
            background: var(--gradient-hero);
            color: white;
            padding: 150px 2rem 80px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .blog-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="%23ffffff08" points="0,1000 1000,0 1000,1000"/><circle fill="%23ffffff05" cx="200" cy="200" r="150"/><circle fill="%23ffffff03" cx="800" cy="300" r="200"/></svg>');
            animation: float 8s ease-in-out infinite;
        }

        .blog-hero-content {
            max-width: 800px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        .blog-hero h1 {
            font-size: 3em;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 8px rgba(0,0,0,0.3);
        }

        .blog-hero p {
            font-size: 1.3em;
            opacity: 0.95;
            margin-bottom: 2rem;
        }

        /* Blog Content */
        .blog-content {
            padding: 80px 2rem;
            background: var(--light);
        }

        .blog-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Grid de Artículos */
        .blog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-bottom: 4rem;
        }

        .article-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .article-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .article-image {
            width: 100%;
            height: 200px;
            background: var(--gradient-accent);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3em;
        }

        .article-content {
            padding: 1.5rem;
        }

        .article-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            font-size: 0.9em;
            color: #666;
        }

        .article-category {
            background: var(--gradient-primary);
            color: white;
            padding: 4px 12px;
            border-radius: 15px;
            font-size: 0.8em;
            font-weight: 600;
        }

        .article-card h3 {
            color: var(--primary);
            margin-bottom: 1rem;
            font-size: 1.3em;
            line-height: 1.4;
        }

        .article-card p {
            color: var(--text);
            margin-bottom: 1rem;
            line-height: 1.6;
        }

        .read-more {
            color: var(--accent);
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: all 0.3s ease;
        }

        .read-more:hover {
            gap: 10px;
            color: var(--warning);
        }

        /* Página de Artículo Individual */
        .article-page {
            background: white;
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            margin-bottom: 3rem;
        }

        .article-header {
            text-align: center;
            margin-bottom: 3rem;
            padding-bottom: 2rem;
            border-bottom: 3px solid var(--light);
        }

        .article-header h1 {
            color: var(--primary);
            font-size: 2.5em;
            margin-bottom: 1rem;
            line-height: 1.3;
        }

        .article-meta-detailed {
            display: flex;
            justify-content: center;
            gap: 2rem;
            flex-wrap: wrap;
            margin-bottom: 2rem;
            color: #666;
        }

        .article-meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .article-content-detailed {
            line-height: 1.8;
            font-size: 1.1em;
        }

        .article-content-detailed h2 {
            color: var(--primary);
            margin: 2rem 0 1rem;
            font-size: 1.8em;
        }

        .article-content-detailed h3 {
            color: var(--accent);
            margin: 1.5rem 0 1rem;
            font-size: 1.4em;
        }

        .estrategia, .resultado, .actividad, .ejemplo {
            background: var(--light);
            padding: 1.5rem;
            border-radius: 10px;
            margin: 1.5rem 0;
            border-left: 4px solid var(--accent);
        }

        .estrategia h4, .resultado h4, .actividad h3, .ejemplo h4 {
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        /* Sección de Comentarios */
        .comments-section {
            background: white;
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        }

        .comments-section h3 {
            color: var(--primary);
            margin-bottom: 2rem;
            font-size: 1.8em;
        }

        .comment-form {
            background: var(--light);
            padding: 2rem;
            border-radius: 15px;
            margin-bottom: 3rem;
        }

        .comment-form .form-group {
            margin-bottom: 1.5rem;
        }

        .comment-form label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--dark);
        }

        .comment-form input,
        .comment-form textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 1em;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        .comment-form input:focus,
        .comment-form textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(27, 93, 164, 0.1);
        }

        .comment-form textarea {
            min-height: 120px;
            resize: vertical;
        }

        /* Breadcrumb */
        .breadcrumb {
            background: var(--light);
            padding: 1rem 2rem;
            margin-bottom: 2rem;
        }

        .breadcrumb a {
            color: var(--primary);
            text-decoration: none;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        /* Categorías */
        .categories-section {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            margin-bottom: 3rem;
        }

        .categories-grid {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            justify-content: center;
        }

        .category-btn {
            background: var(--gradient-primary);
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .category-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(27, 93, 164, 0.3);
        }

        .category-btn.active {
            background: var(--gradient-accent);
        }

        /* Footer */
        .footer {
            background: var(--dark);
            color: white;
            padding: 4rem 2rem 2rem;
            position: relative;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--gradient-accent);
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 3rem;
        }

        .footer-logo {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .footer-logo-img {
            height: 80px;
            width: auto;
            object-fit: contain;
        }

        .footer-tagline {
            font-size: 1em;
            opacity: 0.9;
            line-height: 1.6;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 1.2em;
        }

        .social-links a:hover {
            background: var(--accent);
            transform: translateY(-3px);
        }

        .footer-links h4 {
            color: var(--accent);
            margin-bottom: 1.5rem;
            font-size: 1.2em;
        }

        .footer-links ul {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.8rem;
        }

        .footer-links a {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--accent);
            padding-left: 5px;
        }

        .footer-bottom {
            max-width: 1200px;
            margin: 3rem auto 0;
            padding-top: 2rem;
            border-top: 1px solid rgba(255,255,255,0.1);
            text-align: center;
            color: rgba(255,255,255,0.6);
        }

        /* Chatbot */
        .chatbot-container {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 1000;
        }

        .chatbot-toggle {
            width: 70px;
            height: 70px;
            background: var(--gradient-accent);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.8em;
            cursor: pointer;
            box-shadow: 0 8px 25px rgba(255, 140, 0, 0.4);
            transition: all 0.3s ease;
            border: 3px solid white;
            position: relative;
            overflow: hidden;
        }

        .chatbot-toggle::before {
            content: '🦊';
            position: absolute;
            font-size: 2em;
        }

        .chatbot-toggle:hover {
            transform: scale(1.1);
            box-shadow: 0 12px 30px rgba(255, 140, 0, 0.6);
        }

        .chatbot-window {
            position: absolute;
            bottom: 90px;
            right: 0;
            width: 380px;
            height: 500px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            display: none;
            flex-direction: column;
            overflow: hidden;
            border: 3px solid #FFD700;
        }

        .chatbot-header {
            background: var(--gradient-accent);
            color: white;
            padding: 1.5rem;
            text-align: center;
            position: relative;
        }

        .chatbot-header::before {
            content: '🦊';
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.5em;
        }

        .chatbot-messages {
            flex: 1;
            padding: 1.5rem;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            background: #f8f9fa;
        }

        .message {
            padding: 1rem 1.2rem;
            border-radius: 18px;
            max-width: 85%;
            animation: messageSlide 0.3s ease;
            line-height: 1.5;
            position: relative;
        }

        .bot-message {
            background: white;
            align-self: flex-start;
            border-bottom-left-radius: 5px;
            color: var(--text);
            border: 2px solid #e0e0e0;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .bot-message::before {
            content: '🦊';
            position: absolute;
            left: -25px;
            top: 5px;
            font-size: 1.2em;
        }

        .user-message {
            background: var(--gradient-primary);
            color: white;
            align-self: flex-end;
            border-bottom-right-radius: 5px;
            box-shadow: 0 2px 8px rgba(27, 93, 164, 0.3);
        }

        .chatbot-input {
            padding: 1.5rem;
            border-top: 2px solid #eee;
            display: flex;
            gap: 10px;
            background: white;
        }

        .chatbot-input input {
            flex: 1;
            padding: 12px 15px;
            border: 2px solid #ddd;
            border-radius: 25px;
            outline: none;
            font-size: 1em;
            transition: all 0.3s ease;
        }

        .chatbot-input input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(27, 93, 164, 0.1);
        }

        .chatbot-input button {
            background: var(--gradient-accent);
            color: white;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1.2em;
            box-shadow: 0 4px 12px rgba(255, 140, 0, 0.3);
        }

        .chatbot-input button:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 15px rgba(255, 140, 0, 0.4);
        }

        /* Animations */
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(3deg); }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes messageSlide {
            from {
                opacity: 0;
                transform: translateY(15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Buttons */
        .btn {
            padding: 15px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            transition: all 0.4s ease;
            border: none;
            cursor: pointer;
            font-size: 1.1em;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            position: relative;
            overflow: hidden;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-primary {
            background: var(--gradient-primary);
            color: white;
            box-shadow: 0 10px 30px rgba(27, 93, 164, 0.4);
        }

        .btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.25);
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .footer-content {
                grid-template-columns: 1fr 1fr;
                gap: 2rem;
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            
            .mobile-menu-btn {
                display: block;
            }
            
            .footer-content {
                grid-template-columns: 1fr;
            }
            
            .blog-hero h1 {
                font-size: 2.2em;
            }
            
            .blog-grid {
                grid-template-columns: 1fr;
            }
            
            .article-page {
                padding: 2rem 1.5rem;
            }
            
            .article-header h1 {
                font-size: 2em;
            }
            
            .article-meta-detailed {
                flex-direction: column;
                gap: 1rem;
            }
            
            .comments-section {
                padding: 2rem 1.5rem;
            }
            
            .chatbot-window {
                width: 320px;
                right: -10px;
            }
            
            .nav-cta {
                padding: 10px 20px;
                min-width: 120px;
            }
        }
    </style>
</head>
<body>
    <!-- Loading Screen -->
    <div class="loading-screen" id="loadingScreen">
        <div class="loader"></div>
        <h2 style="color: white; margin-top: 20px;">Cargando Blog...</h2>
    </div>

    <!-- Navigation -->
    <nav class="navbar" id="navbar">
        <div class="nav-content">
            <a href="index.php" class="logo">
                <img src="assets/images/logo.png" alt="Legalúdico" class="logo-img">
                <div class="logo-text">
                    <span class="logo-LE">LE</span>
                    <span class="logo-GA">GA</span>
                    <span class="logo-LÚ">LÚ</span>
                    <span class="logo-DI">DI</span>
                    <span class="logo-CO">CO</span>
                </div>
            </a>
            <div class="nav-links">
                <a href="index.php#about">Nosotros</a>
                <a href="index.php#features">Talleres</a>
                <a href="index.php#demo">Demo</a>
                <a href="index.php#testimonials">Testimonios</a>
                <a href="index.php#booking">Reservar</a>
                <a href="blog.php">Blog</a>
                <a href="index.php#contact" class="nav-cta">Contacto</a>
            </div>
            <button class="mobile-menu-btn" id="mobileMenuBtn">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div class="mobile-menu" id="mobileMenu">
        <button class="close-menu" id="closeMenu">
            <i class="fas fa-times"></i>
        </button>
        <div class="mobile-nav-links">
            <a href="index.php#about" onclick="closeMobileMenu()">Nosotros</a>
            <a href="index.php#features" onclick="closeMobileMenu()">Talleres</a>
            <a href="index.php#demo" onclick="closeMobileMenu()">Demo</a>
            <a href="index.php#testimonials" onclick="closeMobileMenu()">Testimonios</a>
            <a href="index.php#booking" onclick="closeMobileMenu()">Reservar</a>
            <a href="blog.php" onclick="closeMobileMenu()">Blog</a>
            <a href="index.php#contact" onclick="closeMobileMenu()" class="mobile-cta">Contacto</a>
        </div>
    </div>

    <!-- Mensaje de confirmación -->
    <?php if (isset($_SESSION['message'])): ?>
    <div class="alert-message" id="alertMessage">
        <div class="alert-content">
            <i class="fas fa-check-circle" style="font-size: 1.5em;"></i>
            <div>
                <p style="margin: 0; font-size: 1.1em;"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></p>
            </div>
            <span class="close-alert" onclick="closeAlert()">&times;</span>
        </div>
    </div>
    <?php endif; ?>

    <?php if ($articulo_actual): ?>
        <!-- Página de artículo individual -->
        <div class="breadcrumb">
            <div class="blog-container">
                <a href="blog.php">Blog</a> &gt; 
                <a href="blog.php?categoria=<?php echo urlencode($articulo_actual['categoria']); ?>">
                    <?php echo $articulo_actual['categoria']; ?>
                </a> &gt; 
                <span><?php echo $articulo_actual['titulo']; ?></span>
            </div>
        </div>

        <section class="blog-content">
            <div class="blog-container">
                <article class="article-page">
                    <header class="article-header">
                        <h1><?php echo $articulo_actual['titulo']; ?></h1>
                        <div class="article-meta-detailed">
                            <div class="article-meta-item">
                                <i class="fas fa-user"></i>
                                <span><?php echo $articulo_actual['autor']; ?></span>
                            </div>
                            <div class="article-meta-item">
                                <i class="fas fa-calendar"></i>
                                <span><?php echo date('d/m/Y', strtotime($articulo_actual['fecha'])); ?></span>
                            </div>
                            <div class="article-meta-item">
                                <i class="fas fa-clock"></i>
                                <span><?php echo $articulo_actual['tiempo_lectura']; ?> de lectura</span>
                            </div>
                            <div class="article-meta-item">
                                <i class="fas fa-tag"></i>
                                <span><?php echo $articulo_actual['categoria']; ?></span>
                            </div>
                        </div>
                    </header>

                    <div class="article-image">
                        <i class="fas fa-book-open"></i>
                    </div>

                    <div class="article-content-detailed">
                        <?php echo $articulo_actual['contenido']; ?>
                    </div>
                </article>

                <!-- Sección de Comentarios -->
                <section class="comments-section">
                    <h3>💬 Deja tu Comentario</h3>
                    
                    <form class="comment-form" method="POST">
                        <input type="hidden" name="articulo_id" value="<?php echo $articulo_actual['id']; ?>">
                        
                        <div class="form-group">
                            <label for="nombre"><i class="fas fa-user"></i> Nombre</label>
                            <input type="text" id="nombre" name="nombre" required placeholder="Tu nombre completo">
                        </div>
                        
                        <div class="form-group">
                            <label for="email"><i class="fas fa-envelope"></i> Email</label>
                            <input type="email" id="email" name="email" required placeholder="tu@email.com">
                        </div>
                        
                        <div class="form-group">
                            <label for="comentario"><i class="fas fa-comment"></i> Comentario</label>
                            <textarea id="comentario" name="comentario" required placeholder="Comparte tus pensamientos sobre este artículo..."></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i> Publicar Comentario
                        </button>
                    </form>

                    <div class="comments-list">
                        <h4>Comentarios (Próximamente)</h4>
                        <p>¡Estamos trabajando en el sistema de comentarios! Mientras tanto, puedes contactarnos directamente.</p>
                    </div>
                </section>
            </div>
        </section>

    <?php else: ?>
        <!-- Listado de artículos -->
        <section class="blog-hero">
            <div class="blog-hero-content">
                <h1>Blog Legalúdico</h1>
                <p>Descubre artículos, consejos y recursos sobre educación jurídica infantil</p>
            </div>
        </section>

        <section class="blog-content">
            <div class="blog-container">
                <!-- Categorías -->
                <div class="categories-section">
                    <h3 style="text-align: center; margin-bottom: 1.5rem; color: var(--primary);">Categorías</h3>
                    <div class="categories-grid">
                        <button class="category-btn active">Todos</button>
                        <button class="category-btn">Estrategias Educativas</button>
                        <button class="category-btn">Actividades Prácticas</button>
                        <button class="category-btn">Guías para Padres</button>
                        <button class="category-btn">Investigación</button>
                    </div>
                </div>

                <!-- Grid de Artículos -->
                <div class="blog-grid">
                    <?php foreach ($articulos as $articulo): ?>
                    <article class="article-card" onclick="window.location.href='blog.php?id=<?php echo $articulo['id']; ?>'">
                        <div class="article-image">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category"><?php echo $articulo['categoria']; ?></span>
                                <span><?php echo date('d/m/Y', strtotime($articulo['fecha'])); ?></span>
                            </div>
                            <h3><?php echo $articulo['titulo']; ?></h3>
                            <p><?php echo $articulo['resumen']; ?></p>
                            <div class="article-meta">
                                <span><i class="fas fa-user"></i> <?php echo $articulo['autor']; ?></span>
                                <span><i class="fas fa-clock"></i> <?php echo $articulo['tiempo_lectura']; ?></span>
                            </div>
                            <a href="blog.php?id=<?php echo $articulo['id']; ?>" class="read-more">
                                Leer más <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>
                    <?php endforeach; ?>
                </div>

                <!-- Newsletter -->
                <div class="newsletter-section" style="background: var(--gradient-primary); color: white; padding: 3rem; border-radius: 20px; text-align: center;">
                    <h3 style="margin-bottom: 1rem;">📧 Suscríbete a nuestro Blog</h3>
                    <p style="margin-bottom: 2rem; opacity: 0.9;">Recibe los últimos artículos y recursos sobre educación jurídica infantil</p>
                    <form style="display: flex; gap: 1rem; max-width: 400px; margin: 0 auto;">
                        <input type="email" placeholder="tu@email.com" style="flex: 1; padding: 12px 15px; border: none; border-radius: 25px; font-size: 1em;">
                        <button type="submit" class="btn" style="background: var(--gradient-accent); color: white; border: none; padding: 12px 25px; border-radius: 25px; cursor: pointer;">
                            Suscribir
                        </button>
                    </form>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-logo">
                <img src="assets/images/logo.png" alt="Legalúdico" class="footer-logo-img">
                <p class="footer-tagline">Transformando la educación jurídica en una experiencia divertida y memorable para niños y adolescentes.</p>
                <div class="social-links">
                    <a href="https://instagram.com/legaludico" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://tiktok.com/@legaludico" target="_blank">
                        <i class="fab fa-tiktok"></i>
                    </a>
                    <a href="https://wa.me/573105620186" target="_blank">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>
            
            <div class="footer-links">
                <h4>Talleres</h4>
                <ul>
                    <li><a href="index.php#features">Ciudad Feliz</a></li>
                    <li><a href="index.php#features">Pintando Derechos</a></li>
                    <li><a href="index.php#features">Semáforo Legal</a></li>
                    <li><a href="index.php#features">Super Héroes</a></li>
                    <li><a href="index.php#features">Mini Congreso</a></li>
                </ul>
            </div>
            
            <div class="footer-links">
                <h4>Enlaces</h4>
                <ul>
                    <li><a href="index.php#about">Nosotros</a></li>
                    <li><a href="index.php#features">Talleres</a></li>
                    <li><a href="index.php#demo">Demo</a></li>
                    <li><a href="index.php#testimonials">Testimonios</a></li>
                    <li><a href="index.php#booking">Reservar</a></li>
                    <li><a href="blog.php">Blog</a></li>
                </ul>
            </div>
            
            <div class="footer-links">
                <h4>Legal</h4>
                <ul>
                    <li><a href="#">Términos y Condiciones</a></li>
                    <li><a href="#">Política de Privacidad</a></li>
                    <li><a href="#">Aviso Legal</a></li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; 2024 Legalúdico. Todos los derechos reservados. | Formando pequeños ciudadanos del futuro</p>
        </div>
    </footer>

    <!-- Chatbot -->
    <div class="chatbot-container">
        <div class="chatbot-toggle" id="chatbotToggle"></div>
        <div class="chatbot-window" id="chatbotWindow">
            <div class="chatbot-header">
                <h4>Lexi - Asistente Legalúdico</h4>
                <p>¿En qué puedo ayudarte?</p>
            </div>
            <div class="chatbot-messages" id="chatbotMessages">
                <div class="message bot-message">
                    ¡Hola! Soy Lexi. ¿Te gustaría saber más sobre nuestros artículos del blog o tienes alguna pregunta?
                </div>
            </div>
            <div class="chatbot-input">
                <input type="text" id="chatbotInput" placeholder="Escribe tu pregunta...">
                <button onclick="sendMessage()">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </div>
        </div>
    </div>

    <script>
        // JavaScript completo
        document.addEventListener('DOMContentLoaded', function() {
            // Loading screen
            setTimeout(() => {
                const loadingScreen = document.getElementById('loadingScreen');
                if (loadingScreen) {
                    loadingScreen.style.opacity = '0';
                    setTimeout(() => {
                        loadingScreen.style.display = 'none';
                    }, 500);
                }
            }, 1500);

            // Navbar scroll effect
            window.addEventListener('scroll', function() {
                const navbar = document.getElementById('navbar');
                if (navbar) {
                    if (window.scrollY > 100) {
                        navbar.classList.add('scrolled');
                    } else {
                        navbar.classList.remove('scrolled');
                    }
                }
            });

            // Mobile menu
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const closeMenu = document.getElementById('closeMenu');
            const mobileMenu = document.getElementById('mobileMenu');

            if (mobileMenuBtn && closeMenu && mobileMenu) {
                mobileMenuBtn.addEventListener('click', function() {
                    mobileMenu.classList.add('active');
                    document.body.style.overflow = 'hidden';
                });

                closeMenu.addEventListener('click', function() {
                    mobileMenu.classList.remove('active');
                    document.body.style.overflow = 'auto';
                });
            }

            function closeMobileMenu() {
                if (mobileMenu) {
                    mobileMenu.classList.remove('active');
                    document.body.style.overflow = 'auto';
                }
            }

            // Close alert
            function closeAlert() {
                const alert = document.getElementById('alertMessage');
                if (alert) {
                    alert.style.display = 'none';
                }
            }

            // Auto-close alert after 8 seconds
            setTimeout(() => {
                closeAlert();
            }, 8000);

            // Make article cards clickable
            const articleCards = document.querySelectorAll('.article-card');
            articleCards.forEach(card => {
                card.style.cursor = 'pointer';
                card.addEventListener('click', function(e) {
                    if (e.target.tagName !== 'A') {
                        const link = card.querySelector('a');
                        if (link) {
                            window.location.href = link.href;
                        }
                    }
                });
            });
        });

        // Chatbot functionality
        const chatbotToggle = document.getElementById('chatbotToggle');
        const chatbotWindow = document.getElementById('chatbotWindow');

        if (chatbotToggle && chatbotWindow) {
            chatbotToggle.addEventListener('click', function() {
                chatbotWindow.style.display = chatbotWindow.style.display === 'flex' ? 'none' : 'flex';
            });
        }

        function sendMessage() {
            const input = document.getElementById('chatbotInput');
            const messages = document.getElementById('chatbotMessages');
            
            if (!input || !messages) return;
            
            const message = input.value.trim();
            
            if (message) {
                // Add user message
                const userMessage = document.createElement('div');
                userMessage.className = 'message user-message';
                userMessage.textContent = message;
                messages.appendChild(userMessage);
                
                // Clear input
                input.value = '';
                
                // Simulate bot response
                setTimeout(() => {
                    const botMessage = document.createElement('div');
                    botMessage.className = 'message bot-message';
                    
                    // Blog-specific responses
                    const responses = {
                        'blog': 'Tenemos artículos sobre educación jurídica infantil, estrategias para padres, y actividades prácticas. ¿Te interesa algún tema específico?',
                        'artículo': 'Puedes explorar nuestros artículos sobre cómo enseñar derechos a niños, actividades prácticas y guías para padres.',
                        'derechos': 'Tenemos varios artículos sobre cómo enseñar derechos humanos a los niños de forma divertida y efectiva.',
                        'actividades': 'En nuestro blog encontrarás actividades prácticas para enseñar conceptos jurídicos a niños de diferentes edades.',
                        'padres': 'Tenemos guías especiales para padres que quieran enseñar sobre justicia y derechos en casa.',
                        'hola': '¡Hola! Soy Lexi, tu asistente del blog Legalúdico. ¿En qué puedo ayudarte?'
                    };
                    
                    const lowerMessage = message.toLowerCase();
                    let response = 'Puedo ayudarte con información sobre nuestros artículos del blog. ¿Te interesa algún tema específico como derechos infantiles, actividades prácticas o guías para padres?';
                    
                    for (const [key, value] of Object.entries(responses)) {
                        if (lowerMessage.includes(key)) {
                            response = value;
                            break;
                        }
                    }
                    
                    botMessage.textContent = response;
                    messages.appendChild(botMessage);
                    messages.scrollTop = messages.scrollHeight;
                }, 1000);
                
                messages.scrollTop = messages.scrollHeight;
            }
        }

        // Enter key for chatbot
        const chatbotInput = document.getElementById('chatbotInput');
        if (chatbotInput) {
            chatbotInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    sendMessage();
                }
            });
        }
    </script>
</body>
</html>