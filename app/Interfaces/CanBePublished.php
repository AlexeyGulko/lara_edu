<?php


namespace App\Interfaces;


use Illuminate\Http\Request;

interface CanBePublished
{
    public function publishRoute();

    public function publish();
}
