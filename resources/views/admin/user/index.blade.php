@extends('layouts.master')

@section('title', 'Pelanggan')

@section('content')

<div class="topbar">

    <div>
        <div class="eyebrow">
            Data
        </div>

        <h1>Pelanggan</h1>
    </div>

        <div class="topbar-right">

        <a href="{{ route('admin.user.create') }}" class="btn">
            + Data User
        </a>

    </div>

</div>


<div class="panel">

    <table>

        <thead>

            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>No HP</th>
                <th>role</th>
                <th>Total Sewa</th>
                <th>Terakhir Sewa</th>
            </tr>

        </thead>


        <tbody>

        @foreach ($pelanggan as $item)

            <tr>

                <td>
                    {{ $item->username }}
                </td>

                <td>
                    {{ $item->email }}
                </td>

                <td>
                    {{ $item->no_telfon}}
                </td>

                <td>
                    {{ $item->role}}
                </td>

                <td>
                    {{ $item->penyewaan_count ?? 0 }} kali
                </td>

                <td>
                    {{ $item->updated_at?->format('d M Y') }}
                </td>
                                <td class="row-actions">

<a href="{{ route('admin.user.edit', $item->id) }}">
    Edit
</a>

<form action="{{ route('admin.user.destroy', $item->id) }}" method="POST">

    @csrf
    @method('DELETE')

    <button type="submit"
            onclick="return confirm('Yakin ingin menghapus motor ini?')">
        Hapus
    </button>

</form>

                </td>
            </tr>

        @endforeach

        </tbody>

    </table>

</div>

@endsection