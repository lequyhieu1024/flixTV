<?php

namespace App\Models\Client;

use App\Models\BaseModel;

class Users extends BaseModel
{
    protected $table = 'users';
    public function getDetail($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function Register($data)
    {
        $username = $data['username'];
        $password = $data['password'];
        $email = $data['email'];
        $verification_code = $data['verification_code'];
        $sql = "INSERT INTO $this->table (username,password,email,verification_code) VALUES (?,?,?,?)";
        $this->setQuery($sql);
        $options = [$username, $password, $email, $verification_code];
        return $this->execute($options);
    }
    public function verifiedEmail($code)
    {
        $sql = "UPDATE $this->table SET verified = 1 WHERE verification_code = ?";
        $this->setQuery($sql);
        $option = [$code];
        return $this->execute($option);
    }
    public function isVerifired($email)
    {
        $sql = "SELECT id FROM $this->table WHERE email = ? AND verified = 0";
        $this->setQuery($sql);
        return $this->loadRow([$email]);
    }
    public function isVerifiredLogin($data)
    {
        $password = $data['password'];
        $email = $data['email'];
        $sql = "SELECT id FROM $this->table WHERE email = ? AND password=? AND verified = 0";
        $this->setQuery($sql);
        $option = [$email, $password];
        return $this->loadRow($option);
    }
    public function checkRegister($email)
    {
        $sql = "SELECT id FROM $this->table WHERE email = ? AND verified = 1";
        $this->setQuery($sql);
        return $this->loadRow([$email]);
    }
    public function login($data)
    {
        $email = $data['email'];
        $password = $data['password'];
        $sql = "SELECT id,email, password , modifier FROM $this->table WHERE email = ? AND password = ? AND verified =1";
        $this->setQuery($sql);
        $options = [$email, $password];
        return $this->loadRow($options);
    }
    public function fogotPassword($email)
    {
        $sql =  "SELECT id,email,verification_code FROM $this->table WHERE email = ? AND verified = 1";
        $this->setQuery($sql);
        return $this->loadRow([$email]);
    }
    public function updatePass($data)
    {
        $password = $data['password'];
        $id = $data['id'];
        $verification_code = $data['verification_code'];
        $sql = "UPDATE $this->table SET password = ? WHERE id = ? AND verification_code = ?";
        $this->setQuery($sql);
        $options = [$password, $id, $verification_code];
        return $this->execute($options);
    }
    public function active($id)
    {
        $sql = "UPDATE $this->table SET is_active = 1 WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
    public function unActive($id)
    {
        $sql = "UPDATE $this->table SET is_active = 0 WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
}
