<?php

use App\Http\Controllers\FuzzyController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get("/", function () {
    return view("fuzzy.form");
});

Route::post("/fuzzy/proses", [FuzzyController::class, 'proses'])->name('fuzzy.proses');