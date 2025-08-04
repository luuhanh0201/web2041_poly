<?php
// Có class chứa các function thực thi tương tác với cơ sở dữ liệu 
class AuthModel
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getUserByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function signUp($name, $email, $password)
    {
        if ($this->getUserByEmail($email)) {
            return false;
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO users (name, email, password, active, role) 
                VALUES (:name, :email, :password, 1, 'user')";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            'name' => $name,
            'email' => $email,
            'password' => $hashedPassword
        ]);
    }

    public function signIn($email, $password)
    {
        $user = $this->getUserByEmail($email);
        if (!$user) {
            return null;
        }

        if (password_verify($password, $user['password'])) {
            return $user;
        }

        return null;
    }
}