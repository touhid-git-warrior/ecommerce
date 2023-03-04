<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function CategorieManage(){

        return view('admin.component.categorie.managecategorie');
    }
}
