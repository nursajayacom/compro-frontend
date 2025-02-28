@extends('layouts.guest')

@section('title', 'Berita')

@section('content')
<div class="pt-20 px-6 sm:px-16">
    <div class="relative w-full h-[400px] bg-cover bg-center" style="background-image: url('{{ $data[0]['image'] }}'); background-size: cover; background-repeat: no-repeat;">
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="relative z-10 flex flex-col justify-end h-full px-6 pb-6 mx-auto text-white">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mt-4">
                <div class="w-full sm:w-1/2">
                    <h1 class="text-2xl font-bold leading-snug md:text-4xl">{{ $data[0]['title'] }}</h1>
                    <p class="text-sm mt-2">{{ \Carbon\Carbon::parse($data[0]['date'])->translatedFormat('d F Y') }}</p>
                </div>
                <a href="{{ $data[0]['link'] }}" class="px-4 py-3 w-max text-sm font-semibold text-white bg-transparent border border-white rounded-full mt-4 sm:mt-0">Selengkapnya</a>
            </div>
        </div>
    </div>
</div>

<!-- News Cards -->
<div class="py-20 grid grid-cols-1 gap-6 px-6 sm:px-16 mt-8 sm:grid-cols-2 lg:grid-cols-3">
    <!-- Card -->
    @foreach ($data as $item)
        @if ($loop->first)
            @continue
        @endif
        <a href="{{ $item['link'] }}">
            <div class="overflow-hidden bg-white">
                <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="w-full h-48 object-cover rounded-lg" />
                <div class="py-6">
                    <div class="flex flex-row items-center gap-2">
                        <span class="text-triary text-xs">{{ \Carbon\Carbon::parse($item['date'])->translatedFormat('d F Y') }}</span>
                    </div>
                    <h3 class="mt-3 text-lg font-semibold text-gray-800 leading-tight">{{ $item['title'] }}</h3>
                    <p class="mt-2 text-sm text-gray-600 line-clamp-3">{{ $item['description'] }}</p>
                </div>
            </div>
        </a>
    @endforeach
</div>
@endsection
