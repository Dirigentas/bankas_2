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
        $userData['ID'] = $this->getId();
        $this->data[] = $userData;
    }

    public function update(int $userId, string $type, array $userData) : void
    {
        $userData['ID'] = $userId;
        foreach ($this->data as $key => $single){
            if ($userId == $single['ID']) {
                $type == 'add' ?
                (float) $this->data[$key]['likutis'] += (float) $userData['pokytis'] :
                (float) $this->data[$key]['likutis'] -= (float) $userData['pokytis'];
            }
        }


    }

    public function delete(int $userId) : void
    {
        $this->data = array_filter($this->data, fn($data) => $userId != $data['ID']);
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
        usort($this->data, fn ($a, $b) => $a['pavarde'] <=> $b['pavarde']);
        return $this->data;
    }

    public function validateZero(int $userId) : bool
    {
        foreach ($this->data as $data) {
            if ($userId == $data['ID']) {
                return $data['likutis'] == 0;
            }
        }
    }

    public function validateNegative(int $userId, int $pokytis) : bool
    {
        foreach ($this->data as $data) {
            if ($userId == $data['ID']) {
                return $data['likutis'] - $pokytis < 0;
            }
        }
    }

    public function validatePersonalId(int $PersonalId) : bool
    {
        foreach ($this->data as $data) {
            if ($PersonalId == $data['asmens_kodas']) {
                return false;
            } else {
                return true;
            }
        }
    }

    public function validateLogin(string $name) : bool
    {
        foreach ($this->data as $data) {
            if ($name == $data['name']) {
                return true;
            }
        }
        return false;
    }
}