<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Proyecto: Examen Parcial 2 - DTW135
## Integrantes del grupo de trabajo

- David Salomón Martínez Valladares - MV12013
- Luis Eduardo Guiroa Linares - GL12016
- Erick Giovanni Monroy López - ML22048
- Román Edgardo Mendoza Arias - MA22054
- David Alfredo Parada Mendoza - PM13119

## Descripción

Este proyecto es una base desarrollada en Laravel 12, que posee dos actividades, la primera es la lectura de XML y conversión a JSON para ser mostrado en una vista de PHP Blade y la llamada a un servicio SOAP para una calculadora.

## Instrucciones de instalación

A continuación se detallan los pasos para instalar y ejecutar el proyecto desde cero en tu entorno local:

1. Clonar el repositorio

```bash
git clone https://github.com/DavidSalomonDev/dtw_parcial2.git
cd dtw_parcial2
```

2. Instalar dependencias de PHP con Composer

Asegúrate de tener Composer instalado. Luego ejecuta:

```bash
composer install
```

3. Instalar dependencias de JavaScript con npm

Asegúrate de tener Node.js y npm instalados. Luego ejecuta:

```bash
npm install
```

4. Configurar el archivo de entorno
   
Luego, abre el archivo `.env` y ajusta los valores de la base de datos y otras variables necesarias.

5. Configuración de la base de datos (XAMPP y MySQL)

Este proyecto utiliza XAMPP y MySQL para la gestión de la base de datos. Por defecto, se utilizan los siguientes valores en el archivo .env:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

Por lo tanto, debes crear una base de datos llamada laravel en tu servidor MySQL local (puedes hacerlo desde phpMyAdmin o la consola de MySQL). No es necesario establecer contraseña para el usuario root si usas la configuración por defecto de XAMPP.

6. Generar la clave de la aplicación

Ejecuta el siguiente comando:

```bash
php artisan key:generate
```

7. Ejecutar migraciones

Para crear las tablas necesarias en la base de datos, ejecuta:

```bash
php artisan migrate
```

8. Cargar datos de ejemplo

El repositorio incluye seeders para poblar la base de datos con usuarios de ejemplo. Ejecuta

```bash
php artisan db:seed
```
   

9. Levantar el servidor de desarrollo

Finalmente, inicia el servidor local de Laravel:

```bash
php artisan serve
```

El proyecto estará disponible en http://localhost:8000.

## Uso de la aplicación

1. Ingresa con las credenciales de admin
```
usuario: admin
contraseña: 1234
```

2. Función Ver Libros
   
Los libros son extraídos en formato XML convertidos a formato JSON y mostrados en la página de la sección. 

Los libros en formato XML están almacenados en `storage/xml`

La función que procesa está información se encuentra en `app/Http/Controllers/LibroController.php`

3. Función Calculadora SOAP

Los cálculos se realizan utilizando el servicio web de http://www.dneonline.com/calculator.asmx?WSDL 

La función que procesa el llamado a este servicio utilizando el protocolo SOAP se encuentra en `app/Http/Controllers/SoapController.php`

## Conclusiones

En el desarrollo de este proyecto se fortalecieron habilidades clave en el manejo de almacenamiento local y consumo de servicios web, específicamente mediante la lectura y conversión de archivos XML a JSON y la integración de servicios SOAP en aplicaciones web con Laravel. 

Se aprendió a estructurar y manipular datos, a trabajar colaborativamente utilizando control de versiones en GitHub, y a presentar información de manera clara y funcional en vistas web. 
