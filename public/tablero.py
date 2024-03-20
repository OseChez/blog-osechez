import bpy

# Elimina todos los objetos de la escena
bpy.ops.object.select_all(action='DESELECT')
bpy.ops.object.select_by_type(type='MESH')
bpy.ops.object.delete()

# Dimensiones del tablero de ajedrez
filas = 8
columnas = 8
tamano_casilla = 2.0

# Colores de las casillas
color_blanco = (1, 1, 1, 1)
color_negro = (0, 0, 0, 1)

# Crea el tablero de ajedrez
for fila in range(filas):
    for columna in range(columnas):
        x = fila * tamano_casilla
        y = columna * tamano_casilla
        z = 0
        color = color_blanco if (fila + columna) % 2 == 0 else color_negro

        bpy.ops.mesh.primitive_plane_add(size=tamano_casilla, location=(x, y, z))
        plano = bpy.context.object
        plano.name = f"Casilla_{fila}_{columna}"

        # Asigna el color de la casilla
        plano.data.materials.append(bpy.data.materials.new(name=f"Material_{fila}_{columna}"))
        plano.data.materials[-1].diffuse_color = color

# Configura la cámara
bpy.ops.object.camera_add(location=(1, 1, 2), rotation=(1, 2, 0))
camera = bpy.context.object
bpy.context.scene.camera = camera

# Ajusta la resolución de la cámara
bpy.context.scene.render.resolution_x = 1210
bpy.context.scene.render.resolution_y = 750

# Configura la iluminación
bpy.ops.object.light_add(type='SUN', location=(1, -2, 3))
luz = bpy.context.object
luz.data.energy = 2.0

# Configura el modo de sombreado
for obj in bpy.context.scene.objects:
    bpy.context.view_layer.objects.active = obj
    bpy.ops.object.shade_smooth()

