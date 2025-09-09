@extends('app')
@section('content')
@section('title', 'Data User')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Data User</h3>
                {{-- @if (auth()->user()->hasRole('User')) --}}
                    
                <div align="right" class="mb-3">
                    <a href=" {{ route('user.create') }} " class="btn btn-primary">Tambah Data User</a>
                </div>
                {{-- @endif --}}
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th style="width: 200px">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th style="width: 200px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($User as $index => $user )
                        <tr class="text-center align-content-center">
                            <td>{{$index += 1 }}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @foreach ( $user->roles as $role )
                                    <span class="badge text-bg-primary">{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('user.roles', $user->id) }}" class="btn btn-success">Tambah Role</a>
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-success">Edit</a>
                                <form action=" {{ route('user.destroy', $user->id) }} " method="post" onclick="return confirm('Ingin menghapus data?')"
                                    class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection