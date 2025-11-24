# 📚 Gestor Biblioteca

<p align="center">
  <img src="https://img.shields.io/badge/PHP-Laravel-red?logo=laravel"/>
  <img src="https://img.shields.io/badge/Vue.js-Frontend-blue?logo=vue.js"/>
  <img src="https://img.shields.io/badge/CRUD-Operaciones-success"/>
  <img src="https://img.shields.io/badge/Status-In%20Progress-orange"/>
</p>

Aplicación web moderna para gestionar libros, usuarios y préstamos en una biblioteca, con autenticación segura de usuarios.

---

## 🚀 Características

- **Gestión de Libros:** Crea, edita, elimina y consulta el catálogo.
- **Gestión de Usuarios:** Administra usuarios con autenticación.
- **Gestión de Préstamos:** Asigna y controla préstamos y devoluciones.
- **Autenticación:** Inicio de sesión protegido y control de accesos.
- **Panel administrativo:** Interfaz intuitiva para tareas administrativas.
- **Frontend atractivo y responsivo:** Construido con Vue.js.

---

## 🛠️ Tecnologías empleadas

| Backend   | Frontend   | Base de Datos      |
|-----------|------------|--------------------|
| PHP / Laravel | Vue.js | PostgreSQL

_El proyecto también utiliza JavaScript y otras librerías del ecosistema web._

---

## 📦 Instalación rápida

1. **Clona el repositorio**
   ```bash
   git clone https://github.com/Aimara8/gestor_biblioteca.git
   cd gestor_biblioteca
   ```
2. **Instala dependencias del backend**
   ```bash
   composer install
   ```
3. **Instala dependencias del frontend**
   ```bash
   npm install
   ```
4. **Configura el entorno**
   ```bash
   cp .env.example .env
   ```
   _Modifica los valores en `.env` según tu configuración local._
   
5. **Genera la clave de la aplicación**
   ```bash
   php artisan key:generate
   ```
6. **Crea la base de datos y ejecuta migraciones**
   ```bash
   php artisan migrate
   ```
7. **Arranca el servidor**
   ```bash
   php artisan serve
   ```
   _Accede desde_: [http://localhost:8000](http://localhost:8000)

8. **Arranca el frontend**
   ```bash
   npm run dev
   ```

---

## 📁 Estructura del Proyecto

```
gestor_biblioteca/
│
├── app/              # Lógica del backend Laravel
├── resources/js/     # Código del frontend Vue.js
├── database/         # Migraciones y seeds
├── routes/           # Definición de rutas web/API
└── ...
```

---

## 🔒 Autenticación

El sistema incorpora autenticación robusta para proteger y personalizar el acceso a las operaciones de la biblioteca.

---

## 👩‍💻 Créditos

Desarrollado por **Aimara8**.

---

<p align="center">¡Gracias por visitar el proyecto! ¿Listo para transformar tu biblioteca? 🚀</p>
