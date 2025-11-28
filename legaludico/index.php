<?php
session_start();

// Procesar mensajes de éxito/error
$message = '';
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}

// Procesar formulario si se envió
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['form_type'])) {
    $form_type = $_POST['form_type'];
    
    if ($form_type == 'booking') {
        // Datos del formulario
        $colegio = htmlspecialchars($_POST['colegio']);
        $contacto = htmlspecialchars($_POST['contacto']);
        $email = htmlspecialchars($_POST['email']);
        $telefono = htmlspecialchars($_POST['telefono']);
        $grado = htmlspecialchars($_POST['grado']);
        $estudiantes = htmlspecialchars($_POST['estudiantes']);
        $taller = htmlspecialchars($_POST['taller']);
        $notas = htmlspecialchars($_POST['notas']);
        $fecha = htmlspecialchars($_POST['fecha']);
        $horario = htmlspecialchars($_POST['horario']);
        
        // Validación básica
        if (empty($colegio) || empty($contacto) || empty($email) || empty($telefono)) {
            $_SESSION['message'] = "❌ Por favor complete todos los campos obligatorios.";
        } else {
            // Configuración de correo
            $to_email = "legaludico@gmail.com";
            $subject = "Legalúdico - Nueva Reserva de Taller";
            
            // Construir mensaje HTML
            $message_body = "
            <!DOCTYPE html>
            <html>
            <head>
                <style>
                    body { font-family: Arial, sans-serif; }
                    .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                    .header { background: #1b5da4; color: white; padding: 20px; text-align: center; }
                    .content { padding: 20px; background: #f9f9f9; }
                    .field { margin-bottom: 10px; padding: 10px; background: white; border-radius: 5px; }
                    .label { font-weight: bold; color: #1b5da4; }
                    .footer { background: #3b9442; color: white; padding: 15px; text-align: center; }
                </style>
            </head>
            <body>
                <div class='container'>
                    <div class='header'>
                        <h2>¡NUEVA RESERVA DE TALLER!</h2>
                        <p>Legalúdico - Formando Pequeños Ciudadanos</p>
                    </div>
                    <div class='content'>
                        <div class='field'><span class='label'>Colegio:</span> $colegio</div>
                        <div class='field'><span class='label'>Contacto:</span> $contacto</div>
                        <div class='field'><span class='label'>Email:</span> $email</div>
                        <div class='field'><span class='label'>Teléfono:</span> $telefono</div>
                        <div class='field'><span class='label'>Grado:</span> $grado</div>
                        <div class='field'><span class='label'>Estudiantes:</span> $estudiantes</div>
                        <div class='field'><span class='label'>Taller:</span> $taller</div>
                        <div class='field'><span class='label'>Fecha:</span> $fecha</div>
                        <div class='field'><span class='label'>Horario:</span> $horario</div>
                        <div class='field'><span class='label'>Notas:</span> $notas</div>
                    </div>
                    <div class='footer'>
                        <p>Fecha de envío: " . date('d/m/Y H:i:s') . "</p>
                    </div>
                </div>
            </body>
            </html>
            ";
            
            // Cabeceras para email HTML
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: Legalúdico <no-reply@legaludico.com>" . "\r\n";
            $headers .= "Reply-To: $email" . "\r\n";
            $headers .= "X-Mailer: PHP/" . phpversion();
            
            // Enviar email
            if (mail($to_email, $subject, $message_body, $headers)) {
                $_SESSION['message'] = "✅ ¡Gracias $contacto! Tu reserva ha sido enviada exitosamente. Te contactaremos pronto al $telefono para confirmar los detalles.";
            } else {
                $_SESSION['message'] = "❌ Error al enviar el formulario. Por favor intenta nuevamente o contáctanos directamente al +57 310 562 0186";
            }
        }
        
        header("Location: index.php#booking");
        exit();
    }
    
    if ($form_type == 'contact') {
        // Procesar formulario de contacto
        $nombre = htmlspecialchars($_POST['nombre']);
        $email = htmlspecialchars($_POST['email']);
        $asunto = htmlspecialchars($_POST['asunto']);
        $mensaje = htmlspecialchars($_POST['mensaje']);
        
        // Validación básica
        if (empty($nombre) || empty($email) || empty($asunto) || empty($mensaje)) {
            $_SESSION['message'] = "❌ Por favor complete todos los campos del formulario de contacto.";
        } else {
            // Configuración de correo
            $to_email = "legaludico@gmail.com";
            $subject = "Legalúdico - Mensaje de Contacto: $asunto";
            
            // Construir mensaje HTML
            $message_body = "
            <!DOCTYPE html>
            <html>
            <head>
                <style>
                    body { font-family: Arial, sans-serif; }
                    .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                    .header { background: #1b5da4; color: white; padding: 20px; text-align: center; }
                    .content { padding: 20px; background: #f9f9f9; }
                    .field { margin-bottom: 10px; padding: 10px; background: white; border-radius: 5px; }
                    .label { font-weight: bold; color: #1b5da4; }
                    .footer { background: #3b9442; color: white; padding: 15px; text-align: center; }
                </style>
            </head>
            <body>
                <div class='container'>
                    <div class='header'>
                        <h2>¡NUEVO MENSAJE DE CONTACTO!</h2>
                        <p>Legalúdico - Formando Pequeños Ciudadanos</p>
                    </div>
                    <div class='content'>
                        <div class='field'><span class='label'>Nombre:</span> $nombre</div>
                        <div class='field'><span class='label'>Email:</span> $email</div>
                        <div class='field'><span class='label'>Asunto:</span> $asunto</div>
                        <div class='field'><span class='label'>Mensaje:</span> $mensaje</div>
                    </div>
                    <div class='footer'>
                        <p>Fecha de envío: " . date('d/m/Y H:i:s') . "</p>
                    </div>
                </div>
            </body>
            </html>
            ";
            
            // Cabeceras para email HTML
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: Legalúdico <no-reply@legaludico.com>" . "\r\n";
            $headers .= "Reply-To: $email" . "\r\n";
            $headers .= "X-Mailer: PHP/" . phpversion();
            
            // Enviar email
            if (mail($to_email, $subject, $message_body, $headers)) {
                $_SESSION['message'] = "✅ ¡Gracias $nombre! Tu mensaje ha sido enviado exitosamente. Te responderemos pronto.";
            } else {
                $_SESSION['message'] = "❌ Error al enviar el mensaje. Por favor intenta nuevamente o contáctanos directamente al +57 310 562 0186";
            }
        }
        
        header("Location: index.php#contact");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Legalúdico - Plataforma Educativa Infantil Interactiva</title>
    <meta name="description" content="Legalúdico - Enseñando derechos y deberes a niños y adolescentes a través del juego y la creatividad. Talleres interactivos de educación jurídica.">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
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

        /* Navigation Mejorada */
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

        /* Lexi Alert */
        .lexi-alert {
            position: fixed;
            top: 120px;
            right: 30px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
            z-index: 9998;
            animation: slideInRight 0.5s ease;
            border-left: 5px solid #FFD700;
            max-width: 300px;
            display: none;
        }

        .lexi-alert-content {
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .lexi-avatar {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #FFD700, #cf2328);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8em;
            flex-shrink: 0;
        }

        .lexi-message {
            flex: 1;
        }

        .lexi-message h4 {
            color: #FF8C00;
            margin-bottom: 5px;
            font-size: 1.1em;
        }

        .lexi-message p {
            color: var(--text);
            font-size: 0.9em;
            margin: 0;
        }

        .close-lexi {
            background: none;
            border: none;
            color: #999;
            cursor: pointer;
            font-size: 1.2em;
            padding: 5px;
        }

        .close-lexi:hover {
            color: var(--accent);
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(100px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Hero Section Mejorada */
        .hero {
            padding: 180px 2rem 120px;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
            background: var(--gradient-hero);
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="%23ffffff08" points="0,1000 1000,0 1000,1000"/><circle fill="%23ffffff05" cx="200" cy="200" r="150"/><circle fill="%23ffffff03" cx="800" cy="300" r="200"/></svg>');
            animation: float 8s ease-in-out infinite;
        }

        .hero-content {
            max-width: 1000px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        .hero h1 {
            font-size: 3.5em;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 8px rgba(0,0,0,0.3);
            animation: slideUp 1s ease;
            color: #ffffff;
            line-height: 1.2;
            font-weight: 700;
        }

        .hero p {
            font-size: 1.4em;
            margin-bottom: 3rem;
            opacity: 0.95;
            animation: slideUp 1s ease 0.2s both;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.2);
            font-weight: 400;
        }

        .cta-buttons {
            display: flex;
            gap: 2rem;
            justify-content: center;
            flex-wrap: wrap;
            animation: slideUp 1s ease 0.4s both;
        }

        .btn {
            padding: 18px 35px;
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

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.6s ease;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn-primary {
            background: var(--gradient-primary);
            color: white;
            box-shadow: 0 10px 30px rgba(27, 93, 164, 0.4);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.95);
            color: var(--primary);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255,255,255,0.5);
        }

        .btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.25);
        }

        .btn-primary:hover {
            box-shadow: 0 15px 35px rgba(27, 93, 164, 0.5);
        }

        .btn-secondary:hover {
            background: white;
            color: var(--primary);
        }

        /* Stats Section Mejorada */
        .stats {
            padding: 80px 2rem;
            background: white;
            position: relative;
        }

        .stats::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--gradient-accent);
        }

        .stats-grid {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            text-align: center;
        }

        .stat-item {
            padding: 2.5rem 1rem;
            background: var(--light);
            border-radius: 20px;
            transition: all 0.4s ease;
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
            cursor: pointer;
            transform: translateY(0);
        }

        .stat-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--gradient-accent);
        }

        .stat-item:hover {
            transform: translateY(-15px) scale(1.05);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
            border-color: transparent;
        }

        .stat-icon {
            font-size: 3em;
            margin-bottom: 1rem;
            color: var(--primary);
            transition: transform 0.4s ease;
        }

        .stat-item:hover .stat-icon {
            transform: scale(1.2);
        }

        .stat-number {
            font-size: 3.5em;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 0.5rem;
            font-family: 'Arial Black', sans-serif;
            transition: color 0.3s ease;
        }

        .stat-item:hover .stat-number {
            color: var(--accent);
        }

        .stat-label {
            font-size: 1.3em;
            color: var(--dark);
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .stat-item:hover .stat-label {
            color: var(--success);
        }

        /* About Section */
        .about {
            padding: 100px 2rem;
            background: linear-gradient(135deg, var(--light) 0%, #ffffff 100%);
        }

        .about-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .about-content h2 {
            font-size: 2.8em;
            margin-bottom: 1.5rem;
            color: var(--primary);
            position: relative;
            font-weight: 700;
        }

        .about-content h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 80px;
            height: 4px;
            background: var(--accent);
            border-radius: 2px;
        }

        .about-content p {
            font-size: 1.1em;
            margin-bottom: 2rem;
            color: var(--text);
            line-height: 1.8;
        }

        .about-features {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .about-feature {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            padding: 1.5rem;
            border-radius: 12px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .about-feature:hover {
            background: rgba(27, 93, 164, 0.05);
            transform: translateX(10px);
        }

        .about-feature i {
            font-size: 1.5em;
            color: var(--success);
            background: rgba(206, 21, 108, 0.1);
            padding: 10px;
            border-radius: 10px;
            flex-shrink: 0;
            transition: all 0.3s ease;
        }

        .about-feature:hover i {
            transform: scale(1.2);
            background: var(--success);
            color: white;
        }

        .about-image {
            background: var(--gradient-accent);
            border-radius: 20px;
            padding: 2rem;
            color: white;
            text-align: center;
            box-shadow: 0 20px 40px rgba(255, 140, 0, 0.3);
            position: relative;
            overflow: hidden;
            cursor: pointer;
            transition: all 0.4s ease;
        }

        .about-image:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 30px 50px rgba(255, 140, 0, 0.4);
        }

        .about-image::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
            transform: rotate(45deg);
            animation: shine 3s infinite;
        }

        @keyframes shine {
            0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
            100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
        }

        /* Features Grid Mejorada */
        .features {
            padding: 100px 2rem;
            background: white;
        }

        .section-title {
            text-align: center;
            font-size: 2.8em;
            margin-bottom: 1rem;
            color: var(--dark);
            position: relative;
            font-weight: 700;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: 5px;
            background: var(--gradient-accent);
            border-radius: 3px;
        }

        .section-subtitle {
            text-align: center;
            font-size: 1.2em;
            margin-bottom: 4rem;
            color: var(--text);
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .features-grid {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(380px, 1fr));
            gap: 3rem;
        }

        .feature-card {
            background: white;
            padding: 3rem 2.5rem;
            border-radius: 20px;
            text-align: center;
            transition: all 0.4s ease;
            border: 2px solid transparent;
            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
            position: relative;
            overflow: hidden;
            cursor: pointer;
            transform: translateY(0);
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--gradient-accent);
        }

        .feature-card:hover {
            transform: translateY(-15px) scale(1.03);
            box-shadow: 0 25px 50px rgba(0,0,0,0.15);
            border-color: transparent;
        }

        .feature-icon {
            font-size: 4em;
            margin-bottom: 2rem;
            display: block;
            transition: all 0.4s ease;
        }

        .feature-card:hover .feature-icon {
            transform: scale(1.2) rotate(5deg);
        }

        .feature-card h3 {
            color: var(--primary);
            margin-bottom: 1.5rem;
            font-size: 1.6em;
            font-weight: 700;
            transition: color 0.3s ease;
        }

        .feature-card:hover h3 {
            color: var(--accent);
        }

        .feature-card p {
            color: #666;
            line-height: 1.8;
            margin-bottom: 2rem;
            font-size: 1em;
            transition: color 0.3s ease;
        }

        .feature-card:hover p {
            color: var(--dark);
        }

        .age-badge {
            display: inline-block;
            background: var(--gradient-primary);
            color: white;
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 0.9em;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(27, 93, 164, 0.3);
            transition: all 0.3s ease;
        }

        .feature-card:hover .age-badge {
            transform: scale(1.1);
            box-shadow: 0 6px 15px rgba(27, 93, 164, 0.5);
        }

        /* Interactive Demo */
        .demo {
            padding: 100px 2rem;
            background: var(--gradient-hero);
            color: white;
            position: relative;
        }

        .demo-container {
            max-width: 900px;
            margin: 0 auto;
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .demo-game {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(20px);
            padding: 3rem;
            border-radius: 20px;
            margin: 3rem 0;
            border: 2px solid rgba(255,255,255,0.2);
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }

        .scenario {
            background: white;
            color: var(--dark);
            padding: 2rem;
            border-radius: 15px;
            margin-bottom: 2rem;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            border-left: 5px solid var(--accent);
        }

        .choices {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .choice-btn {
            background: var(--primary);
            color: white;
            padding: 1.5rem 1rem;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1.1em;
            font-weight: 500;
            border: 2px solid transparent;
            transform: translateY(0);
        }

        .choice-btn:hover {
            background: var(--secondary);
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            border-color: rgba(255,255,255,0.3);
        }

        .feedback-container {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            margin-top: 2rem;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            border: 2px solid #e0e0e0;
            display: none;
        }

        .feedback-content {
            display: flex;
            align-items: center;
            gap: 20px;
            text-align: left;
        }

        .feedback-icon {
            font-size: 2.5em;
            flex-shrink: 0;
        }

        .feedback-text h4 {
            margin-bottom: 10px;
            font-size: 1.3em;
        }

        .feedback-text p {
            margin: 0;
            color: var(--text);
            line-height: 1.6;
        }

        .feedback-correct {
            border-left: 5px solid #28a745;
        }

        .feedback-correct .feedback-icon {
            color: #28a745;
        }

        .feedback-correct .feedback-text h4 {
            color: #28a745;
        }

        .feedback-wrong {
            border-left: 5px solid #dc3545;
        }

        .feedback-wrong .feedback-icon {
            color: #dc3545;
        }

        .feedback-wrong .feedback-text h4 {
            color: #dc3545;
        }

        .next-question-btn {
            background: var(--gradient-primary);
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1.1em;
            font-weight: 600;
            margin-top: 1.5rem;
            display: none;
            box-shadow: 0 4px 12px rgba(27, 93, 164, 0.3);
            transform: translateY(0);
        }

        .next-question-btn:hover {
            background: var(--gradient-primary);
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 6px 18px rgba(27, 93, 164, 0.4);
        }

        /* CALENDAR STYLES */
        .calendar {
            background: white;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            border: 2px solid #f0f0f0;
        }

        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--light);
        }

        .calendar-header h3 {
            color: var(--primary);
            font-size: 1.5em;
            font-weight: 700;
        }

        .calendar-nav {
            display: flex;
            gap: 1rem;
        }

        .nav-btn {
            background: var(--light);
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1em;
            color: var(--primary);
        }

        .nav-btn:hover {
            background: var(--primary);
            color: white;
            transform: scale(1.1);
        }

        .calendar-days-header {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 8px;
            margin-bottom: 1rem;
            text-align: center;
            font-weight: bold;
            color: var(--primary);
            font-size: 1em;
        }

        .calendar-days {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 8px;
        }

        .calendar-day {
            padding: 15px 5px;
            text-align: center;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            font-weight: 600;
            position: relative;
            font-size: 1em;
            transform: translateY(0);
        }

        .calendar-day:hover {
            background: var(--light);
            border-color: var(--primary);
            transform: translateY(-3px) scale(1.05);
        }

        .calendar-day.selected {
            background: var(--gradient-primary);
            color: white;
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(27, 93, 164, 0.3);
        }

        .calendar-day.disabled {
            color: #ccc;
            cursor: not-allowed;
            background: #f8f8f8;
        }

        .calendar-day.disabled:hover {
            background: #f8f8f8;
            border-color: transparent;
            transform: none;
        }

        .calendar-day.today {
            border: 2px solid var(--accent);
            background: rgba(227, 124, 44, 0.1);
            color: var(--accent);
        }

        .time-slots {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 2px solid var(--light);
        }

        .time-slot {
            padding: 12px;
            background: white;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            font-size: 1em;
            transform: translateY(0);
        }

        .time-slot:hover {
            border-color: var(--primary);
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .time-slot.selected {
            background: var(--gradient-primary);
            color: white;
            border-color: var(--primary);
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(27, 93, 164, 0.3);
        }

        .time-slot.disabled {
            background: #f5f5f5;
            color: #999;
            cursor: not-allowed;
            border-color: #e0e0e0;
        }

        .time-slot.disabled:hover {
            transform: none;
            border-color: #e0e0e0;
            box-shadow: none;
        }

        .selected-info {
            background: linear-gradient(45deg, var(--light), #ffffff);
            padding: 1.2rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            border-left: 4px solid var(--primary);
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        .selected-info h4 {
            color: var(--primary);
            margin-bottom: 0.5rem;
            font-size: 1.2em;
        }

        /* Booking System */
        .booking {
            padding: 100px 2rem;
            background: linear-gradient(135deg, var(--light) 0%, #ffffff 100%);
        }

        .booking-container {
            max-width: 1100px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: start;
        }

        .booking-form {
            background: white;
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 15px 50px rgba(0,0,0,0.1);
            border: 2px solid #f0f0f0;
            position: relative;
        }

        .booking-form::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--gradient-accent);
            border-radius: 20px 20px 0 0;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.8rem;
            font-weight: 600;
            color: var(--dark);
            font-size: 1em;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 1em;
            transition: all 0.3s ease;
            background: white;
            font-family: inherit;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(27, 93, 164, 0.1);
        }

        /* Submit Button Centered */
        .booking-submit-btn {
            background: var(--gradient-primary);
            color: white;
            padding: 15px 40px;
            border: none;
            border-radius: 50px;
            font-size: 1.1em;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: block;
            margin: 2rem auto 0;
            min-width: 280px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(27, 93, 164, 0.3);
        }

        .booking-submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(27, 93, 164, 0.4);
        }

        /* Testimonials Section */
        .testimonials {
            padding: 100px 2rem;
            background: white;
        }

        .testimonials-grid {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 3rem;
        }

        .testimonial-card {
            background: var(--light);
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
            border-left: 4px solid var(--accent);
            position: relative;
            transition: all 0.4s ease;
            cursor: pointer;
            transform: translateY(0);
        }

        .testimonial-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 15px 35px rgba(0,0,0,0.12);
        }

        .testimonial-card::before {
            content: '"';
            position: absolute;
            top: 20px;
            right: 30px;
            font-size: 4em;
            color: rgba(27, 93, 164, 0.1);
            font-family: serif;
        }

        .testimonial-text {
            font-size: 1em;
            line-height: 1.7;
            margin-bottom: 2rem;
            color: var(--text);
            font-style: italic;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .author-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--gradient-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 1.2em;
        }

        .author-info h4 {
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .author-info p {
            color: #666;
            font-size: 0.9em;
        }

        /* Contact Section */
        .contact {
            padding: 100px 2rem;
            background: var(--gradient-hero);
            color: white;
        }

        .contact-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: start;
        }

        .contact-info {
            padding: 2.5rem;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            border: 2px solid rgba(255,255,255,0.2);
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            margin-bottom: 2rem;
            padding: 1.5rem;
            background: rgba(255,255,255,0.1);
            border-radius: 12px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .contact-item:hover {
            background: rgba(255,255,255,0.2);
            transform: translateX(10px);
        }

        .contact-icon {
            font-size: 2em;
            color: var(--primary);
            background: rgba(255,255,255,0.2);
            padding: 12px;
            border-radius: 12px;
            flex-shrink: 0;
        }

        .contact-details h3 {
            margin-bottom: 0.5rem;
            font-size: 1.2em;
        }

        .contact-form {
            background: white;
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
        }

        .contact-form h3 {
            color: var(--primary);
            margin-bottom: 2rem;
            font-size: 1.8em;
            text-align: center;
        }

        .contact-form .btn {
            display: block;
            margin: 0 auto;
            width: auto;
            min-width: 200px;
            text-align: center;
            justify-content: center;
        }

        /* Footer Mejorado */
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
            height: 100px;
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

        .floating {
            animation: float 4s ease-in-out infinite;
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .hero h1 {
                font-size: 3em;
            }
            
            .about-container {
                grid-template-columns: 1fr;
                gap: 3rem;
            }
            
            .footer-content {
                grid-template-columns: 1fr 1fr;
                gap: 2rem;
            }
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.2em;
            }
            
            .hero p {
                font-size: 1.1em;
            }
            
            .features-grid {
                grid-template-columns: 1fr;
            }
            
            .booking-container {
                grid-template-columns: 1fr;
            }
            
            .contact-container {
                grid-template-columns: 1fr;
            }
            
            .nav-links {
                display: none;
            }
            
            .mobile-menu-btn {
                display: block;
            }
            
            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .btn {
                width: 100%;
                max-width: 300px;
                justify-content: center;
            }
            
            .footer-content {
                grid-template-columns: 1fr;
            }
            
            .section-title {
                font-size: 2.2em;
            }
            
            .chatbot-window {
                width: 320px;
                right: -10px;
            }
            
            .lexi-alert {
                right: 10px;
                left: 10px;
                max-width: none;
            }
            
            .nav-cta {
                padding: 10px 20px;
                min-width: 120px;
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
    </style>
</head>
<body>
    <!-- Loading Screen -->
    <div class="loading-screen" id="loadingScreen">
        <div class="loader"></div>
        <h2 style="color: white; margin-top: 20px;">Cargando Legalúdico...</h2>
        <p style="color: rgba(255,255,255,0.8); margin-top: 10px;">Formando pequeños ciudadanos</p>
    </div>

    <!-- Lexi Alert -->
    <div class="lexi-alert" id="lexiAlert">
        <div class="lexi-alert-content">
            <div class="lexi-avatar">🦊</div>
            <div class="lexi-message">
                <h4>¡Hola! Soy Lexi</h4>
                <p>¿Necesitas ayuda? Pregúntame sobre nuestros talleres</p>
            </div>
            <button class="close-lexi" onclick="closeLexiAlert()">×</button>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="navbar" id="navbar">
        <div class="nav-content">
            <a href="#" class="logo">
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
                <a href="#about">Nosotros</a>
                <a href="#features">Talleres</a>
                <a href="#demo">Demo</a>
                <a href="#testimonials">Testimonios</a>
                <a href="#booking">Reservar</a>
                <a href="blog.php">Blog</a>
                <a href="#contact" class="nav-cta">Contacto</a>
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
            <a href="#about" onclick="closeMobileMenu()">Nosotros</a>
            <a href="#features" onclick="closeMobileMenu()">Talleres</a>
            <a href="#demo" onclick="closeMobileMenu()">Demo</a>
            <a href="#testimonials" onclick="closeMobileMenu()">Testimonios</a>
            <a href="#booking" onclick="closeMobileMenu()">Reservar</a>
            <a href="blog.php" onclick="closeMobileMenu()">Blog</a>
            <a href="#contact" onclick="closeMobileMenu()" class="mobile-cta">Contacto</a>
        </div>
    </div>

    <!-- Mensaje de confirmación -->
    <?php if ($message): ?>
    <div class="alert-message" id="alertMessage">
        <div class="alert-content">
            <i class="fas fa-check-circle" style="font-size: 1.5em;"></i>
            <div>
                <p style="margin: 0; font-size: 1.1em;"><?php echo $message; ?></p>
            </div>
            <span class="close-alert" onclick="closeAlert()">&times;</span>
        </div>
    </div>
    <?php endif; ?>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Formando Pequeños Ciudadanos</h1>
            <p>Transformamos la educación jurídica en una experiencia divertida y memorable para niños y adolescentes a través del juego y la creatividad</p>
            <div class="cta-buttons">
                <a href="#booking" class="btn btn-primary">
                    <i class="fas fa-calendar-check"></i>
                    Reservar Taller
                </a>
                <a href="#features" class="btn btn-secondary">
                    <i class="fas fa-play-circle"></i>
                    Conocer Talleres
                </a>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-icon">👧👦</div>
                <div class="stat-number" data-target="500">0</div>
                <div class="stat-label">Niños Beneficiados</div>
            </div>
            <div class="stat-item">
                <div class="stat-icon">🏫</div>
                <div class="stat-number" data-target="25">0</div>
                <div class="stat-label">Colegios Aliados</div>
            </div>
            <div class="stat-item">
                <div class="stat-icon">⭐</div>
                <div class="stat-number" data-target="98">0</div>
                <div class="stat-label">% Satisfacción</div>
            </div>
            <div class="stat-item">
                <div class="stat-icon">🎯</div>
                <div class="stat-number" data-target="12">0</div>
                <div class="stat-label">Talleres Diferentes</div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about">
        <div class="about-container">
            <div class="about-content">
                <h2>¿Por Qué Legalúdico?</h2>
                <p>En Legalúdico creemos que el derecho no tiene que ser aburrido. Transformamos conceptos jurídicos complejos en experiencias lúdicas que los niños y adolescentes pueden entender, disfrutar y aplicar en su vida diaria.</p>
                <p>Nuestra metodología única combina juego, creatividad y aprendizaje práctico para formar ciudadanos conscientes de sus derechos y responsabilidades desde temprana edad.</p>
                
                <div class="about-features">
                    <div class="about-feature">
                        <i class="fas fa-graduation-cap"></i>
                        <div>
                            <h4>Educación Adaptada</h4>
                            <p>Contenidos diseñados específicamente para cada grupo de edad</p>
                        </div>
                    </div>
                    <div class="about-feature">
                        <i class="fas fa-gamepad"></i>
                        <div>
                            <h4>Enfoque Lúdico</h4>
                            <p>Aprendizaje a través del juego y la experimentación</p>
                        </div>
                    </div>
                    <div class="about-feature">
                        <i class="fas fa-users"></i>
                        <div>
                            <h4>Trabajo en Equipo</h4>
                            <p>Actividades colaborativas que fomentan la convivencia</p>
                        </div>
                    </div>
                    <div class="about-feature">
                        <i class="fas fa-certificate"></i>
                        <div>
                            <h4>Certificación</h4>
                            <p>Diploma de participación al finalizar cada taller</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="about-image">
                <h3 style="font-size: 1.8em; margin-bottom: 1rem;">¡Se Puede Aprender Jugando!</h3>
                <p style="font-size: 1.1em; opacity: 0.9;">Descubre cómo estamos revolucionando la educación jurídica infantil en Colombia</p>
                <div style="margin-top: 2rem; font-size: 4em;">⚖️🎨</div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features">
        <h2 class="section-title">🎮 Nuestros Talleres Interactivos</h2>
        <p class="section-subtitle">Diseñados por expertos en educación y derecho para maximizar el aprendizaje y la diversión</p>
        
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">🏗️</div>
                <h3>Ciudad Feliz</h3>
                <p>Los niños se convierten en urbanistas por un día, construyendo su propia ciudad con material reciclado mientras aprenden sobre normas de convivencia, derechos urbanos y responsabilidades ciudadanas.</p>
                <div class="age-badge">6-9 años</div>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">🎨</div>
                <h3>Pintando Derechos</h3>
                <p>Una experiencia sensorial única donde los más pequeños expresan sus derechos fundamentales a través del arte, desarrollando creatividad mientras internalizan conceptos jurídicos básicos.</p>
                <div class="age-badge">4-7 años</div>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">🚦</div>
                <h3>Semáforo Legal</h3>
                <p>Juego interactivo de colores donde los niños identifican acciones correctas (verde), cuestionables (amarillo) e incorrectas (rojo), aprendiendo mediante movimiento y toma de decisiones.</p>
                <div class="age-badge">8-12 años</div>
            </div>

            <div class="feature-card">
                <div class="feature-icon">🛡️</div>
                <h3>Super Héroes Legales</h3>
                <p>Role-playing educativo donde los niños se convierten en superhéroes que protegen los derechos de los demás, desarrollando empatía y comprensión de la justicia.</p>
                <div class="age-badge">5-8 años</div>
            </div>

            <div class="feature-card">
                <div class="feature-icon">🏛️</div>
                <h3>Mini Congreso</h3>
                <p>Simulación parlamentaria donde los participantes proponen, debaten y votan leyes, desarrollando habilidades de oratoria, negociación y comprensión del proceso legislativo.</p>
                <div class="age-badge">10-14 años</div>
            </div>

            <div class="feature-card">
                <div class="feature-icon">🌍</div>
                <h3>Derechos Globales</h3>
                <p>Viaje interactivo por diferentes culturas para entender los derechos universales, incluyendo elementos de realidad aumentada y experiencias multiculturales.</p>
                <div class="age-badge">12-18 años</div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials">
        <h2 class="section-title">💬 Lo Que Dicen de Nosotros</h2>
        <p class="section-subtitle">Experiencias reales de colegios y padres que han confiado en Legalúdico</p>
        
        <div class="testimonials-grid">
            <div class="testimonial-card">
                <div class="testimonial-text">
                    "Los talleres de Legalúdico transformaron completamente la forma en que nuestros estudiantes entienden sus derechos. La combinación perfecta entre aprendizaje y diversión."
                </div>
                <div class="testimonial-author">
                    <div class="author-avatar">M</div>
                    <div class="author-info">
                        <h4>María González</h4>
                        <p>Directora - Colegio Los Andes</p>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-card">
                <div class="testimonial-text">
                    "Mi hijo llegó emocionado contando todo lo que aprendió sobre sus derechos. Nunca había visto tan interesado en temas legales. ¡Excelente metodología!"
                </div>
                <div class="testimonial-author">
                    <div class="author-avatar">C</div>
                    <div class="author-info">
                        <h4>Carlos Rodríguez</h4>
                        <p>Padre de familia</p>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-card">
                <div class="testimonial-text">
                    "Como profesora, valoro mucho el enfoque pedagógico de Legalúdico. Los materiales son excelentes y los niños realmente internalizan los conceptos a través del juego."
                </div>
                <div class="testimonial-author">
                    <div class="author-avatar">A</div>
                    <div class="author-info">
                        <h4>Ana Martínez</h4>
                        <p>Profesora - Colegio Santa María</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Interactive Demo -->
    <section id="demo" class="demo">
        <div class="demo-container">
            <h2 class="section-title">🎯 Demo Interactivo</h2>
            <p class="section-subtitle" style="color: rgba(255,255,255,0.9);">Experimenta cómo aprenden los niños con nosotros</p>
            
            <div class="demo-game">
                <div class="scenario">
                    <h3><i class="fas fa-question-circle"></i> <span id="question-text">¿Qué harías si ves que un compañero está tomando el almuerzo de otro niño sin permiso mientras el dueño no está mirando?</span></h3>
                </div>
                <div class="choices" id="choices-container">
                    <!-- Las opciones se generan dinámicamente con JavaScript -->
                </div>
                <div class="feedback-container" id="feedback">
                    <div class="feedback-content">
                        <div class="feedback-icon"></div>
                        <div class="feedback-text">
                            <h4></h4>
                            <p></p>
                        </div>
                    </div>
                </div>
                <button class="next-question-btn" id="nextQuestionBtn" onclick="nextQuestion()">Siguiente Pregunta</button>
            </div>
        </div>
    </section>

    <!-- Booking System -->
    <section id="booking" class="booking">
        <h2 class="section-title">📅 Reserva tu Taller</h2>
        <p class="section-subtitle">Lleva la experiencia Legalúdico a tu colegio. Completa el formulario y te contactaremos para coordinar todos los detalles.</p>
        
        <div class="booking-container">
            <div class="calendar">
                <div class="calendar-header">
                    <h3 id="currentMonth">Febrero 2024</h3>
                    <div class="calendar-nav">
                        <button class="nav-btn" onclick="changeMonth(-1)">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="nav-btn" onclick="changeMonth(1)">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
                
                <div class="calendar-days-header">
                    <div>Lun</div>
                    <div>Mar</div>
                    <div>Mié</div>
                    <div>Jue</div>
                    <div>Vie</div>
                    <div>Sáb</div>
                    <div>Dom</div>
                </div>
                
                <div class="calendar-days" id="calendarDays">
                    <!-- Los días se generan con JavaScript -->
                </div>

                <div class="selected-info" id="selectedInfo" style="display: none;">
                    <h4>📅 Fecha Seleccionada</h4>
                    <p id="selectedDateText"></p>
                </div>

                <div class="time-slots" id="timeSlots">
                    <div class="time-slot" data-time="08:00">8:00 AM</div>
                    <div class="time-slot" data-time="10:00">10:00 AM</div>
                    <div class="time-slot" data-time="13:00">1:00 PM</div>
                    <div class="time-slot" data-time="15:00">3:00 PM</div>
                </div>
            </div>
            
            <div class="booking-form">
                <h3 style="color: var(--primary); margin-bottom: 2rem; text-align: center; font-size: 1.8em;">Completa tu Reserva</h3>
                
                <form id="bookingForm" method="POST">
                    <input type="hidden" name="form_type" value="booking">
                    <input type="hidden" name="fecha" id="formFecha">
                    <input type="hidden" name="horario" id="formHorario">
                    
                    <div class="form-group">
                        <label for="bookingName"><i class="fas fa-school"></i> Nombre del Colegio</label>
                        <input type="text" id="bookingName" name="colegio" required placeholder="Ej: Colegio Los Andes">
                    </div>
                    
                    <div class="form-group">
                        <label for="bookingContact"><i class="fas fa-user"></i> Persona de Contacto</label>
                        <input type="text" id="bookingContact" name="contacto" required placeholder="Tu nombre completo">
                    </div>
                    
                    <div class="form-group">
                        <label for="bookingEmail"><i class="fas fa-envelope"></i> Correo Electrónico</label>
                        <input type="email" id="bookingEmail" name="email" required placeholder="tu@colegio.com">
                    </div>
                    
                    <div class="form-group">
                        <label for="bookingPhone"><i class="fas fa-phone"></i> Teléfono</label>
                        <input type="tel" id="bookingPhone" name="telefono" required placeholder="+57 310 123 4567">
                    </div>
                    
                    <div class="form-group">
                        <label for="bookingGrade"><i class="fas fa-graduation-cap"></i> Grado/Nivel</label>
                        <select id="bookingGrade" name="grado" required>
                            <option value="">Selecciona el grado</option>
                            <option value="preescolar">Preescolar</option>
                            <option value="primaria-baja">Primaria (1° - 3°)</option>
                            <option value="primaria-alta">Primaria (4° - 5°)</option>
                            <option value="secundaria">Secundaria (6° - 11°)</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="bookingStudents"><i class="fas fa-users"></i> Número de Estudiantes</label>
                        <input type="number" id="bookingStudents" name="estudiantes" min="10" max="50" required placeholder="Ej: 25">
                    </div>
                    
                    <div class="form-group">
                        <label for="bookingWorkshop"><i class="fas fa-puzzle-piece"></i> Taller de Interés</label>
                        <select id="bookingWorkshop" name="taller" required>
                            <option value="">Selecciona un taller</option>
                            <option value="ciudad-feliz">🏗️ Ciudad Feliz</option>
                            <option value="pintando-derechos">🎨 Pintando Derechos</option>
                            <option value="semaforo-legal">🚦 Semáforo Legal</option>
                            <option value="super-heroes">🛡️ Super Héroes Legales</option>
                            <option value="mini-congreso">🏛️ Mini Congreso</option>
                            <option value="derechos-globales">🌍 Derechos Globales</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="bookingNotes"><i class="fas fa-sticky-note"></i> Notas Adicionales</label>
                        <textarea id="bookingNotes" name="notas" placeholder="Comentarios especiales, necesidades específicas, horarios preferidos, etc." rows="4"></textarea>
                    </div>
                    
                    <button type="submit" class="booking-submit-btn">
                        <i class="fas fa-paper-plane"></i> Enviar Solicitud de Reserva
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <h2 class="section-title" style="color: white;">📞 Contáctanos</h2>
        <p class="section-subtitle" style="color: rgba(255,255,255,0.9);">Estamos aquí para responder todas tus preguntas y ayudarte a llevar Legalúdico a tu colegio</p>
        
        <div class="contact-container">
            <div class="contact-info">
                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="contact-details">
                        <h3>Teléfono</h3>
                        <p>+57 310 562 0186</p>
                    </div>
                </div>
                
                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="contact-details">
                        <h3>Email</h3>
                        <p>legaludico@gmail.com</p>
                    </div>
                </div>
                
                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="contact-details">
                        <h3>Ubicación</h3>
                        <p>Bogotá, Colombia</p>
                    </div>
                </div>
                
                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="contact-details">
                        <h3>Horario de Atención</h3>
                        <p>Lunes a Viernes: 8:00 AM - 6:00 PM</p>
                    </div>
                </div>
                
                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-share-alt"></i>
                    </div>
                    <div class="contact-details">
                        <h3>Síguenos en</h3>
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
                </div>
            </div>
            
            <div class="contact-form">
                <h3>Envíanos un Mensaje</h3>
                <form method="POST">
                    <input type="hidden" name="form_type" value="contact">
                    
                    <div class="form-group">
                        <label for="contactName"><i class="fas fa-user"></i> Nombre Completo</label>
                        <input type="text" id="contactName" name="nombre" required placeholder="Tu nombre completo">
                    </div>
                    
                    <div class="form-group">
                        <label for="contactEmail"><i class="fas fa-envelope"></i> Correo Electrónico</label>
                        <input type="email" id="contactEmail" name="email" required placeholder="tu@email.com">
                    </div>
                    
                    <div class="form-group">
                        <label for="contactSubject"><i class="fas fa-tag"></i> Asunto</label>
                        <input type="text" id="contactSubject" name="asunto" required placeholder="Asunto del mensaje">
                    </div>
                    
                    <div class="form-group">
                        <label for="contactMessage"><i class="fas fa-comment"></i> Mensaje</label>
                        <textarea id="contactMessage" name="mensaje" required placeholder="Escribe tu mensaje aquí..." rows="5"></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i> Enviar Mensaje
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-logo">
                <img src="assets/images/logo.png" alt="Legalúdico" class="footer-logo-img">
                <p class="footer-tagline">Transformando la educación jurídica en una experiencia divertida y memorable para niños, jovenes y adolescentes.</p>
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
                    <li><a href="#features">Ciudad Feliz</a></li>
                    <li><a href="#features">Pintando Derechos</a></li>
                    <li><a href="#features">Semáforo Legal</a></li>
                    <li><a href="#features">Super Héroes</a></li>
                    <li><a href="#features">Mini Congreso</a></li>
                </ul>
            </div>
            
            <div class="footer-links">
                <h4>Enlaces</h4>
                <ul>
                    <li><a href="#about">Nosotros</a></li>
                    <li><a href="#features">Talleres</a></li>
                    <li><a href="#demo">Demo</a></li>
                    <li><a href="#testimonials">Testimonios</a></li>
                    <li><a href="#booking">Reservar</a></li>
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
            <p>&copy; 2025 Legalúdico. Todos los derechos reservados. | El derecho no tiene que ser aburrido</p>
        </div>
    </footer>

    <!-- Chatbot -->
    <div class="chatbot-container">
        <div class="chatbot-toggle" id="chatbotToggle">
            <!-- El icono se maneja con CSS -->
        </div>
        <div class="chatbot-window" id="chatbotWindow">
            <div class="chatbot-header">
                <h4>Lexi - Asistente Legalúdico</h4>
                <p>¿En qué puedo ayudarte?</p>
            </div>
            <div class="chatbot-messages" id="chatbotMessages">
                <div class="message bot-message">
                    ¡Hola! Soy Lexi, tu asistente. ¿Te gustaría saber más sobre nuestros talleres, precios o tienes alguna pregunta específica?
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
        // Loading Screen
        window.addEventListener('load', function() {
            setTimeout(() => {
                document.getElementById('loadingScreen').style.opacity = '0';
                setTimeout(() => {
                    document.getElementById('loadingScreen').style.display = 'none';
                }, 500);
            }, 2500);
        });

        // Lexi Alert después de 20 segundos
        setTimeout(() => {
            const lexiAlert = document.getElementById('lexiAlert');
            lexiAlert.style.display = 'block';
            
            // Auto cerrar después de 5 segundos
            setTimeout(() => {
                if (lexiAlert.style.display === 'block') {
                    lexiAlert.style.display = 'none';
                }
            }, 10000);
        }, 20000);

        function closeLexiAlert() {
            document.getElementById('lexiAlert').style.display = 'none';
        }

        // Navbar Scroll Effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 100) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Mobile Menu
        document.getElementById('mobileMenuBtn').addEventListener('click', function() {
            document.getElementById('mobileMenu').classList.add('active');
            document.body.style.overflow = 'hidden';
        });

        document.getElementById('closeMenu').addEventListener('click', function() {
            document.getElementById('mobileMenu').classList.remove('active');
            document.body.style.overflow = 'auto';
        });

        function closeMobileMenu() {
            document.getElementById('mobileMenu').classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Stats Counter
        function animateCounter(element, target, duration) {
            let start = 0;
            const increment = target / (duration / 16);
            const timer = setInterval(() => {
                start += increment;
                if (start >= target) {
                    element.textContent = target + '+';
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(start);
                }
            }, 16);
        }

        // Intersection Observer for counters
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const target = parseInt(entry.target.getAttribute('data-target'));
                    animateCounter(entry.target, target, 2000);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        document.querySelectorAll('.stat-number').forEach(stat => {
            observer.observe(stat);
        });

        // Demo Questions Data
        const demoQuestions = [
            {
                question: "¿Qué harías si ves que un compañero está tomando el almuerzo de otro niño sin permiso mientras el dueño no está mirando?",
                options: [
                    { text: "Le digo que eso no está bien", correct: true },
                    { text: "Me uno y tomo algo también", correct: false },
                    { text: "Aviso al profesor", correct: true },
                    { text: "No hago nada", correct: false }
                ],
                feedbackCorrect: "¡Excelente decisión! Has elegido proteger los derechos de los demás. Respetar la propiedad ajena es fundamental para una buena convivencia.",
                feedbackWrong: "¡Piensa mejor! Tomar cosas ajenas sin permiso afecta los derechos de propiedad. Es importante respetar lo que pertenece a otros."
            },
            {
                question: "En el parque, un niño más grande no deja jugar a los más pequeños en el columpio. ¿Qué deberías hacer?",
                options: [
                    { text: "Pedirle al niño que comparta el columpio con todos", correct: true },
                    { text: "Empujarlo para que se baje", correct: false },
                    { text: "Buscar a un adulto para que ayude", correct: true },
                    { text: "Irte del parque sin hacer nada", correct: false }
                ],
                feedbackCorrect: "¡Muy bien! Todos tenemos derecho a jugar y divertirnos. Buscar soluciones pacíficas es la mejor manera de resolver conflictos.",
                feedbackWrong: "Recuerda que la violencia no es la solución. Es mejor buscar ayuda o dialogar para resolver los problemas."
            },
            {
                question: "Tu amigo te pide que copies tu tarea para él. ¿Qué haces?",
                options: [
                    { text: "Le explicas que es mejor que la haga él mismo", correct: true },
                    { text: "Le prestas tu tarea para que copie", correct: false },
                    { text: "Le ofreces ayudarlo a entender el tema", correct: true },
                    { text: "Le dices que no y no le explicas por qué", correct: false }
                ],
                feedbackCorrect: "¡Perfecto! Ayudar a otros a aprender es mejor que permitir que copien. Así respetas tu trabajo y ayudas a tu amigo.",
                feedbackWrong: "Copiar no ayuda a aprender. Es mejor explicar por qué es importante hacer nuestro propio trabajo."
            }
        ];

        let currentQuestionIndex = 0;

        // Initialize demo with first question
        function initializeDemo() {
            showQuestion(currentQuestionIndex);
        }

        // Show question
        function showQuestion(index) {
            const question = demoQuestions[index];
            const questionText = document.getElementById('question-text');
            const choicesContainer = document.getElementById('choices-container');
            const feedback = document.getElementById('feedback');
            const nextBtn = document.getElementById('nextQuestionBtn');
            
            // Reset state
            questionText.textContent = question.question;
            choicesContainer.innerHTML = '';
            feedback.style.display = 'none';
            nextBtn.style.display = 'none';
            
            // Create choice buttons
            question.options.forEach((option, i) => {
                const button = document.createElement('button');
                button.className = 'choice-btn';
                button.innerHTML = `${option.text}`;
                button.onclick = function() { showFeedback(option.correct, this, question); };
                choicesContainer.appendChild(button);
            });
        }

        // Demo Feedback
        function showFeedback(isCorrect, button, question) {
            const feedback = document.getElementById('feedback');
            const feedbackIcon = feedback.querySelector('.feedback-icon');
            const feedbackTitle = feedback.querySelector('.feedback-text h4');
            const feedbackText = feedback.querySelector('.feedback-text p');
            const buttons = document.querySelectorAll('.choice-btn');
            const nextBtn = document.getElementById('nextQuestionBtn');
            
            // Reset all buttons
            buttons.forEach(btn => {
                btn.style.background = '';
                btn.style.color = '';
                btn.disabled = true;
            });
            
            // Style clicked button
            if (isCorrect) {
                button.style.background = '#28a745';
                button.style.color = 'white';
                feedback.className = 'feedback-container feedback-correct';
                feedbackIcon.innerHTML = '✅';
                feedbackTitle.textContent = '¡Excelente decisión! 🎉';
                feedbackTitle.style.color = '#28a745';
                feedbackText.textContent = question.feedbackCorrect;
            } else {
                button.style.background = '#dc3545';
                button.style.color = 'white';
                feedback.className = 'feedback-container feedback-wrong';
                feedbackIcon.innerHTML = '❌';
                feedbackTitle.textContent = '¡Piensa mejor! 🤔';
                feedbackTitle.style.color = '#dc3545';
                feedbackText.textContent = question.feedbackWrong;
            }
            
            feedback.style.display = 'block';
            nextBtn.style.display = 'block';
            feedback.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }

        // Next question
        function nextQuestion() {
            currentQuestionIndex++;
            if (currentQuestionIndex < demoQuestions.length) {
                showQuestion(currentQuestionIndex);
            } else {
                // All questions completed
                const questionText = document.getElementById('question-text');
                const choicesContainer = document.getElementById('choices-container');
                const feedback = document.getElementById('feedback');
                const feedbackIcon = feedback.querySelector('.feedback-icon');
                const feedbackTitle = feedback.querySelector('.feedback-text h4');
                const feedbackText = feedback.querySelector('.feedback-text p');
                const nextBtn = document.getElementById('nextQuestionBtn');
                
                questionText.textContent = "¡Has completado todas las preguntas! ¿Te gustaría aprender más sobre tus derechos?";
                choicesContainer.innerHTML = '';
                
                feedback.className = 'feedback-container feedback-correct';
                feedbackIcon.innerHTML = '⭐';
                feedbackTitle.textContent = '¡Felicidades! 🎊';
                feedbackTitle.style.color = '#FFD700';
                feedbackText.textContent = "Has demostrado un gran entendimiento sobre derechos y responsabilidades. ¡Sigue aprendiendo con nosotros en nuestros talleres!";
                feedback.style.display = 'block';
                nextBtn.style.display = 'none';
            }
        }

        // Chatbot functionality
        document.getElementById('chatbotToggle').addEventListener('click', function() {
            const window = document.getElementById('chatbotWindow');
            window.style.display = window.style.display === 'flex' ? 'none' : 'flex';
        });

        function sendMessage() {
            const input = document.getElementById('chatbotInput');
            const messages = document.getElementById('chatbotMessages');
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
                    
                    const responses = {
                        'hola': '¡Hola! Soy Lexi, tu asistente. ¿Te gustaría saber más sobre nuestros talleres, precios o cómo reservar?',
                        'precio': 'Nuestros talleres tienen costos desde $150.000 por estudiante, dependiendo del taller y la duración. ¡Contáctanos para un presupuesto personalizado!',
                        'talleres': 'Tenemos 6 talleres diferentes adaptados por edades: Ciudad Feliz (6-9 años), Pintando Derechos (4-7 años), Semáforo Legal (8-12 años), Super Héroes Legales (5-8 años), Mini Congreso (10-14 años) y Derechos Globales (12-18 años).',
                        'reservar': 'Puedes reservar usando el formulario de la sección "Reserva tu Taller" o contactándonos directamente al +57 310 562 0186. Te ayudaremos con todo el proceso.',
                        'edad': 'Nuestros talleres están diseñados para niños de 4 a 18 años, con actividades específicamente adaptadas para cada grupo de edad.',
                        'contacto': 'Puedes contactarnos al +57 310 562 0186, escribirnos a legaludico@gmail.com o usar el formulario de contacto de nuestra página.',
                        'colegio': 'Trabajamos con colegios públicos y privados en Bogotá y alrededores. Adaptamos nuestros talleres a las necesidades específicas de cada institución.',
                        'gracias': '¡De nada! Estoy aquí para ayudarte. ¿Tienes alguna otra pregunta sobre nuestros talleres o servicios?',
                        'derecho': 'Enseñamos derechos fundamentales como el derecho a la educación, a la identidad, a la protección, a la participación y muchos más, adaptados para que los niños los comprendan.',
                        'metodologia': 'Usamos metodologías lúdicas como juegos de rol, actividades creativas, simulaciones y tecnología para hacer el aprendizaje divertido y memorable.',
                        'lexi': '¡Soy Lexi, el asistente de Legalúdico! Me encanta ayudar a los niños a aprender sobre sus derechos de manera divertida. 🦊⚖️'
                    };
                    
                    const lowerMessage = message.toLowerCase();
                    let response = 'Puedo ayudarte con información sobre nuestros talleres, precios, reservas, edades adecuadas y metodología. ¿Qué te gustaría saber específicamente?';
                    
                    for (const [key, value] of Object.entries(responses)) {
                        if (lowerMessage.includes(key)) {
                            response = value;
                            break;
                        }
                    }
                    
                    // Check if user wants to contact
                    if (lowerMessage.includes('contact') || lowerMessage.includes('whatsapp') || lowerMessage.includes('teléfono') || lowerMessage.includes('llamar')) {
                        response = 'Puedes contactarnos directamente al +57 310 562 0186 o escribirnos a legaludico@gmail.com. ¡Estaremos encantados de ayudarte!';
                    }
                    
                    // Check if user wants pricing
                    if (lowerMessage.includes('precio') || lowerMessage.includes('costo') || lowerMessage.includes('valor') || lowerMessage.includes('cuánto')) {
                        response = 'Nuestros talleres tienen costos desde $150.000 por estudiante. El precio final depende del taller seleccionado, duración y número de estudiantes. ¿Te gustaría que te contactemos con una cotización personalizada?';
                    }
                    
                    botMessage.textContent = response;
                    messages.appendChild(botMessage);
                    messages.scrollTop = messages.scrollHeight;
                }, 1000);
                
                messages.scrollTop = messages.scrollHeight;
            }
        }

        // Enter key for chatbot
        document.getElementById('chatbotInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                sendMessage();
            }
        });

        // CALENDAR FUNCTIONALITY
        let currentDate = new Date();
        let selectedDate = null;
        let selectedTime = null;

        function generateCalendar() {
            const calendarDays = document.getElementById('calendarDays');
            const currentMonthElement = document.getElementById('currentMonth');
            
            const month = currentDate.getMonth();
            const year = currentDate.getFullYear();
            
            const monthNames = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
                "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
            
            currentMonthElement.textContent = `${monthNames[month]} ${year}`;
            
            // Primer día del mes
            const firstDay = new Date(year, month, 1);
            // Último día del mes
            const lastDay = new Date(year, month + 1, 0);
            
            let html = '';
            
            // Días vacíos antes del primer día
            for (let i = 0; i < firstDay.getDay(); i++) {
                html += `<div class="calendar-day disabled"></div>`;
            }
            
            // Días del mes
            const today = new Date();
            for (let day = 1; day <= lastDay.getDate(); day++) {
                const date = new Date(year, month, day);
                const isToday = date.toDateString() === today.toDateString();
                const isPast = date < today && !isToday;
                const isWeekend = date.getDay() === 0 || date.getDay() === 6;
                
                let dayClass = 'calendar-day';
                if (isToday) dayClass += ' today';
                if (isPast) dayClass += ' disabled';
                if (isWeekend) dayClass += ' disabled';
                if (selectedDate && date.getTime() === selectedDate.getTime()) dayClass += ' selected';
                
                if (!isPast && !isWeekend) {
                    html += `<div class="${dayClass}" onclick="selectDate(${day})">${day}</div>`;
                } else {
                    html += `<div class="${dayClass}">${day}</div>`;
                }
            }
            
            calendarDays.innerHTML = html;
            
            // Disable time slots initially
            document.querySelectorAll('.time-slot').forEach(slot => {
                slot.classList.add('disabled');
            });
        }

        function changeMonth(direction) {
            currentDate.setMonth(currentDate.getMonth() + direction);
            generateCalendar();
        }

        function selectDate(day) {
            const selected = new Date(currentDate.getFullYear(), currentDate.getMonth(), day);
            selectedDate = selected;
            
            // Update calendar display
            generateCalendar();
            
            // Show selected date info
            const selectedInfo = document.getElementById('selectedInfo');
            const selectedDateText = document.getElementById('selectedDateText');
            
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            selectedDateText.textContent = selected.toLocaleDateString('es-ES', options);
            selectedInfo.style.display = 'block';
            
            // Update hidden form fields
            document.getElementById('formFecha').value = selected.toLocaleDateString('es-ES');
            
            // Enable time slots
            document.querySelectorAll('.time-slot').forEach(slot => {
                slot.classList.remove('disabled');
                slot.classList.remove('selected');
            });
            
            selectedTime = null;
        }

        // Time slot selection
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('time-slot') && !e.target.classList.contains('disabled')) {
                // Remove selected class from all time slots
                document.querySelectorAll('.time-slot').forEach(slot => {
                    slot.classList.remove('selected');
                });
                
                // Add selected class to clicked time slot
                e.target.classList.add('selected');
                selectedTime = e.target.getAttribute('data-time');
                
                // Update hidden form field
                document.getElementById('formHorario').value = selectedTime;
            }
        });

        // Booking Form Submission
        document.getElementById('bookingForm').addEventListener('submit', function(e) {
            if (!selectedDate) {
                e.preventDefault();
                alert('Por favor selecciona una fecha para tu taller.');
                return;
            }
            
            if (!selectedTime) {
                e.preventDefault();
                alert('Por favor selecciona un horario para tu taller.');
                return;
            }
        });

        // Close alert message
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

        // Initialize calendar and demo on load
        document.addEventListener('DOMContentLoaded', function() {
            generateCalendar();
            initializeDemo();
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add floating animation to feature cards
        const features = document.querySelectorAll('.feature-card');
        features.forEach((feature, index) => {
            feature.style.animationDelay = `${index * 0.2}s`;
        });

        // Add intersection observer for animations
        const fadeObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        });

        // Observe elements for fade-in animation
        document.querySelectorAll('.feature-card, .stat-item, .testimonial-card').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            fadeObserver.observe(el);
        });
    </script>
</body>
</html>