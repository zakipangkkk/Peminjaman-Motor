@extends('layouts.master')

@section('title', 'Data Motor')

@section('content')

<div class="topbar">

    <div>
        <div class="eyebrow">
            Inventaris
        </div>

        <h1>
            Daftar Motor
        </h1>
    </div>

    <div class="topbar-right">

        <a href="{{ route('admin.motor.create') }}" class="btn">
            + Tambah Motor
        </a>

    </div>

</div>


<div class="panel">

    <table>

        <thead>

            <tr>
                <th>No</th>
                <th>Motor</th>
                <th>Plat</th>
                <th>Kategori</th>
                <th>Harga/Hari</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>

        </thead>

        <tbody>

            @forelse($motor ?? [] as $item)

            <tr>

                <td>
                    {{ $loop->iteration }}
                </td>

                <td>
                    {{ $item->nama_motor }}
                </td>

                <td>
                    {{ $item->plat_nomor }}
                </td>

                <td>
                    {{ $item->kategori->nama_kategori ?? '-' }}
                </td>

                <td>
                    Rp{{ number_format($item->kategori->harga_per_hari ?? 0, 0, ',', '.') }}
                </td>

                <td>
                    {{ $item->status }}
                </td>

                <td class="row-actions">

<a href="{{ route('admin.motor.edit', $item->id) }}">
    Edit
</a>

<form action="{{ route('admin.motor.destroy', $item->id) }}" method="POST">

    @csrf
    @method('DELETE')

    <button type="submit"
            onclick="return confirm('Yakin ingin menghapus motor ini?')">
        Hapus
    </button>

</form>

                </td>

            </tr>

            @empty

            <tr>
                <td colspan="7" style="text-align:center;">
                    Belum ada data motor.
                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection