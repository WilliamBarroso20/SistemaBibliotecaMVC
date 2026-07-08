-- ========================================================
-- LIMPIEZA Y CREACIÓN DE LA BASE DE DATOS
-- ========================================================
-- (Líneas de creación de BD eliminadas por restricciones de seguridad en Clever Cloud)

-- ========================================================
-- 1. TABLAS INDEPENDIENTES 
-- ========================================================

-- Tabla: Autores
CREATE TABLE autores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    nacionalidad VARCHAR(100) NOT NULL
);

-- Tabla: Categorías
CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);

-- Tabla: Editoriales
CREATE TABLE editoriales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    telefono VARCHAR(20) NULL
);

-- Tabla: Lectores (Los estudiantes o usuarios de la biblioteca)
CREATE TABLE lectores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    correo VARCHAR(150) NOT NULL UNIQUE,
    telefono VARCHAR(20) NULL
);

-- Tabla: Empleados (El personal que administra y atiende el sistema)
CREATE TABLE empleados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    cargo VARCHAR(100) NOT NULL,
    telefono VARCHAR(20) NULL,
    usuario VARCHAR(50) NULL UNIQUE,
    clave VARCHAR(255) NULL
);


-- ========================================================
-- 2. TABLAS DEPENDIENTES (Tienen relaciones / Llaves Foráneas)
-- ========================================================

-- Tabla: Libros
-- Relaciona un libro con su respectivo Autor, Categoría y Editorial
CREATE TABLE libros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(200) NOT NULL,
    anio_publicacion INT NOT NULL,
    autor_id INT NOT NULL,
    categoria_id INT NOT NULL,
    editorial_id INT NOT NULL,
    
    -- Restricciones de Llaves Foráneas (Borrado en cascada para mantener la integridad)
    FOREIGN KEY (autor_id) REFERENCES autores(id) ON DELETE CASCADE,
    FOREIGN KEY (categoria_id) REFERENCES categorias(id) ON DELETE CASCADE,
    FOREIGN KEY (editorial_id) REFERENCES editoriales(id) ON DELETE CASCADE
);

-- Tabla: Reservas
-- Permite a un Lector apartar un Libro antes de retirarlo
CREATE TABLE reservas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    libro_id INT NOT NULL,
    lector_id INT NOT NULL,
    fecha_reserva DATE NOT NULL,
    estado ENUM('Activa', 'Completada', 'Cancelada') DEFAULT 'Activa',
    
    FOREIGN KEY (libro_id) REFERENCES libros(id) ON DELETE CASCADE,
    FOREIGN KEY (lector_id) REFERENCES lectores(id) ON DELETE CASCADE
);

-- Tabla: Préstamos
-- Registra la salida de un Libro, asignado a un Lector y procesado por un Empleado
CREATE TABLE prestamos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    libro_id INT NOT NULL,
    lector_id INT NOT NULL,
    empleado_id INT NOT NULL,
    fecha_prestamo DATE NOT NULL,
    fecha_devolucion_esperada DATE NOT NULL,
    estado ENUM('Pendiente', 'Devuelto', 'Finalizado') DEFAULT 'Pendiente',
    
    FOREIGN KEY (libro_id) REFERENCES libros(id) ON DELETE CASCADE,
    FOREIGN KEY (lector_id) REFERENCES lectores(id) ON DELETE CASCADE,
    FOREIGN KEY (empleado_id) REFERENCES empleados(id) ON DELETE CASCADE
);

-- Tabla: Devoluciones
-- Se genera cuando el lector regresa el libro enlazado a su préstamo original
CREATE TABLE devoluciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    prestamo_id INT NOT NULL,
    fecha_devolucion_real DATE NOT NULL,
    estado_libro ENUM('Bueno', 'Dañado', 'Perdido') DEFAULT 'Bueno',
    
    FOREIGN KEY (prestamo_id) REFERENCES prestamos(id) ON DELETE CASCADE
);

-- Tabla: Multas
-- Si la devolución registra retraso o el libro está dañado, se vincula un cargo económico
CREATE TABLE multas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    devolucion_id INT NOT NULL,
    monto DECIMAL(10,2) NOT NULL,
    estado ENUM('Pendiente', 'Pagada') DEFAULT 'Pendiente',
    
    FOREIGN KEY (devolucion_id) REFERENCES devoluciones(id) ON DELETE CASCADE
);