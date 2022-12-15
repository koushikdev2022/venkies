<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function get_mails(){
        $mails= Support::latest()->get('email');
        return $this->SuccessResponse(200,'Data fetch successfully ..!',$mails);
    }
}
