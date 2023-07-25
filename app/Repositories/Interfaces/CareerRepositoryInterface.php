<?php
namespace App\Repositories\Interfaces;
use Illuminate\Http\Request;

Interface CareerRepositoryInterface{
    public function allCareerPages();
    public function storeCareerPage($request, $data);
    public function findCareerPage($id);
    public function updateCareerPage($data, $id); 
}