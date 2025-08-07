<?php
// Configuración de headers para CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Verificar si es una petición POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Método no permitido']);
    exit;
}

// Obtener datos del formulario
$input = json_decode(file_get_contents('php://input'), true);

if (!$input) {
    $input = $_POST;
}

// Validar datos requeridos
$required_fields = ['name', 'email', 'subject', 'message'];
$missing_fields = [];

foreach ($required_fields as $field) {
    if (empty($input[$field])) {
        $missing_fields[] = $field;
    }
}

if (!empty($missing_fields)) {
    http_response_code(400);
    echo json_encode(['error' => 'Campos requeridos faltantes: ' . implode(', ', $missing_fields)]);
    exit;
}

// Sanitizar datos
$name = htmlspecialchars(trim($input['name']));
$email = filter_var(trim($input['email']), FILTER_SANITIZE_EMAIL);
$subject = htmlspecialchars(trim($input['subject']));
$message = htmlspecialchars(trim($input['message']));

// Validar email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['error' => 'Email inválido']);
    exit;
}

// Configurar email
$to = 'highlevelsolutionsgt@gmail.com';
$email_subject = "Nuevo mensaje de contacto: $subject";

// Crear el cuerpo del email
$email_body = "
Nuevo mensaje de contacto desde el sitio web de High Level Solutions

Detalles del mensaje:
- Nombre: $name
- Email: $email
- Asunto: $subject

Mensaje:
$message

---
Este mensaje fue enviado desde el formulario de contacto del sitio web.
";

// Headers del email
$headers = [
    'From' => $email,
    'Reply-To' => $email,
    'X-Mailer' => 'PHP/' . phpversion(),
    'Content-Type' => 'text/plain; charset=UTF-8'
];

// Intentar enviar el email
$mail_sent = mail($to, $email_subject, $email_body, $headers);

if ($mail_sent) {
    // Enviar email de confirmación al usuario
    $user_subject = "Confirmación de mensaje - High Level Solutions";
    $user_body = "
Hola $name,

Gracias por contactarnos. Hemos recibido tu mensaje y nos pondremos en contacto contigo pronto.

Detalles de tu mensaje:
- Asunto: $subject
- Mensaje: $message

Saludos,
El equipo de High Level Solutions
";

    $user_headers = [
        'From' => 'noreply@highlevelsolutions.com',
        'Reply-To' => 'highlevelsolutionsgt@gmail.com',
        'X-Mailer' => 'PHP/' . phpversion(),
        'Content-Type' => 'text/plain; charset=UTF-8'
    ];

    mail($email, $user_subject, $user_body, $user_headers);

    http_response_code(200);
    echo json_encode([
        'success' => true,
        'message' => '¡Mensaje enviado exitosamente! Nos pondremos en contacto contigo pronto.'
    ]);
} else {
    http_response_code(500);
    echo json_encode([
        'error' => 'Error al enviar el mensaje. Por favor, intenta nuevamente.'
    ]);
}
?> 