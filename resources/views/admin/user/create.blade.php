```blade
@extends('layouts.master')

@section('title', 'Tambah User')

@section('content')

<style>
    :root{
        --roda-cream:#efebdf;
        --roda-cream-2:#e8e3d3;
        --roda-dark:#181410;
        --roda-orange:#f0a92e;
        --roda-orange-dark:#d98f18;
        --roda-red:#c2402c;
        --roda-muted:#8a8478;
        --roda-border:#181410;
    }

    .roda-wrap{
        background:var(--roda-cream);
        min-height:100vh;
        padding:48px 24px;
        font-family:'Segoe UI',system-ui,-apple-system,sans-serif;
        color:var(--roda-dark);
    }

    .roda-container{
        max-width:760px;
        margin:0 auto;
    }

    .roda-eyebrow{
        display:inline-block;
        font-size:13px;
        font-weight:800;
        letter-spacing:.08em;
        text-transform:uppercase;
        color:var(--roda-red);
        margin-bottom:10px;
    }

    .roda-title{
        font-size:38px;
        font-weight:900;
        line-height:1.1;
        margin:0 0 8px;
        color:var(--roda-dark);
    }

    .roda-subtitle{
        color:var(--roda-muted);
        font-size:15px;
        margin-bottom:32px;
    }

    .roda-card{
        background:#fbf9f3;
        border:3px solid var(--roda-border);
        border-radius:14px;
        padding:36px;
        box-shadow:8px 8px 0 var(--roda-border);
    }

    .roda-divider{
        border:none;
        border-top:2px dashed #c9c2ae;
        margin:0 0 28px;
    }

    .roda-field{
        margin-bottom:22px;
    }

    .roda-field label{
        display:block;
        font-weight:800;
        font-size:13px;
        text-transform:uppercase;
        letter-spacing:.04em;
        margin-bottom:8px;
    }

    .roda-field input,
    .roda-field select{
        width:100%;
        box-sizing:border-box;
        padding:12px 14px;
        font-size:15px;
        font-family:inherit;
        color:var(--roda-dark);
        background:#fff;
        border:2px solid var(--roda-border);
        border-radius:8px;
        outline:none;
        transition:box-shadow .15s ease, transform .15s ease;
    }

    .roda-field input:focus,
    .roda-field select:focus{
        box-shadow:4px 4px 0 var(--roda-orange);
        transform:translate(-2px,-2px);
    }

    .roda-field-row{
        display:grid;
        grid-template-columns:1fr 1fr;
        gap:20px;
    }

    .roda-actions{
        display:flex;
        align-items:center;
        gap:18px;
        margin-top:32px;
    }

    .roda-btn{
        display:inline-flex;
        align-items:center;
        justify-content:center;
        background:var(--roda-orange);
        color:var(--roda-dark);
        font-weight:800;
        font-size:15px;
        padding:14px 28px;
        border:2px solid var(--roda-border);
        border-radius:8px;
        box-shadow:5px 5px 0 var(--roda-border);
        cursor:pointer;
        text-decoration:none;
        transition:transform .12s ease, box-shadow .12s ease;
    }

    .roda-btn:hover{
        background:var(--roda-orange-dark);
        transform:translate(2px,2px);
        box-shadow:3px 3px 0 var(--roda-border);
    }

    .roda-btn-cancel{
        background:transparent;
        color:var(--roda-dark);
        font-weight:700;
        font-size:15px;
        text-decoration:none;
        border-bottom:2px solid var(--roda-dark);
        padding-bottom:2px;
    }

    .roda-btn-cancel:hover{
        color:var(--roda-red);
        border-color:var(--roda-red);
    }

    .roda-errors{
        background:#fbe3df;
        border:2px solid var(--roda-red);
        color:#7c2419;
        border-radius:8px;
        padding:14px 18px;
        margin-bottom:24px;
        font-size:14px;
    }

    .roda-errors ul{
        margin:0;
        padding-left:18px;
    }

    @media (max-width:560px){
        .roda-field-row{
            grid-template-columns:1fr;
        }
    }
</style>


<div class="roda-wrap">

    <div class="roda-container">

        <span class="roda-eyebrow">
            Panel Admin · Data User
        </span>

        <h2 class="roda-title">
            Tambah User Baru
        </h2>

        <p class="roda-subtitle">
            Lengkapi data user di bawah ini untuk menambahkan akun baru ke sistem RODA.
        </p>


        <div class="roda-card">

            {{-- Error validasi --}}
            @if ($errors->any())
                <div class="roda-errors">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <hr class="roda-divider">


            <form action="{{ route('admin.user.store') }}" method="POST">
                @csrf

                {{-- Username --}}
                <div class="roda-field">
                    <label>Username</label>

                    <input
                        type="text"
                        name="username"
                        value="{{ old('username') }}"
                        placeholder="Contoh: zakipang"
                        required
                    >
                </div>


                {{-- Email --}}
                <div class="roda-field">
                    <label>Email</label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Contoh: user@gmail.com"
                        required
                    >
                </div>


                {{-- Password --}}
                <div class="roda-field-row">

                    <div class="roda-field">
                        <label>Password</label>

                        <input
                            type="password"
                            name="password"
                            placeholder="Masukkan password"
                            required
                        >
                    </div>


                    <div class="roda-field">
                        <label>Konfirmasi Password</label>

                        <input
                            type="password"
                            name="password_confirmation"
                            placeholder="Ulangi password"
                            required
                        >
                    </div>

                </div>


                {{-- Nomor Telepon --}}
                <div class="roda-field">
                    <label>No. Telepon</label>

                    <input
                        type="text"
                        name="no_telfon"
                        value="{{ old('no_telfon') }}"
                        placeholder="Contoh: 081234567890"
                        required
                    >
                </div>


                {{-- Role --}}
                <div class="roda-field">
                    <label>Role</label>

                    <select name="role" required>

                        <option value="">
                            -- Pilih Role --
                        </option>

                        <option value="user"
                            {{ old('role') == 'user' ? 'selected' : '' }}>
                            User
                        </option>

                        <option value="admin"
                            {{ old('role') == 'admin' ? 'selected' : '' }}>
                            Admin
                        </option>

                        <option value="petugas"
                            {{ old('role') == 'petugas' ? 'selected' : '' }}>
                            Petugas
                        </option>

                    </select>
                </div>


                {{-- Tombol --}}
                <div class="roda-actions">

                    <button
                        type="submit"
                        class="roda-btn">
                        Simpan User
                    </button>

                    <a
                        href="{{ route('admin.user.index') }}"
                        class="roda-btn-cancel">
                        Batal
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
```
