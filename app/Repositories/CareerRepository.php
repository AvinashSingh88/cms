<?php
namespace App\Repositories;
use App\Repositories\Interfaces\CareerRepositoryInterface;
use App\Models\Career;

class CareerRepository implements CareerRepositoryInterface
{
    public function allCareerPages(){
        return Career::select('*')->latest()->paginate(10);
    }

    public function storeCareerPage($request, $data){
        $career = new Career();
        $career->title = $data['title'];
        $career->description = $data['description'];
        $career->status = $data['status'];
        $career->created_by = $data['created_by'];
        $career->save();
    }

    public function findCareerPage($id){
        return Career::find($id);
    }

    public function updateCareerPage($data, $id){
        $career = Career::where('id', $id)->first();
        $career->title = $data['title'];
        $career->description = $data['description'];
        $career->status = $data['status'];
        $career->updated_by = $data['updated_by'];
        $career->save();
    }

}