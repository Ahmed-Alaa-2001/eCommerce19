<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

interface productInterfaceController
{
    function Home();
    function detail($id);
    function search(Request $req);
}
