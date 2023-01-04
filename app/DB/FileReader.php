<?php
namespace Bankas_2\DB;

use App\DB\DataBase;

class FileReader implements DataBase {

    private $data, $name;

    
    public function __construct($name)
    {
        $this->name = $name;
        if (!file_exists(__DIR__ . '/' . $this->name)) {
            $this->data = [];
        } 
        else {
            $this->data = json_decode(file_get_contents(__DIR__ . '/' . $this->name), 1);
        }
    }

    public function __destruct()
    {
        file_put_contents(__DIR__ . '/' . $this->name, json_encode($this->data));
    }


    private function getId() : int
    {
        if (!file_exists(__DIR__ . '/' . $this->name .'_id')) {
            file_put_contents(__DIR__ . '/' . $this->name .'_id', json_encode(1));
            return 1;
        } 
        else {
            $id = json_decode(file_get_contents(__DIR__ . '/' . $this->name .'_id'), 1);
            $id++;
            file_put_contents(__DIR__ . '/' . $this->name .'_id', json_encode($id));
            return $id;
        }
    }

    public function create(array $userData) : void
    {
        $userData['id'] = $this->getId();
        $this->data[] = $userData;
    }

    public function update(int $userId, array $userData) : void
    {
        $userData['id'] = $userId;
        $this->data = array_map(fn($data) => $userId == $data['id'] ? $userData : $data, $this->data);
    }

    public function delete(int $userId) : void
    {
        $this->data = array_filter($this->data, fn($data) => $userId != $data['id']);
    }

    public function show(int $userId) : array
    {
        foreach ($this->data as $data) {
            if ($userId == $data['ID']) {
                return $data;
            }
        }
        return [];
    }

    public function showAll() : array
    {
        return $this->data;
    }


}