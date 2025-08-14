<?php
namespace App\Controllers;

use App\Models\AuthUserModel;
use App\ControllerBase;

class HomeController extends ControllerBase
{
    public function index()
    {
        $this->renderView('index_view');
    }

    public function create()
    {
        // Verificar si se envió el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $authUserModel = new AuthUserModel();
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            
            // Depuración
            error_log("Intentando autenticar: " . $email);
            
            $login = $authUserModel->login($email, $password);
            
            // Depuración
            error_log("Resultado del login: " . ($login ? 'true' : 'false'));
            
            if ($login) {
                $data = [
                    'name' => 'Miguel',
                    'email' => $email,
                    'message' => '¡Inicio de sesión exitoso!',
                    'is_logged_in' => true
                ];
                $this->renderView('index_view', $data);
                return;
            } else {
                $data = [
                    'error' => 'Credenciales incorrectas. Usa miguel@gmail.com / 123456',
                    'email' => $email,
                    'is_logged_in' => false
                ];
                $this->renderView('index_view', $data);
                return;
            }
        }
        
        // Si no es POST, mostrar el formulario
        $data = [
            'is_logged_in' => false,
            'email' => ''
        ];
        $this->renderView('index_view', $data);
    }
}
