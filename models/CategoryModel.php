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
        $sql = "SELECT * FROM categories WHERE category_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // Thêm mới danh mục
    public function insertCategory($name, $description, $parent_id = null): bool
    {
        $sql = "INSERT INTO categories (name, description, parent_id) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$name, $description, $parent_id]);
    }
    // Cập nhật danh mục
    public function updateCategory($id, $name, $description, $parent_id = null): bool
    {
        $sql = "UPDATE categories SET name = ?, description = ?, parent_id = ? WHERE category_id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$name, $description, $parent_id, $id]);
    }
    // Xóa danh mục
    public function deleteCategory($id): bool
    {
        $sql = "DELETE FROM categories WHERE category_id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}

