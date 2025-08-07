# Formulario de Contacto - High Level Solutions

## Descripción
Se ha implementado un sistema de formulario de contacto funcional que envía los mensajes al correo electrónico `highlevelsolutionsgt@gmail.com`.

## Archivos Implementados

### 1. `process_contact.php`
- Script PHP que procesa el envío de emails
- Valida los datos del formulario
- Envía el mensaje al correo especificado
- Envía una confirmación automática al remitente
- Incluye validación de seguridad y sanitización de datos

### 2. `js/script.js` (Actualizado)
- Manejo del formulario de contacto con JavaScript
- Validación del lado del cliente
- Notificaciones visuales de éxito/error
- Estado de carga durante el envío

### 3. `contacto.html` (Actualizado)
- Formulario actualizado con IDs y atributos necesarios
- Campos marcados como requeridos (*)

### 4. `test_contact.html`
- Página de prueba para verificar la funcionalidad
- Formulario independiente para testing

## Características del Sistema

### ✅ Funcionalidades Implementadas
- **Validación de datos**: Tanto en el cliente como en el servidor
- **Sanitización**: Protección contra inyección de código
- **Notificaciones visuales**: Feedback inmediato al usuario
- **Estado de carga**: Indicador visual durante el envío
- **Email de confirmación**: Mensaje automático al remitente
- **Manejo de errores**: Respuestas claras en caso de problemas

### 📧 Configuración de Email
- **Destinatario**: `highlevelsolutionsgt@gmail.com`
- **Asunto**: "Nuevo mensaje de contacto: [asunto del usuario]"
- **Contenido**: Incluye nombre, email, asunto y mensaje del usuario
- **Confirmación**: Email automático al remitente

## Requisitos del Servidor

### 🔧 Configuración PHP
1. **Servidor web** con soporte PHP (Apache, Nginx, etc.)
2. **Función mail()** habilitada en PHP
3. **Configuración SMTP** (opcional pero recomendado)

### 📋 Configuración Recomendada
```php
// En php.ini o configuración del servidor
sendmail_path = /usr/sbin/sendmail -t -i
SMTP = localhost
smtp_port = 25
```

## Instalación y Configuración

### 1. Subir archivos al servidor
```bash
# Asegúrate de que todos los archivos estén en el directorio web
contacto.html
process_contact.php
js/script.js
```

### 2. Verificar permisos
```bash
# El archivo PHP debe ser ejecutable
chmod 644 process_contact.php
```

### 3. Probar la funcionalidad
1. Abrir `test_contact.html` en el navegador
2. Completar el formulario de prueba
3. Verificar que se reciba el email en `highlevelsolutionsgt@gmail.com`

## Uso del Formulario

### 📝 Campos del Formulario
- **Nombre Completo** (*): Nombre y apellido del remitente
- **Correo Electrónico** (*): Email válido para contacto
- **Asunto** (*): Título del mensaje
- **Mensaje** (*): Contenido del mensaje

### 🔄 Flujo de Funcionamiento
1. Usuario completa el formulario
2. JavaScript valida los datos
3. Se envía la información a `process_contact.php`
4. PHP procesa y valida los datos
5. Se envía email a `highlevelsolutionsgt@gmail.com`
6. Se envía confirmación al remitente
7. Se muestra notificación de éxito/error

## Solución de Problemas

### ❌ Error: "Error de conexión"
- Verificar que el servidor tenga PHP habilitado
- Comprobar que `process_contact.php` esté en la ubicación correcta
- Revisar logs del servidor web

### ❌ Error: "Error al enviar el mensaje"
- Verificar configuración de email en el servidor
- Comprobar que la función `mail()` esté habilitada
- Revisar configuración SMTP si es necesario

### ❌ No se reciben emails
- Verificar carpeta de spam
- Comprobar configuración de DNS y registros MX
- Revisar logs del servidor de correo

## Personalización

### 🎨 Cambiar Email Destinatario
Editar en `process_contact.php` línea 47:
```php
$to = 'tu-nuevo-email@gmail.com';
```

### 🎨 Modificar Mensajes
Editar en `process_contact.php` las variables:
- `$email_subject`: Asunto del email
- `$email_body`: Cuerpo del mensaje
- `$user_subject`: Asunto de confirmación
- `$user_body`: Cuerpo de confirmación

### 🎨 Personalizar Notificaciones
Editar en `js/script.js` la función `showNotification()` para cambiar:
- Colores de las notificaciones
- Duración de las notificaciones
- Posición en la pantalla

## Seguridad

### 🔒 Medidas Implementadas
- **Validación de entrada**: Sanitización de datos
- **Validación de email**: Verificación de formato
- **Headers de seguridad**: CORS configurado
- **Protección XSS**: Escape de caracteres especiales

### 🔒 Recomendaciones Adicionales
- Configurar HTTPS en producción
- Implementar rate limiting
- Agregar CAPTCHA para prevenir spam
- Configurar filtros de spam en el servidor

## Soporte

Para problemas técnicos o consultas sobre la implementación, contactar al equipo de desarrollo de High Level Solutions.

---
**Desarrollado para High Level Solutions**  
*Solución completa de formulario de contacto funcional* 