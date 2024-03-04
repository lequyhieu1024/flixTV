<?php

namespace App\Models\Client;

use App\Models\BaseModel;

class Contacts extends BaseModel
{
    protected $table = 'contacts';
    public function sendContact($data)
    {
        $fullname = $data['fullname'];
        $email = $data['email'];
        $subject = $data['subject'];
        $content = $data['content'];
        $sql = "INSERT INTO $this->table (fullname, email, subject, content) VALUES(?,?,?,?)";
        $this->setQuery($sql);
        $options = [$fullname, $email, $subject, $content];
        return $this->execute($options);
    }
}
