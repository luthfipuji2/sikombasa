<?php

namespace App\Http\Controllers\Translator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Klien\Order;
use App\Models\Translator\Translator;
use App\Models\User;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $translator = Translator::where('id', $user->id)->latest('updated_at')->first();
        $order = DB::table('order')
        ->join('klien', 'order.id_klien', '=', 'klien.id_klien')
        ->join('users', 'klien.id', '=', 'users.id')
        ->join('review', 'order.id_order', '=', 'review.id_order')
        ->select('order.id_order',
                 'review.created_at',
                 'review.rating',
                 'review.review_text',
                 'review.id_review',
                 'users.name',
                 'users.email')
        ->where('id_translator', $translator->id_translator)
        ->get();

        return view('pages.translator.review', [
            'order'=>$order
        ]);
    }
}