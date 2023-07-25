<?php
namespace App\Repositories\Interfaces;
use Illuminate\Http\Request;

Interface ServiceRepositoryInterface{
    public function getServiceMenu();

    /** CMS Page Interface Start */
    public function allServicesPages();
    public function storeServicesPage($request, $data);
    public function findServicesPage($id);
    public function updateServicesPage($data, $id); 
    /** CMS Page Interface End */

}