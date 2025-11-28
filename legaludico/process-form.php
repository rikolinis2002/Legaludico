<?php
session_start();

// Configuración de correo - CAMBIA ESTO CON TU EMAIL
$to_email = "legaludico@gmail.com";
$subject_prefix = "Legalúdico - ";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $form_type = $_POST['form_type'] ?? '';
    
    if ($form_type == 'booking') {
        // Procesar formulario de reserva
        $colegio = htmlspecialchars($_POST['colegio']);
        $contacto = htmlspecialchars($_POST['contacto']);
        $email = htmlspecialchars($_POST['email']);
        $telefono = htmlspecialchars($_POST['telefono']);
        $grado = htmlspecialchars($_POST['grado']);
        $estudiantes = htmlspecialchars($_POST['estudiantes']);
        $taller = htmlspecialchars($_POST['taller']);
        $notas = htmlspecialchars($_POST['notas']);
        
        // Validación básica
        if (empty($colegio) || empty($contacto) || empty($email) || empty($telefono)) {
            $_SESSION['message'] = "❌ Por favor complete todos los campos obligatorios.";
            header("Location: index.php#booking");
            exit();
        }
        
        // Construir el mensaje
        $subject = $subject_prefix . "Nueva Reserva de Taller";
        $message = "
        <html>
        <head>
            <title>Nueva Reserva de Taller</title>
        </head>
        <body>
            <h2>¡Nueva Reserva de Taller!</h2>
            <p><strong>Colegio:</strong> $colegio</p>
            <p><strong>Contacto:</strong> $contacto</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Teléfono:</strong> $telefono</p>
            <p><strong>Grado:</strong> $grado</p>
            <p><strong>Estudiantes:</strong> $estudiantes</p>
            <p><strong>Taller:</strong> $taller</p>
            <p><strong>Notas:</strong> $notas</p>
            <p><strong>Fecha:</strong> " . date('d/m/Y H:i:s') . "</p>
        </body>
        </html>
        ";
        
        // Cabeceras para email HTML
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: no-reply@legaludico.com" . "\r\n";
        $headers .= "Reply-To: $email" . "\r\n";
        
        // Enviar email
        if (mail($to_email, $subject, $message, $headers)) {
            $_SESSION['message'] = "✅ ¡Gracias! Tu reserva ha sido enviada. Te contactaremos pronto.";
        } else {
            $_SESSION['message'] = "❌ Error al enviar el formulario. Por favor intenta nuevamente.";
        }
        
        header("Location: index.php#booking");
        exit();
        
    } elseif ($form_type == 'contact') {
        // Procesar formulario de contacto
        $nombre = htmlspecialchars($_POST['nombre']);
        $email = htmlspecialchars($_POST['email']);
        $asunto = htmlspecialchars($_POST['asunto']);
        $mensaje = htmlspecialchars($_POST['mensaje']);
        
        // Validación básica
        if (empty($nombre) || empty($email) || empty($asunto) || empty($mensaje)) {
            $_SESSION['message'] = "❌ Por favor complete todos los campos del formulario de contacto.";
            header("Location: index.php#contact");
            exit();
        }
        
        // Construir el mensaje
        $subject = $subject_prefix . $asunto;
        $message = "
        <html>
        <head>
            <title>Nuevo Mensaje de Contacto</title>
        </head>
        <body>
            <h2>¡Nuevo Mensaje de Contacto!</h2>
            <p><strong>Nombre:</strong> $nombre</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Asunto:</strong> $asunto</p>
            <p><strong>Mensaje:</strong><br>$mensaje</p>
            <p><strong>Fecha:</strong> " . date('d/m/Y H:i:s') . "</p>
        </body>
        </html>
        ";
        
        // Cabeceras para email HTML
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: no-reply@legaludico.com" . "\r\n";
        $headers .= "Reply-To: $email" . "\r\n";
        
        // Enviar email
        if (mail($to_email, $subject, $message, $headers)) {
            $_SESSION['message'] = "✅ ¡Gracias por tu mensaje! Te responderemos pronto.";
        } else {
            $_SESSION['message'] = "❌ Error al enviar el mensaje. Por favor intenta nuevamente.";
        }
        
        header("Location: index.php#contact");
        exit();
    }
}

// Redireccionar si se accede directamente
header("Location: index.php");
exit();
?>