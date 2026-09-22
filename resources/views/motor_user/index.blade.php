@extends('layouts.app')

@section('title', 'Daftar Motor')

@section('content')

<main class="list-view">

    <div class="list-head">

        <h2>Daftar Motor</h2>

        <p class="hero-sub">
            Pilih motor yang ingin kamu sewa.
        </p>

    </div>


    {{-- FILTER KATEGORI --}}

    <div class="chip-row">

        <a href="{{ route('motor_user.index') }}"
           class="chip">
            Semua
        </a>

        @foreach ($kategori as $item)

            <a href="{{ route('motor_user.index') }}?kategori={{ $item->nama_kategori }}"
               class="chip">
                {{ $item->nama_kategori }}
            </a>

        @endforeach

    </div>


    {{-- DATA MOTOR --}}

    <div class="grid">

        @forelse ($motors as $motor)

            <a href="{{ route('motor.detail', $motor->id) }}"
               class="card">

                <div class="card-top">

                    <div class="motor-image">
                        🏍️
                    </div>

                    @if (!$motor->tersedia)

                        <span class="badge-unavailable">
                            Dipakai
                        </span>

                    @endif

                </div>


                <div class="card-body">

                    <div class="card-row">

                        <h3>
                            {{ $motor->nama_motor }}
                        </h3>

                        <span class="plate-tag">
                            {{ $motor->plat_nomor }}
                        </span>

                    </div>


                    <p class="card-cat">
                        ·
                        {{ $motor->cc }}cc
                    </p>


                    <p class="card-tag">
                        Cocok untuk
                        {{ $motor->cocok_untuk }}
                    </p>


                    <div class="card-footer">

                        <span class="price">

                            Rp{{ number_format($motor->kategori->harga_per_hari, 0, ',', '.') }}

                            <span class="price-unit">
                                /hari
                            </span>

                        </span>

                        <span class="card-cta">
                            Lihat Detail →
                        </span>

                    </div>

                </div>

            </a>

        @empty

            <p>
                Belum ada motor tersedia.
            </p>

        @endforelse

    </div>

</main>

@endsection