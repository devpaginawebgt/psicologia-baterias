<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{
    private const ALLOWED = [
        'Carta Introductoria.pdf',
        'Consentimiento Informado.pdf',
        'Ejercicios de Emociones para casa.pdf',
        'Ejercicios reduccion Estres para casa.pdf',
        'Reuniones Zoom.pdf',
        'AUDIO-2025-05-06.m4a',
        'AUDIO-2025-07-04.m4a',
    ];

    public function show(string $filename)
    {
        return $this->serve($filename, asAttachment: false);
    }

    public function download(string $filename)
    {
        return $this->serve($filename, asAttachment: true);
    }

    private function serve(string $filename, bool $asAttachment)
    {
        abort_unless(in_array($filename, self::ALLOWED, true), 404);

        $path = 'materiales/' . $filename;

        abort_unless(Storage::disk('local')->exists($path), 404);

        return $asAttachment
            ? Storage::disk('local')->download($path)
            : Storage::disk('local')->response($path);
    }
}
