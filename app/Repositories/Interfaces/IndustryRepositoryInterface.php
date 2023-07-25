<?php
namespace App\Repositories\Interfaces;
use Illuminate\Http\Request;

Interface IndustryRepositoryInterface{
    public function getIndustryMenu();

    /** CMS Page Interface Start */
    public function allIndustryPages();
    public function storeIndustryPage($request, $data);
    public function findIndustryPage($id);
    public function updateIndustryPage($data, $id); 
    /** CMS Page Interface End */

}