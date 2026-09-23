@extends('layouts.app')

@section('title', $motor->nama)

@section('content')

<main class="detail-view">

    <a href="{{ route('motor_user.index') }}"
       class="back-link">

        ← Kembali ke daftar

    </a>


    <div class="detail-grid">

        {{-- GAMBAR --}}

        <div class="detail-art">

            <div class="hero-glow"></div>

            <div class="detail-motor">
                🏍️
            </div>

            <span class="plate-tag plate-tag-lg">
                {{ $motor->plat_nomor }}
            </span>

        </div>


        {{-- INFORMASI --}}

        <div class="detail-info">

            <p class="eyebrow-plate">

                {{ strtoupper($motor->kategori->nama_kategori) }}

                ·


            </p>


            <h1>
                {{ $motor->nama }}
            </h1>



            <div class="spec-list">

                <div class="spec">
                    <strong>CC</strong>
                    {{ $motor->cc }} cc
                </div>

                <div class="spec">
                    <strong>Transmisi</strong>
                    {{ $motor->transmisi }}
                </div>

                <div class="spec">
                    <strong>Tahun</strong>
                    {{ $motor->tahun }}
                </div>

                <div class="spec">
                    <strong>Lokasi</strong>
                    {{ $motor->lokasi }}
                </div>

            </div>


            <div class="road"></div>


            <div class="order-box">

                <div>

                    <span class="price price-lg">

                        Rp{{ number_format($motor->kategori->harga_per_hari, 0, ',', '.') }}

                        <span class="price-unit">
                            /hari
                        </span>

                    </span>

                    <p class="avail">

                        {{ $motor->status
                            ? '✓ Tersedia sekarang'
                            : '✕ Sedang dipakai'
                        }}

                    </p>

                </div>


                @if ($motor->status == 'tersedia')

                    <a href="#"
                       class="btn-primary">
                        Sewa Sekarang
                    </a>

                @else

                    <button class="btn-primary"
                            disabled>
                        Tidak Tersedia
                    </button>

                @endif

            </div>

        </div>

    </div>

</main>

@endsection