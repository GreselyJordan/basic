# 🎬 CRUD de Películas con Yii 2

¡Bienvenido a mi proyecto de gestión de películas! Esta es una aplicación web desarrollada con el *template* Básico de Yii 2, diseñada para administrar una filmoteca personal o un pequeño catálogo de cine.

![Yii 2](https://img.shields.io/badge/Framework-Yii_2-blue.svg)
![PHP](https://img.shields.io/badge/PHP-7.4%2B-blueviolet.svg)
![Database](https://img.shields.io/badge/Database-MySQL-orange.svg)

## 📸 Vista Previa

(¡Te recomiendo tomar una captura de pantalla del `index` de películas y subirla a tu repositorio con el nombre `screenshot.png` para que se muestre aquí!)

![Vista Previa del Proyecto](./screenshot.png)

## ✨ Características Principales

* **Gestión de Películas:** CRUD completo para añadir, ver, editar y eliminar películas.
* **Subida de Portadas:** Funcionalidad para subir imágenes (portadas) para cada película, con validación de archivos y vista previa.
* **Gestión de Catálogos:** CRUDs independientes para administrar:
    * Actores
    * Géneros
    * Directores
* **Relaciones de Base de Datos:** Formulario de películas con menús desplegables (`DropDownList`) para seleccionar actores y géneros existentes.
* **Validación Avanzada:** Validación de formularios tanto en el lado del cliente (HTML5) como en el servidor (Yii 2 Models), incluyendo campos requeridos, formato de fecha (`YYYY-MM-DD`), números, etc.
* **Búsqueda y Paginación:** `GridView` de Yii 2 implementado para buscar, filtrar y paginar los resultados en todos los listados.

## 🛠️ Stack Tecnológico

* **Framework:** [Yii 2](https://www.yiiframework.com/) (Basic Project Template)
* **Lenguaje:** PHP
* **Base de Datos:** MySQL
* **Frontend:** Bootstrap (integrado con Yii 2), HTML5, CSS3.

## 🚀 Instalación y Puesta en Marcha

Sigue estos pasos para levantar el proyecto en tu entorno local.

1.  **Clonar el Repositorio:**
    ```bash
    git clone [https://github.com/greselyjordan/basic.git](https://github.com/greselyjordan/basic.git)
    cd basic
    ```

2.  **Instalar Dependencias:**
    Asegúrate de tener [Composer](https://getcomposer.org/) instalado y ejecuta:
    ```bash
    composer install
    ```

3.  **Configurar Base de Datos:**
    * Crea una base de datos MySQL (ej. `peliculas_db`).
    * Edita el archivo `config/db.php` con tus credenciales de MySQL (host, dbname, username, password).

4.  **Importar la Estructura de la BD:**
    *(¡Acción Requerida!)*: Te recomiendo exportar tu base de datos local a un archivo `database.sql` y subirlo al repositorio.
    
    Una vez que tengas el archivo, impórtalo en tu base de datos:
    ```bash
    mysql -u tu_usuario -p tu_base_de_datos < database.sql
    ```

5.  **Configurar la Aplicación:**
    * Asegúrate de que el archivo `config/web.php` tenga una `cookieValidationKey` única y secreta.

6.  **Crear Directorio de Subidas:**
    La aplicación necesita un lugar para guardar las portadas. Crea la carpeta y dale permisos de escritura.
    ```bash
    mkdir web/portadas
    chmod -R 777 web/portadas
    ```

7.  **Ejecutar el Servidor:**
    Puedes usar el servidor de desarrollo integrado de Yii (ideal para pruebas rápidas):
    ```bash
    ./yii serve
    ```
    O configurar un *Virtual Host* en Apache/Nginx apuntando al directorio `web/`.

## 📄 Licencia

Este proyecto está bajo la Licencia BSD-3-Clause. Ver el archivo [LICENSE.md](./LICENSE.md) para más detalles.
