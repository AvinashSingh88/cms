<?php
namespace App\Repositories\Interfaces;

Interface StaffRepositoryInterface{
    public function allStaffs();
    public function storeStaff($data);
    public function findStaff($id);
    public function updateStaff($data, $id); 
}