# Instalación de Servidor Local - Windows

## Opción A: XAMPP (Más Fácil)

### 1. Descargar XAMPP
- Ve a: https://www.apachefriends.org/download.html
- Descarga la versión para Windows
- Instala siguiendo el asistente

### 2. Configurar XAMPP
1. Abre XAMPP Control Panel
2. Inicia Apache haciendo clic en "Start"
3. Inicia MySQL si lo necesitas (opcional)

### 3. Colocar Archivos
1. Ve a la carpeta: `C:\xampp\htdocs\`
2. Crea una carpeta llamada `hls` (o el nombre que quieras)
3. Copia todos tus archivos HTML, CSS, JS y PHP a esta carpeta

### 4. Acceder al Sitio
- Abre tu navegador
- Ve a: `http://localhost/hls/contacto.html`
- Ahora el formulario debería funcionar

## Opción B: WAMP

### 1. Descargar WAMP
- Ve a: https://www.wampserver.com/en/
- Descarga la versión para tu sistema (32 o 64 bits)
- Instala siguiendo el asistente

### 2. Configurar WAMP
1. Inicia WAMP (icono verde en la bandeja del sistema)
2. Coloca tus archivos en: `C:\wamp64\www\` (o la ruta de tu instalación)

### 3. Acceder al Sitio
- Ve a: `http://localhost/tu-carpeta/contacto.html`

## Opción C: Servidor PHP Integrado (Más Rápido)

### 1. Instalar PHP
1. Descarga PHP desde: https://windows.php.net/download/
2. Extrae en una carpeta (ej: `C:\php`)
3. Copia `php.ini-development` a `php.ini`

### 2. Configurar PHP
Edita `php.ini` y descomenta estas líneas:
```ini
extension=openssl
extension=mbstring
extension=curl
```

### 3. Iniciar Servidor
1. Abre CMD como administrador
2. Navega a tu carpeta del proyecto
3. Ejecuta: `php -S localhost:8000`

### 4. Acceder al Sitio
- Ve a: `http://localhost:8000/contacto.html`

---

## Verificación

Para verificar que todo funciona:

1. **Abre la consola del navegador** (F12)
2. **Ve a la pestaña Network**
3. **Envía un mensaje de prueba**
4. **Verifica que aparezca la petición a `process_contact.php`**
5. **Debería mostrar estado 200 (éxito)**

## Solución de Problemas

### ❌ Si sigue dando error 405:
1. Verifica que Apache esté corriendo
2. Asegúrate de que los archivos estén en la carpeta correcta
3. Reinicia el servidor web

### ❌ Si PHP no funciona:
1. Verifica que PHP esté habilitado en Apache
2. Crea un archivo `test.php` con: `<?php phpinfo(); ?>`
3. Accede a `http://localhost/test.php`

### ❌ Si no se envían emails:
1. Verifica la configuración de email en `php.ini`
2. Configura un servidor SMTP local o usa servicios como Gmail SMTP 