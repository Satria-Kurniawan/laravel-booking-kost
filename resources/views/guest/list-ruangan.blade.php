@extends('guest.template')

@section('content')
<div class="row mt-3">
    @foreach ($roomsData as $item)
        <div class="col-lg-4">
            <div class="card">
                <img src="{{ asset('storage/images/' . $item->foto) }}" class="card-img-top" alt="" 
                    style="height: 300px;">
                <div class="card-body">
                    <div class="card-title">
                        {{ $item->kode_ruangan }}
                    </div>
                    <div class="card-text">
                        {{ $item->fasilitas }}
                    </div>
                    <a class="btn bg-gradient-primary mt-3" 
                        href={{ route('overviewRuangan', ['id' => $item->id]) }}>Lihat</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection