@extends('layout.main')

@section('content')
<section class="my-5">
    <div class="container">
        <div class="row py-5">
            <div class="card col-md-6 mx-auto">
                <div class="card-header text-center">
                    <h5>Screto Gabut</h5>
                    <p>Mendaftar dan dapatkan pertanyaan dari orang tanpa diketahui nama</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('buat') }}" method="POST">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="nama">Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control">
                            @error('nama')
                                <div class="text-danger text-small">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary col-md-6">Masuk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
