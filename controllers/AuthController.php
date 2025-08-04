<?php
require_once './models/AuthModel.php';

class AuthController
{
    protected $model;

    public function __construct()
    {
        $this->model = new AuthModel();
    }

    public function signUp()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            $confirmPassword = $_POST['confirm_password'] ?? '';

            if (empty($name) || empty($email) || empty($password)) {
                $_SESSION['error'] = 'Vui lòng điền đầy đủ thông tin';
                header('Location: ?act=signup');
                exit;
            }

            if ($password !== $confirmPassword) {
                $_SESSION['error'] = 'Mật khẩu phải giống nhau';
                header('Location: ?act=signup');
                exit;
            }

            if (strlen($password) < 6) {
                $_SESSION['error'] = 'Mật khẩu phải có ít nhất 6 ký tự';
                header('Location: ?act=signup');
                exit;
            }

            $existingUser = $this->model->getUserByEmail($email);
            if ($existingUser) {
                $_SESSION['error'] = 'Email đã được sử dụng!';
                header('Location: ?act=signup');
                exit;
            }

            if ($this->model->signUp($name, $email, $password)) {
                $_SESSION['success'] = 'Đăng ký thành công! Vui lòng đăng nhập.';
                header('Location: ?act=signin');
                exit;
            } else {
                $_SESSION['error'] = 'Đã xảy ra lỗi! Vui lòng thử lại.';
                header('Location: ?act=signup');
                exit;
            }
        }

        require_once "./views/auth/signup.php";
    }

    public function signIn()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            if (empty($email) || empty($password)) {
                $_SESSION['error'] = 'Vui lòng điền đầy đủ thông tin';
                header('Location: ?act=signin');
                exit;
            }

            $user = $this->model->signIn(email: $email, password: $password);

            if ($user) {
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'role' => $user['role'],
                    'image' => $user['image']
                ];
                $_SESSION['success'] = 'Đăng nhập thành công!';
                header('Location: ?act=/');
                exit;
            } else {
                $_SESSION['error'] = 'Email hoặc mật khẩu không chính xác';
                header('Location: ?act=signin');
                exit;
            }
        }

        require_once "./views/auth/signin.php";
    }

    // Đăng xuất
    public function logout()
    {

        session_destroy();
        header('Location: ?act=/');
        exit;
    }
}