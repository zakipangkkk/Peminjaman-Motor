@extends('layouts.master')

@section('title', 'Data Penyewaan')

@section('content')

<div class="topbar">

    <div>
        <div class="eyebrow">
            Transaksi
        </div>

        <h1>
            Penyewaan
        </h1>
    </div>

</div>


<div class="panel">

    <table>

        <thead>

            <tr>
                <th>ID</th>
                <th>Pelanggan</th>
                <th>Motor</th>
                <th>Mulai</th>
                <th>Selesai</th>
                <th>Status</th>
                <th>Total</th>
            </tr>

        </thead>

        <tbody>

            @forelse($booking ?? [] as $item)

            <tr>

                <td>
                    #{{ $item->id }}
                </td>

                <td>
                    {{ $item->user->name ?? '-' }}
                </td>

                <td>
                    {{ $item->motor->nama_motor ?? '-' }}
                </td>

                <td>
                    {{ $item->waktu_mulai ?? '-' }}
                </td>

                <td>
                    {{ $item->waktu_selesai ?? '-' }}
                </td>

                <td>
                    {{ $item->status }}
                </td>

                <td>
                    Rp{{ number_format($item->total ?? 0, 0, ',', '.') }}
                </td>

            </tr>

            @empty

            <tr>
                <td colspan="7" style="text-align:center;">
                    Belum ada data penyewaan.
                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection