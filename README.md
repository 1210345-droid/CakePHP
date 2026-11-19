# Práctica de Laboratorio: Despliegue Multi-Contenedor CakePHP 5 y MariaDB con Docker

Entorno de desarrollo multi-contenedor con **PHP 8.3 + Apache (CakePHP 5)** y **MariaDB 11.4** interconectados mediante una red bridge de Docker (`red-laboratorio`).

## Estructura del Proyecto

```text
practica-cakephp/
├── Dockerfile             # Receta para construir el contenedor PHP 8.3 + Apache + Composer
├── docker-compose.yml     # Orquestador multi-contenedor (app + db, red-laboratorio, db_data)
└── app/                   # Código fuente de CakePHP 5 con migración y CRUD de Students
    ├── config/
    │   ├── app_local.php  # Conexión configurada hacia el host 'db' (MariaDB)
    │   └── Migrations/
    │       └── 20261119000000_CreateStudents.php
    ├── src/
    │   ├── Controller/StudentsController.php
    │   └── Model/
    │       ├── Entity/Student.php
    │       └── Table/StudentsTable.php
    └── templates/
        └── Students/      # Vistas index, view, add y edit
```

## Ejecución con Docker Compose

1. **Instalar dependencias de Composer y levantar contenedores:**
   ```bash
   docker compose run --rm app composer install
   docker compose up -d
   ```

2. **Ajustar permisos de escritura (macOS / Linux):**
   ```bash
   docker compose exec app chown -R www-data:www-data tmp logs
   docker compose exec app chmod -R 775 tmp logs
   ```

3. **Ejecutar migraciones en MariaDB:**
   ```bash
   docker compose exec app bin/cake migrations migrate
   ```

4. **Acceder en el navegador:**
   - Página de bienvenida y estado de conexión a BD: `http://localhost:8765`
   - CRUD de Estudiantes (`Students`): `http://localhost:8765/students`

## Pruebas de Red Interna y Resolución DNS

```bash
# 1. Inspeccionar la red bridge
docker network inspect practica-cakephp_red-laboratorio

# 2. Resolución DNS del servicio 'db' desde 'app'
docker compose exec app getent hosts db

# 3. Verificación de conectividad TCP con MariaDB
docker compose exec app mariadb-admin ping -h db -u cake_user -pcake_password
```
