{{-- resources/views/pages/imprint.blade.php --}}
@extends('layouts.main')

@section('title', 'Impressum – ' . config('app.name'))

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-4">Home Seite</h1>

        <p class="mb-2">Angaben gemäß § 5 TMG</p>
        <p class="mb-2">DPV‑Elektronik GmbH<br>
            Musterstraße 1<br>
            12345 Musterstadt</p>

        <h2 class="text-2xl font-semibold mt-6 mb-2">Kontakt</h2>
        <p>E‑Mail: <a href="mailto:info@dpv-elektronik.de"
                      class="text-blue-600 underline">info@dpv-elektronik.de</a></p>
    </div>
@endsection
