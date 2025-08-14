<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Autenticación</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <?php if (isset($data['is_logged_in']) && $data['is_logged_in']): ?>
            <!-- Vista cuando el usuario está autenticado -->
            <div class="bg-white p-8 rounded-lg shadow-md">
                <h1 class="text-2xl font-bold text-gray-800 mb-6">¡Bienvenido!</h1>
                <?php if (isset($data['message'])): ?>
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                        <?= htmlspecialchars($data['message']) ?>
                    </div>
                <?php endif; ?>
                <div class="space-y-4">
                    <p><strong>Nombre:</strong> <?= htmlspecialchars($data['name'] ?? '') ?></p>
                    <p><strong>Email:</strong> <?= htmlspecialchars($data['email'] ?? '') ?></p>
                </div>
                <div class="mt-6">
                    <a href="/" class="text-blue-600 hover:underline">Cerrar sesión</a>
                </div>
            </div>
        <?php else: ?>
            <!-- Formulario de inicio de sesión -->
            <div class="bg-white p-8 rounded-lg shadow-md">
                <h1 class="text-2xl font-bold text-gray-800 mb-6">Iniciar sesión</h1>
                
                <?php if (isset($data['error'])): ?>
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                        <?= htmlspecialchars($data['error']) ?>
                    </div>
                <?php endif; ?>

                <form method="POST" action="create">
                    <div class="mb-5">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Correo electrónico</label>
                        <input type="email" 
                               name="email" 
                               id="email" 
                               value="<?= htmlspecialchars($data['email'] ?? '') ?>"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                               placeholder="tu@email.com" 
                               required />
                    </div>
                    <div class="mb-5">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Contraseña</label>
                        <input type="password" 
                               name="password" 
                               id="password" 
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                               required />
                    </div>
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Iniciar sesión
                    </button>
                </form>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>