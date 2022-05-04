@extends('guest.template')

@section('content')
<div class="row mt-3">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h5>Detail Transaksi</h5>
                R01</br>
                Rp. 300,000</br>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h5>Instruksi Pembayaran</h5>
                <a class="btn btn-outline-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Internet Banking
                </a>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <p>1. skfjsdfs</p>
                        <p>2. fskdsajf</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection