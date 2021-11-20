@extends('layout.main')

@section('content')

<section class="my-5">
    <div class="container">
        <div class="row pt-5 pb-2">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        @if(Auth()->user())
                        @if(Auth()->user()->id == $user->id)
                        <div class="text-center">
                            <h5 class="pb-3">Bagikan link ini ke teman anda untuk mendapatkan pertanyaan</h5>
                            <input type="text" id="link" value="{{ route('pertanyaan', $user->id) }}" class="form-control">
                            <button class="btn btn-primary col-md-4 my-3" onclick="copyTeks()" id="salin">Salin Link</button>
                            <div class="row">
                                <div class="mx-auto">
                                    <a href="whatsapp://send?text=Kirimkan pertanyaan kamu tentang {{ $user->nama }}. *SECRETO GABUT*  {{ route('pertanyaan', $user->id) }}" class="btn btn-success col-md-5 mx-1"><i class="fab fa-whatsapp"></i> Share Whatsapp</a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endif


                         @if(Auth()->user())
                          @if(Auth()->user()->id != $user->id)
                        <div class="text-center">
                            <h3>Kirim Pesan Ke</h3>
                            <h5>{{ $user->nama }}</h5>
                        </div>
                            @if(session('pesan'))
                                <div class="text-center">
                                    <p style="font-size:14px;">Pesanmu telah dikirimkan ke {{ $user->nama }}</p></p>
                                    <a href="{{ route('index') }}" class="btn btn-primary">Buat sendiri</a>
                                    <a href="" class="btn btn-primary">Kirim pesan lagi</a>
                                </div>
                            @else
                            <form action="{{ route('kirim',$user->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="type" value="a">
                                <div class="form-group py-2">
                                    <span for="pertanyaan" class="text-muted" style="font-size:12px;">*{{ $user->nama }} tidak akan mengetahuin pengirim pesan!</span>
                                    <textarea name="komen" placeholder="Tulis pesanmu" class="form-control @error('komen') is-invalid @enderror"></textarea>
                                    @error('komen')
                                        <div class="text-small text-danger">
                                            *{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group py-2 text-center">
                                    <button class="btn btn-primary col-md-8" type="submit">Submit Pesan</button>
                                </div>
                            </form>
                            @endif
                            @endif
                            @endif

                        @if(!Auth()->user())
                        <div class="text-center">
                            <h3>Kirim Pesan Ke</h3>
                            <h5>{{ $user->nama }}</h5>
                        </div>
                            @if(session('pesan'))
                                <div class="text-center">
                                    <p style="font-size:14px;">Pesanmu telah dikirimkan ke {{ $user->nama }}</p></p>
                                    <a href="{{ route('index') }}" class="btn btn-primary">Buat sendiri</a>
                                    <a href="" class="btn btn-primary">Kirim pesan lagi</a>
                                </div>
                            @else
                            <form action="{{ route('kirim',$user->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="type" value="a">
                                <div class="form-group py-2">
                                    <span for="pertanyaan" class="text-muted" style="font-size:12px;">*{{ $user->nama }} tidak akan mengetahuin pengirim pesan!</span>
                                    <textarea name="komen" placeholder="Tulis pesanmu" class="form-control @error('komen') is-invalid @enderror"></textarea>
                                    @error('komen')
                                        <div class="text-small text-danger">
                                            *{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group py-2 text-center">
                                    <button class="btn btn-primary col-md-8" type="submit">Submit Pesan</button>
                                </div>
                            </form>
                            @endif
                        @endif
    
                    </div>
                </div>
                <div class="card my-2">
                    <div class="card-header">
                        <h5 class="text-center">Beranda {{ $user->nama }}</h5>
                    </div>
                </div>
                @foreach($komentar->where('status', 'Tanya') as $row)
                <div class="card my-2">
                    <div class="card-body">
                            @if(Auth()->user())
                             @if(Auth()->user()->id == $user->id)
                                <form action="{{ route('hapus',$row->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="a" value="a">
                                    <button class="btn btn-none rounded-circle offset-11" type="submit"><i class="fa fa-trash"></i></button>
                                </form>
                             @endif
                            @endif
                            <div class="form-control bg-light mb-2" style="border-radius: 20px;">
                                {{ $row->komen }}
                            </div>
                            <form action="{{ route('kirim', $user->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="type" value="b">
                                <input type="hidden" name="id" value="{{ $row->id }}">
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-transparent border-0"><img src="{{ asset('user.png') }}" class="rounded-circle" style="height: 30px"></span>
                                    <input type="text" class="form-control" name="komen" style="border-radius: 20px;" placeholder="Kirim balasan"  aria-describedby="basic-addon1">
                                    <button class="input-group-text btn btn-outline-primary mx-2" id="basic-addon2" style="border-radius: 20px;">Kirim</button>
                                </div>
                            </form>
                            @foreach($komentar->where('komen_id', $row->id) as $komen)
                                <div class="mb-2 col-9 mx-auto">
                                    @if(Auth()->user())
                                    @if(Auth()->user()->id == $user->id)
                                    <form action="{{ route('hapus',$komen->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-none rounded-circle offset-11" type="submit"><i class="fa fa-trash"></i></button>
                                    </form>
                                    @endif
                                    @endif
                                    <div class="form-control text-muted" style="border-radius: 20px; border:none !imporatnt; background-color:rgb(216, 216, 216);">{{ $komen->komen }}</div>
                                </div>
                            @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
 <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script>
        function copyTeks(){
            var valueText = $("#link").select().val();
            document.execCommand("copy");
        }
</script>

@endsection
