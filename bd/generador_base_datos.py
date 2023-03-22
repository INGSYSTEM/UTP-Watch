import sqlite3

# Conectar a la base de datos (o crearla si no existe)
conn = sqlite3.connect('db_usuarios.db')

# Crear una tabla llamada 'usuarios'
conn.execute('''CREATE TABLE usuarios
             (ID INT PRIMARY KEY NOT NULL,
             USUARIO TEXT NOT NULL,
             CORREO TEXT NOT NULL,
             CONTRASEÑA TEXT NOT NULL);''')

# Cerrar la conexión a la base de datos
conn.close()