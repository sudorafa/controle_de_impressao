<?php

class User
{
	private $userID, $sector, $nome;

    
    public function setID($id) {
        $this->userID = $id;
    }

    public function getID() {
        return $this->userID;
    }

    public function setSector($sector) {
        $this->sector = $sector;
    }

    public function getSector() {
        return $this->sector;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }
}

class Printer
{
	private $printerID, $model, $ip, $setor;

    
    public function setID($id) {
        $this->printerID = $id;
    }

    public function getID() {
        return $this->printerID;
    }

    public function setSector($sector) {
        $this->sector = $sector;
    }

    public function getSector() {
        return $this->sector;
    }

    public function setModel($model) {
        $this->model = $model;
    }

    public function getModel() {
        return $this->model;
    }

    public function setIP($ip) {
        $this->ip = $ip;
    }

    public function getIP() {
        return $this->ip;
    }

    class Register
{
	private $registerID, $pages, $name, $dataHora, $user;

    
    public function setID($id) {
        $this->registerID = $id;
    }

    public function getID() {
        return $this->registerID;
    }

    public function setPages($pages) {
        $this->pages = $pages;
    }

    public function getPages() {
        return $this->pages;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function setDate($dataHora) {
        $this->dataHora = $dataHora;
    }

    public function getDate() {
        return $this->dataHora;
    }

    public function setIP(User $user) {
        $this->user = $user;
    }

    public function getIP() {
        return $this->user;
    }
}

   class Prints
{
    private $qty, $file, $printer;

    
    public function setQty($qty) {
        $this->qty = $qty;
    }

    public function getQty() {
        return $this->qty;
    }

    public function setFile(File $file) {
        $this->file = $file;
    }

    public function getFile() {
        return $this->file;
    }

    public function setPrinter(Printer $printer) {
        $this->printer = $printer;
    }

    public function getName() {
        return $this->printer;
    }
}

?>