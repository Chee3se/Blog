<?php

namespace controllers;

class AboutController
{
    public function index()
    {
        view('about', [
            'page_title' => 'About Us'
        ]);
    }
}