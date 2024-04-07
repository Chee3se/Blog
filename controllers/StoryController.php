<?php

namespace controllers;

class StoryController
{
    public function index()
    {
        $page_title = "Story";
        $title = "Cheese";
        $programmers = ["Toms", "Enriko", "Ričards", "Kevins Markuss", "Nikolajs", "Harijs", "Raivo", "Kristians", "Ruslans", "Ričards", "Vladyslav", "Markuss", "Emīls", "Sandris", "Karīna Evelīna", "Markuss Raivo", "Daniils", "Ernests", "Rūdolfs", "Gerda Anita", "Alberts", "Jēkabs"] ;

        view('story', [
            'page_title' => 'Story',
            'title' => $title,
            'programmers' => $programmers
        ]);
    }
}