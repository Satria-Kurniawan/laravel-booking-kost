@extends('admin.template')

@section('pageName')
    Manajemen Ruangan
@endsection

@section('content')
    <div class="container-fluid">
        <div class="d-flex">
            <a class="btn btn-sm bg-gradient-primary ms-auto" href="{{ route('halamanTambahDataRuangan') }}">
                TAMBAH DATA
            </a>
        </div>
        <div class="table-responsive">
            <table class="table text-center container bg-white rounded-3">
                <thead>
                    <tr>
                        <th>RUANGAN</th>
                        <th>FASILITAS</th>
                        <th>DESKRIPSI</th>
                        <th>FOTO</th>
                        <th>HARGA</th>
                        <th>STATUS</th>
                        <th>OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roomsData as $item)
                        <tr>
                            <td>{{ $item->kode_ruangan }}</td>
                            <td>{{ $item->fasilitas }}</td>
                            <td>{{ Str::limit($item->deskripsi, 8) }}</td>
                            <td>
                                @if (!empty($item->foto))
                                    <img src="{{ asset('storage/images/' . $item->foto) }}" class="img-fluid"
                                        style="width: 50px">
                                @else
                                    No image
                                @endif
                            </td>
                            <td>{{ $item->harga_sewa }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <a class="btn btn-sm btn-outline-secondary" href={{ route('halamanPerbaruiDataRuangan', ['id' => $item->id]) }}>EDIT</a>
                                <a class="btn btn-sm btn-outline-danger" href={{ route('hapusDataRuangan', ['id' => $item->id]) }}>DELETE</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
