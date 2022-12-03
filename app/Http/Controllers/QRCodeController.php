<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QRCodeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');   
    }

    public function generate(Request $request) {
        $validated = $request->validate([
            'content' => 'required|max:1800',
            'size' => 'required',
        ]);

        $content = $request->content;
        $size = $request->size;
        $background = $request->background;
        $fill = $request->fill;

        $qrcode = \QrCode::size($size);

        if($background)
            $qrcode->backgroundColor($background);
        if($fill)
            $qrcode->color($fill);

        $qrcode = $qrcode->generate($content);

        return $qrcode;
    }

}
