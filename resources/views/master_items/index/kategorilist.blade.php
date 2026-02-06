@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="form-group mb-2">
                <a href="{{url('master-items/form/new')}}" class="btn btn-secondary">+ Master Items Baru</a>
            </div>
            <div class="form-group mb-2">
                <a href="{{url('master-items/kategori/new')}}" class="btn btn-secondary">+ Kategori Baru</a>
            </div>
            <div class="card">
                <div class="card-header">Daftar Master Items</div>

                <div class="card-body">
                
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="kategori-table">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
loadKategoriTable();

function loadKategoriTable() {
    fetch("{{ url('/kategori-list/all') }}")
        .then(res => res.json())
        .then(res => {
            let html = '';

            res.data.forEach(k => {
                html += `
                    <tr>
                        <td>${k.id}</td>
                        <td>${k.nama}</td>
                    </tr>
                `;
            });

            document.getElementById('kategori-table').innerHTML = html;
        });
}
</script>

@endsection