<?php
namespace App\Repositories\Interfaces;
use Illuminate\Http\Request;

Interface BusinessRepositoryInterface{
    public function getSocialMediaLink();
    public function updateSocialMedia($data);
}