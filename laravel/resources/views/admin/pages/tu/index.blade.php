@extends('admin.template')

@section('header')
<h1>
    Tata Usaha
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Tata Usaha</li>
</ol>
@endsection

@section('content')
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">
                Data Tata Usaha
            </h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Tambah" onclick="clicked(this)" data-title="tambah"><i class="fa fa-plus"></i>
                </button>
            </div>
        </div>

        <div class="box-body">
            @include('errors.msg')
            <table class="table table-hover table-striped table-bordered custom_table">
                <thead>
                    <tr>
                        <th with="10">No.</th>
                        <th>E-mail</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @if (!empty($data))
                        @foreach ($data as $guru)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $guru->email }}</td>
                                <td>{{ $guru->nama }}</td>
                                <td>{{ $guru->jenis_kelamin }}</td>
                                <td>{{ $guru->alamat }}</td>
                                <td>{{ $guru->tempat . ', ' . $guru->tanggal_lahir }}</td>
                                <td align="center">
                                    <button class="btn btn-sm btn-danger" data-title="hapus" onclick="clicked(this)" data-toggle="tooltip" title="Hapus" data-id="{{ $guru->id_guru }}"><i class="fa fa-trash-o"></i></button>
                                    <button class="btn btn-sm btn-warning" data-title="ubah" onclick="clicked(this)" data-toggle="tooltip" title="Ubah" data-id="{{ $guru->id_guru }}"><i class="fa fa-edit"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function clicked(obj)
        {
            var obj = $(obj);
            var title = obj.attr('data-title');
            var id = obj.attr('data-id');
            var url = "";

            switch (title) {
                case 'tambah':
                    url = "{{ route('admin.tu.tambah') }}";
                    break;

                case 'ubah':
                    url = "tu/ubah/" + id;
                    break;

                case 'hapus':
                    url = "tu/hapus/" + id;
                    break;
            }

            if(title != 'hapus')
            {
                document.location = url;
            }
            else
            {
                if(confirm('Apa anda yakin akan menghapus akun TU tersebut ?'))
                    document.location = url;
            }
        }
    </script>
@endsection