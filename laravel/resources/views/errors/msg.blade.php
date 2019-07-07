@if (session()->has('gagal'))
    <div class="alert alert-danger alert-dismissible alert-custom">
        {{ session()->get('gagal') }}
    </div>
@elseif(session()->has('sukses'))
	<div class="alert alert-success alert-dismissible alert-custom">
        {{ session()->get('sukses') }}
    </div>
@endif