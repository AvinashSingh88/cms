<?php
namespace App\Repositories;
use App\Repositories\Interfaces\TestimonialRepositoryInterface;
use App\Models\Testimonial;

class TestimonialRepository implements TestimonialRepositoryInterface
{
    public function allTestimonials()
    {
        $testimonials = Testimonial::select('*')->latest()->paginate(10);
        return $testimonials;
    }

    public function storeTestimonial($request, $data)
    {
        $testimonial = new Testimonial();
        $testimonial->name = $data['name'];
        $testimonial->designation = $data['designation'];
        $testimonial->message = $data['message'];
        if($data['img']){
            $testimonial->img = $data['img'];
        }else{
            $testimonial->img = NULL;
        }

        $testimonial->status = $data['status'];
        $testimonial->created_by = $data['created_by'];
        $testimonial->save();
    }

    public function findTestimonial($id)
    {
        return Testimonial::find($id);
    }

    public function updateTestimonial($data, $id)
    {
        $testimonial = Testimonial::find($id);
        $testimonial->name = $data['name'];
        $testimonial->designation = $data['designation'];
        $testimonial->message = $data['message'];
        if($data['img']){
            $testimonial->img = $data['img'];
        }
        $testimonial->status = $data['status'];
        $testimonial->updated_by = $data['updated_by'];
        $testimonial->save();
    }

}