@extends('app')
@section('title', 'Tambah User')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Tambah User</h3>
                <div>
                    @foreach ($errors->all() as $i )
                    <ul class="" style="background-color: red">
                        <li>{{ $i }}</li>
                    </ul>
                    @endforeach
                </div>
                <form action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama *</label>
                            <input type="text" class="form-control" name="name"
                             value="">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Email *</label>
                            <input type="email" class="form-control" name="email"
                             value="">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Password *</label>
                            <input type="password" class="form-control" name="password"
                             value="">
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit" name="simpan">Submit</button>
                            <a href="{{url()->previous()}}" class="text-muted">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection