@extends('admin.template')

@section('pageName')
    Perbarui Data Ruangan
@endsection

@section('content')
    <div class="container-fluid">
        <form action={{ route('perbaruiDataRuangan', ['id' => $roomsData->id]) }} method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="d-flex">
                <div class="card col-lg-6 me-2">
                    <div class="card-body">
                        <div>
                            <label for="kode ruangan" class="form-label">Kode Ruangan</label>
                            <input type="text" class="form-control @error('kode_ruangan') is-invalid @enderror"
                                placeholder="Masukan kode ruangan ..." name="kode_ruangan" value={{ $roomsData->kode_ruangan }}>
                            @error('kode_ruangan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="fasilitas" class="form-label">Fasilitas</label>
                            <input type="text" class="form-control @error('fasilitas') is-invalid @enderror"
                                placeholder="Masukan fasilitas ruangan ..." name="fasilitas" value={{ $roomsData->fasilitas }}>
                            @error('fasilitas')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="status" class="form-label">Status</label>
                            <input type="text" class="form-control @error('status') is-invalid @enderror"
                                placeholder="Masukan status ruangan ..." name="status" value={{ $roomsData->status }}>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card col-lg-6">
                    <div class="card-body">
                        <div>
                            <label for="harga sewa" class="form-label">Harga Sewa</label>
                            <input type="text" class="form-control @error('harga_sewa') is-invalid @enderror"
                                placeholder="Masukan harga sewa ruangan ..." name="harga_sewa" value={{ $roomsData->harga_sewa }}>
                            @error('harga_sewa')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="foto" class="form-label">Foto</label>
                            <input class="form-control @error('foto') is-invalid @enderror" type="file" id="inputFile" name="foto">
                            @error('foto')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex">
                <div class="card col-lg-8 mt-2 me-2">
                    <div class="card-body">
                        <div>
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control @error('deskripsi') is-invalid @enderror"
                            placeholder="Masukan deskripsi ruangan ..." name="deskripsi" value={{ $roomsData->deskripsi }}>
                            @error('deskripsi')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card col-lg-4 mt-2">
                    <div class="card-body">
                        <p class="mb-0"><label for="image preview" class="form-label">Preview Foto</label></p>
                        <img style="visibility:" id="imagePreview" class="img-thumbnail" width="100"/>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn bg-gradient-primary mt-2">SIMPAN DATA</button>
        </form>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection
