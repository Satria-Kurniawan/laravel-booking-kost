@extends('guest.template')

@section('content')
<div class="row">
    <div class="col-lg-5 mt-3">
        <div class="card">
            <img src="{{ asset('storage/images/'. $roomsData->foto) }}"" alt="" height="300px">
            <div class="card-body">
                
            </div>
        </div>
    </div>
    <div class="col-lg-7 mt-3">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    {{ $roomsData->kode_ruangan }}
                </div>
                <div class="card-text">
                    {{ $roomsData->fasilitas }}
                </div>
                <div class="card-text">
                    {{ $roomsData->deskripsi }}
                </div>
                <div class="card-text">
                    {{ $roomsData->harga_sewa }}
                </div>
                <a class="btn bg-gradient-primary mt-3" href="{{ route('checkout', ['id' => $roomsData->id]) }}">Sewa</a>
            </div>
        </div>
    </div>
</div>
@endsection