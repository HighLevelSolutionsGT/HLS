# Instalación de Servidor Local - macOS

## Opción A: MAMP (Más Fácil)

### 1. Descargar MAMP
- Ve a: https://www.mamp.info/en/downloads/
- Descarga la versión gratuita para macOS
- Instala arrastrando MAMP a la carpeta Applications

### 2. Configurar MAMP
1. Abre MAMP desde Applications
2. Haz clic en "Start Servers"
3. Espera a que Apache y MySQL estén corriendo (luces verdes)

### 3. Colocar Archivos
1. Ve a la carpeta: `/Applications/MAMP/htdocs/`
2. Crea una carpeta llamada `hls`
3. Copia todos tus archivos HTML, CSS, JS y PHP a esta carpeta

### 4. Acceder al Sitio
- Abre tu navegador
- Ve a: `http://localhost:8888/hls/contacto.html`
- Ahora el formulario debería funcionar

## Opción B: Servidor PHP Integrado (Más Rápido)

### 1. Verificar PHP
macOS ya viene con PHP preinstalado. Abre Terminal y ejecuta:
```bash
php -v
```

### 2. Navegar a tu Proyecto
```bash
cd /Users/andresrodas/Desktop/HLS/HLS/Pagina
```

### 3. Iniciar Servidor PHP
```bash
php -S localhost:8000
```

### 4. Acceder al Sitio
- Abre tu navegador
- Ve a: `http://localhost:8000/contacto.html`

## Opción C: Homebrew + Apache

### 1. Instalar Homebrew (si no lo tienes)
```bash
/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"
```

### 2. Instalar Apache y PHP
```bash
brew install httpd php
```

### 3. Configurar Apache
```bash
# Iniciar Apache
brew services start httpd

# El directorio web estará en:
# /opt/homebrew/var/www/
```

### 4. Colocar Archivos
```bash
# Copia tus archivos al directorio web
cp -r /Users/andresrodas/Desktop/HLS/HLS/Pagina/* /opt/homebrew/var/www/
```

### 5. Acceder al Sitio
- Ve a: `http://localhost:8080/contacto.html`

---

## Verificación Rápida

### 1. Crear Archivo de Prueba
Crea un archivo `test.php` en tu carpeta:
```php
<?php
echo "PHP está funcionando correctamente!";
?>
```

### 2. Probar PHP
- Si usas MAMP: `http://localhost:8888/test.php`
- Si usas servidor PHP: `http://localhost:8000/test.php`

### 3. Verificar el Formulario
1. Abre la consola del navegador (Cmd + Option + I)
2. Ve a la pestaña Network
3. Envía un mensaje de prueba
4. Verifica que aparezca la petición a `process_contact.php`

## Solución de Problemas

### ❌ Error: "php: command not found"
```bash
# Instalar PHP con Homebrew
brew install php
```

### ❌ Error: "Permission denied"
```bash
# Dar permisos a la carpeta
chmod 755 /Users/andresrodas/Desktop/HLS/HLS/Pagina
```

### ❌ Error: "Port already in use"
```bash
# Usar un puerto diferente
php -S localhost:8080
```

### ❌ MAMP no inicia
1. Verifica que no haya otros servicios usando los puertos 80/8888
2. Reinicia MAMP
3. Verifica los logs en MAMP > Logs

## Configuración de Email (Opcional)

Para que los emails funcionen localmente, puedes configurar Gmail SMTP:

### 1. Editar process_contact.php
Agrega esta configuración al inicio del archivo:
```php
// Configuración SMTP para Gmail
ini_set('SMTP', 'smtp.gmail.com');
ini_set('smtp_port', '587');
```

### 2. O usar un servicio como Mailtrap para testing
- Ve a: https://mailtrap.io/
- Crea una cuenta gratuita
- Usa las credenciales SMTP de Mailtrap

---

## Comandos Útiles

```bash
# Verificar si PHP está instalado
php -v

# Verificar puertos en uso
lsof -i :8000
lsof -i :8888

# Matar proceso en puerto específico
kill -9 $(lsof -t -i:8000)

# Ver logs de Apache (si usas MAMP)
tail -f /Applications/MAMP/logs/apache_error.log
``` 