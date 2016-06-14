<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use phpDocumentor\Reflection\Types\Integer;

abstract class AbstractController extends Controller
{
    abstract function index();
    abstract function show($id);
}
