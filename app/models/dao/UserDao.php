<?php

namespace App\Models\BD;

use App\Models\BD\Dao;

class UserDao extends Dao {

    public function login($email, $password) {
        try {
            $sql = "SELECT * FROM users 
                WHERE email = :email AND password = :password 
                LIMIT 1";
            
            $req = $this->pdo->prepare($sql);
            $req->bindValue(":email", $email);
            $req->bindValue(":password", $password);
            $req->execute();

            $result = $req->fetch(\PDO::FETCH_ASSOC);

            return $result;
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            return null;
        }
    }

    public function findAll($emailUser){
        try {
            $sql = "SELECT * FROM users WHERE email <> :email";
            
            $req = $this->pdo->prepare($sql);
            $req->bindValue(":email", $emailUser);
            $req->execute();

            $result = $req->fetchAll(\PDO::FETCH_ASSOC);

            return $result;
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            return null;
        }
    }

    public function findById($id){
        try {
            $sql = "SELECT name, description, email, url_image, github, dt_birth, office, phone, city, bio FROM users WHERE id = :id LIMIT 1";
            
            $req = $this->pdo->prepare($sql);
            $req->bindValue(":id", $id);
            $req->execute();

            $result = $req->fetch(\PDO::FETCH_ASSOC);

            return $result;
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            return null;
        }
    }

    public function create($data) {
        try {
            $sql = "INSERT INTO users (name, description, email, password, url_image, github, dt_birth, office, phone, city, bio, isAdmin)
                VALUES (:name, :description, :email, :password, :url_image, :github, :dt_birth, :office, :phone, :city, :bio, false)";
            
            $req = $this->pdo->prepare($sql);
            $req->bindValue(":name", $data["name"]);
            $req->bindValue(":description", $data["description"]);
            $req->bindValue(":email", $data["email"]);
            $req->bindValue(":password", $data["password"]);
            $req->bindValue(":url_image", $data["url_image"]);
            $req->bindValue(":github", $data["github"]);
            $req->bindValue(":dt_birth", $data["dt_birth"]);
            $req->bindValue(":office", $data["office"]);
            $req->bindValue(":phone", $data["phone"]);
            $req->bindValue(":city", $data["city"]);
            $req->bindValue(":bio", $data["bio"]);
            $req->execute();

            $sqlResult = "SELECT name, description, email, url_image, github, dt_birth, office, phone, city, bio  
            FROM users WHERE email = :email LIMIT 1";

            $reqSelect = $this->pdo->prepare($sqlResult);
            $reqSelect->bindValue(":email", $data["email"]);
            $reqSelect->execute();

            $result = $reqSelect->fetch(\PDO::FETCH_ASSOC);

            return $result;
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            return null;
        }
    }

    public function update($id, $data) {
        try {
            $sql = "UPDATE users SET name = :name, description = :description, email = :email, password = :password, url_image = :url_image, github = :github, dt_birth = :dt_birth, office = :office, city = :city, bio = :bio WHERE id = :id";
            
            $req = $this->pdo->prepare($sql);
            $req->bindValue(":id", $id);
            $req->bindValue(":name", $data["name"]);
            $req->bindValue(":description", $data["description"]);
            $req->bindValue(":email", $data["email"]);
            $req->bindValue(":password", $data["password"]);
            $req->bindValue(":url_image", $data["url_image"]);
            $req->bindValue(":github", $data["github"]);
            $req->bindValue(":dt_birth", $data["dt_birth"]);
            $req->bindValue(":office", $data["office"]);
            $req->bindValue(":city", $data["city"]);
            $req->bindValue(":bio", $data["bio"]);
            $req->execute();

            $sqlResult = "SELECT * FROM users WHERE id = :id LIMIT 1";

            $reqSelect = $this->pdo->prepare($sqlResult);
            $reqSelect->bindValue(":id", $id);
            $reqSelect->execute();

            $result = $reqSelect->fetch(\PDO::FETCH_ASSOC);

            return $result;
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            return null;
        }
    }

    public function destroy($id) {
        try {
            $sql = "DELETE FROM users WHERE id = :id";
            
            $req = $this->pdo->prepare($sql);
            $req->bindValue(":id", $id);
            $req->execute();

            return true;
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

}