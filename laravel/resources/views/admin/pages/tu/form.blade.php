<div class="form-group">
    <label for="">E-mail</label>
    {!! Form::email('email', null, ['class' => 'form-control', 'autocomplete' => 'off', 'required', (!empty($data)) ? 'disabled' : '']) !!}
</div>

@if (empty($data))
    <div class="form-group">
        <label for="">Password</label>
        {!! Form::password('password', ['class' => 'form-control', 'autocomplete' => 'off', 'required']) !!}
    </div>
@endif

<div class="form-group">
    <label for="">Nama</label>
    {!! Form::text('nama', null, ['class' => 'form-control', 'autocomplete' => 'off', 'required']) !!}
</div>

<div class="row">
    <div class="col-md-4 col-sm-12">
        <div class="form-group">
            <label for="">Jenis Kelamin</label>
            {!! Form::select('jenis_kelamin', ['Laki - Laki' => 'Laki - Laki', 'Perempuan' => 'Perempuan'], null, ['class' => 'form-control select2']) !!}
        </div>
    </div>

    <div class="col-md-4 col-sm-12">
        <div class="form-group">
            <label for="">Tempat Lahir</label>
            {!! Form::text('tempat', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
        </div>
    </div>
    <div class="col-md-4 col-sm-12">
        <div class="form-group">
            <label for="">Tanggal Lahir</label>
            {!! Form::text('tanggal_lahir', null, ['class' => 'form-control datepicker', 'autocomplete' => 'off', 'readonly']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    <label for="">Alamat</label>
    {!! Form::textarea('alamat', null, ['class' => 'form-control', 'autocomplete' => 'off', 'rows' => '3']) !!}
</div>

<div class="form-group">
    <a href="{{ route('admin.tu') }}" class="btn btn-sm btn-default">Kembali</a>
    <button class="btn btn-sm btn-success" type="submit">Simpan</button>
</div>