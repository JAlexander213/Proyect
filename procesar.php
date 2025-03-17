<?php
session_start();
require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (isset($_POST['login'])) {
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['usuario_id'] = $user['id'];
            $_SESSION['usuario'] = $user['usuario'];
            header('Location: ProgramasJ/Parcial1/index.html');
            exit;
        } else {
            echo "Datos incorrectos";
        }
    } elseif (isset($_POST['register'])) {
        $nombre = $_POST['nombre'] ?? '';
        $usuario = $_POST['usuario'] ?? '';

        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email OR usuario = :usuario");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();
        $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existingUser) {
            echo "El correo o el usuario ya están registrados.";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, email, usuario, password) VALUES (:nombre, :email, :usuario, :password)");
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':usuario', $usuario);
            $stmt->bindParam(':password', $hashedPassword);

            if ($stmt->execute()) {
                echo "Registro exitoso.";
                header('Location: ProgramasJ/Parcial1/index.html');
                exit;
            } else {
                echo "Error en la consulta: ";
                print_r($stmt->errorInfo());
            }
        }
    }
}
?>
