<?php
namespace App;

class ControllerBase
{
    protected function renderView(string $view, array $data = []): void
    {
        // Asegurarse de que la ruta del archivo de vista sea segura
        $viewFile = __DIR__ . '/Views/' . $view . '.php';
        
        if (!file_exists($viewFile)) {
            throw new \RuntimeException("La vista {$view} no existe");
        }
        
        // Extraer las variables del array $data a variables individuales
        extract($data, EXTR_SKIP);
        
        // Iniciar el buffer de salida
        ob_start();
        
        // Incluir el archivo de vista
        include $viewFile;
        
        // Obtener el contenido del buffer y limpiarlo
        $content = ob_get_clean();
        
        // Imprimir el contenido
        echo $content;
    }
}
