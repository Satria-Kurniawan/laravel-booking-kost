@extends('guest.template')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card mt-3 text-center">
            <div class="card-body">
                <div class="card-title">
                    Progress Bar
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card mt-3">
            <div class="card-body">
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="card-title">
                            <h5>Pemesan</h5>
                        </div>
                        <div class="card-text">
                            {{ Auth::user()->name }}
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="card-title">
                            <h5>Pesanan</h5>
                        </div>
                        <div class="d-flex">
                            <img src="{{ asset('storage/images/'. $roomsData->foto) }}"" alt="" height="100px">
                            <div class="card-text ms-3">
                                {{ $roomsData->kode_ruangan }}</br>
                                {{ $roomsData->fasilitas }}</br>
                                {{ $roomsData->harga_sewa }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h5>Metode Pembayaran</h5>
                        </div>
                        <div class="d-flex">
                            @foreach ($paymentChannels as $channel)
                                <form action="{{ route('transactionStore') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="rooms_id" value="{{ $roomsData->id }}">
                                    @if ($channel->active)
                                        <input type="hidden" name="method" value="{{ $channel->code }}">
                                        <button type="submit" style="border: none; background-color: white">
                                            <img src="{{ $channel->icon_url }}" alt="Payment Method" height="50px">
                                        </button>
                                    @endif
                                </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection