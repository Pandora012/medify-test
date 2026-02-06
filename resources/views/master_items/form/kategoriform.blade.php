@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="form-group mb-2">
                <a href="{{url('master-items')}}" class="btn btn-secondary">Kembali ke Daftar Item</a>
            </div>
            <div class="card">

                @if($method == 'new')
                <div class="card-header">Buat Master Item Baru</div>
                
                @else
                <div class="card-header">Edit Master Item</div>
                @endif

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                                    @csrf
                    @if($method == 'edit')
                    <div class="form-group">
                        <label>Kode Barang</label>
                        <input type="text" class="form-control" name="kategori_id" required readonly value="{{$item->id ?? ''}}">
                    </div>
                    @endif

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" required  value="{{$item->nama ?? ''}}">
                    </div>

                    <button class="btn btn-primary mt-3">Submit</button>

                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
@endsection