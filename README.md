# Viaggi Gallery

Aplicación web de gestión de imágenes desarrollada para la materia Lenguajes de Programación Back End

Permite a los usuarios crear una galería personal donde pueden subir y eliminar imágenes. Cuenta con un sistema de roles donde el administrador puede gestionar las cuentas y contenido de todos los usuarios.

---

## Funcionalidades

- Registro e inicio de sesión de usuarios
- Galería personal — cada usuario ve solo sus imágenes
- Subir y eliminar imágenes
- Ordenar imágenes por fecha o nombre
- Panel de administrador para gestionar imágenes y usuarios


## Instalación local

### Requisitos
- XAMPP (PHP 8 + MySQL)
- Composer

### Pasos

1. Clona el repositorio dentro de `htdocs`:
   ```bash
   git clone https://github.com/tu-usuario/viaggi-gallery.git
   cd mi_galeria
   ```

2. Instala las dependencias:
   ```bash
   composer install
   ```

3. Copia el archivo de entorno:
   ```bash
   cp .env.example .env
   ```

4. Edita `.env` con tus datos locales:
   ```
   app.baseURL = 'http://localhost/mi_galeria/public/'
   database.default.hostname = localhost
   database.default.database = aplicacion_mvc
   database.default.username = root
   database.default.password =
   ```

5. Importa la base de datos en phpMyAdmin:
   - Crea una base de datos llamada `aplicacion_mvc`
   - Importa el archivo `database.sql`

6. Crea la carpeta de uploads:
   ```
   public/uploads/
   ```

7. Abre en tu navegador:
   ```
   http://localhost/mi_galeria/public/
   ```

---

## Roles

| Rol | Permisos |
|-----|----------|
| Usuario | Subir, ver y eliminar sus propias imágenes |
| Administrador | Gestionar imágenes y cuentas de todos los usuarios |

Para crear un administrador, registra un usuario normal y ejecuta en phpMyAdmin:
```sql
UPDATE `user` SET `role` = 'admin' WHERE `login` = 'tu_login';
```

---

## Estructura del proyecto

```
mi_galeria/
├── app/
│   ├── Config/
│   ├── Controllers/
│   │   ├── BaseController.php
│   │   ├── Home.php
│   │   ├── ImageController.php
│   │   ├── Publication.php
│   │   └── User.php
│   ├── Database/
│   ├── Filters/
│   ├── Helpers/
│   ├── Language/
│   ├── Libraries/
│   ├── Models/
│   │   ├── ImageModel.php
│   │   ├── PublicationModel.php
│   │   └── UserModel.php
│  
│   └── Views/
│       ├── admin/
│       │   └── gallery.php
│       ├── errors/
│       ├── Publication/
│       │   ├── all.php
│       │   └── edit.php
│       ├── user/
│       │   ├── all.php
│       │   ├── edit.php
│       │   └── register.php
│       ├── footer.php
│       ├── gallery.php
│       ├── header.php
│       ├── Home.php
│     
├── public/
│   └── uploads/

├── database.sql
└── .env.example
```
