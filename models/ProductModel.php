<?php
// Có class chứa các function thực thi tương tác với cơ sở dữ liệu 
class ProductModel
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Viết truy vấn danh sách sản phẩm 
    public function getAllProduct()
    {
        $sql = "SELECT  products.*, categories.name as categoryName  FROM  products INNER JOIN categories ON products.idCategory = categories.id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProductById($id)
    {
        $sql = "SELECT  products.*, categories.name as categoryName  FROM  products INNER JOIN categories ON products.idCategory = categories.id WHERE products.id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function insertProduct($name, $image, $price, $idCategory, $description, $view = 0, $discount = 0)
    {
        $sql = "INSERT INTO products (name, image, price, idCategory, description,view, discount) VALUES (?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([$name, $image, $price, $idCategory, $description, $view, $discount]);

    }
    public function deleteProduct($id)
    {
        $sql = "DELETE FROM products WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
    public function updateProduct($id, $name, $price, $image, $idCategory, $description)
    {
        $sql = "UPDATE products 
            SET name = ?, price = ?, image = ?, idCategory = ?, description = ? 
            WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$name, $price, $image, $idCategory, $description,$id]);
    }
}