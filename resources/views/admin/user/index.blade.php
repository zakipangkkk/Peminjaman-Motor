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

            </tr>

        @endforeach

        </tbody>

    </table>

</div>

@endsection