@extends('layouts.app')

@section('title', 'RODA - Sewa Motor')

@section('content')

<main class="dashboard">

    <section class="hero">

        <div class="hero-text">

            <p class="eyebrow-plate">
                SEWA MOTOR HARIAN · CIMAHI & SEKITARNYA
            </p>

            <h1>
                Ambil motornya,
                <br>
                ambil jalannya.
            </h1>

            <p class="hero-sub">
                Motor siap pakai, dari matic harian
                sampai trail buat offroad.
                Pesan sekarang, ambil hari ini juga.
            </p>

            <a href="{{ route('motor_user.index') }}"
               class="btn-primary">
                Lihat Motor
            </a>

            <div class="road"></div>

            <div class="stats">

                <div class="stat">
                    <span class="stat-num">

                    </span>

                    <span class="stat-label">
                        motor tersedia
                    </span>
                </div>

                <div class="stat">
                    <span class="stat-num">3</span>

                    <span class="stat-label">
                        lokasi jemput
                    </span>
                </div>

                <div class="stat">
                    <span class="stat-num">
                        2 mnt
                    </span>

                    <span class="stat-label">
                        proses booking
                    </span>
                </div>

            </div>

        </div>

        <div class="hero-art">

            <div class="hero-glow"></div>

            <div class="speed-lines">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <div class="hero-motor">
                🏍️
            </div>

            <div class="hero-plate">
                B 1234 RD
            </div>

        </div>

    </section>

    <section class="categories">

        <p class="section-label">
            Cari berdasarkan jenis
        </p>

        <div class="chip-row">

            <a href="{{ route('motor_user.index') }}?kategori=Matic"
               class="chip">
                Matic
            </a>

            <a href="{{ route('motor_user.index') }}?kategori=Sport"
               class="chip">
                Sport
            </a>

            <a href="{{ route('motor_user.index') }}?kategori=Premium"
               class="chip">
                Premium
            </a>

            <a href="{{ route('motor_user.index') }}?kategori=Trail"
               class="chip">
                Trail
            </a>

        </div>

    </section>

</main>

@endsection