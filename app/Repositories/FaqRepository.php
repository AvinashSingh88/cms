<?php
namespace App\Repositories;
use App\Repositories\Interfaces\FaqRepositoryInterface;
use App\Models\Faq;

class FaqRepository implements FaqRepositoryInterface
{
    public function allFaqs()
    {
        $faqs = Faq::select('*')->latest()->paginate(10);
        return $faqs;
    }

    public function storeFaq($request, $data)
    {
        $faq = new Faq();
        $faq->question = $data['question'];
        $faq->answer = $data['answer'];
        $faq->status = $data['status'];
        $faq->save();
    }

    public function findFaq($id)
    {
        return Faq::find($id);
    }

    public function updateFaq($data, $id)
    {
        $faq = Faq::find($id);
        $faq->question = $data['question'];
        $faq->answer = $data['answer'];
        $faq->status = $data['status'];
        $faq->save();
    }

}