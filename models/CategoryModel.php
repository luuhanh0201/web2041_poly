<?php

class CategoryModel
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    // Lấy tất cả danh mục
    public function getAllCategories(): array
    {
        $sql = "SELECT * FROM categories";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Lấy danh mục theo ID
    public function getCategoryById($id)
    {
        $sql = "SELECT * FROM categories WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // Thêm mới danh mục
    public function insertCategory($name)
    {
        $sql = "INSERT INTO categories (name) VALUES (?)";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([$name]);

    }
    // Cập nhật danh mục
    public function updateCategory($id, $name)
    {
        $sql = "UPDATE categories SET name = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$name, $id]);
    }
    // Xóa danh mục
    public function deleteCategory($id)
    {
        $sql = "DELETE FROM categories WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}

