@extends('layouts.master')


@section('links')
    <link href="{{ asset('/sbadmin2/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-primary float-left">List Artikel</h3>
                <a href="{{ url('/articles/create') }}" class="btn btn-sm btn-primary btn-icon-split float-right">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Artikel Baru</span>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @forelse ($articles as $data)
                            <tr>
                            <td>{{$data->title}}</td>
                            <td>{{$data->slug}}</td>
                            <td>{{date('d-m-y | H:i', strtotime($data->created_at))}}</td>
                            <td>
                                @if ($data->created_at == $data->updated_at)
                                    <small class="text-success">Belum Pernah Diubah</small>
                                @else
                                {{date('d-m-y | H:i', strtotime($data->updated_at))}}
                                @endif
                            </td>
                            <td>
                                <a href="/articles/{{$data->id}}/edit" class="btn btn-sm btn-primary" title="Edit Artikel"><i class="fa fa-pencil-alt"></i></a>
                                <a href="" data-toggle="modal" data-target="#exampleModal{{$data->id}}" class="btn btn-sm btn-danger" title="Hapus Artikel"><i class="fa fa-trash"></i></a>
                                <a href="/articles/{{$data->id}}" class="btn btn-sm btn-info" title="Detail Artikel"><i class="fa fa-eye"></i></a>
                            </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Peringatan!!!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    Yakin Data Ini Ingin Dihapus?
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <form action="articles/{{$data->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary">Yakin</button>
                                    </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="5"> Tidak Ada Artikel</td>
                            </tr>
                        @endforelse
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection
@push('scripts')
<script src="{{ asset('sbadmin2/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('sbadmin2/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('sbadmin2/js/demo/datatables-demo.js') }}"></script>
@endpush

@push('alert')
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
    Swal.fire({
        title: 'Berhasil!',
        text: msg,
        icon: 'success',
        confirmButtonText: 'Cool'
    });
    }
</script>
@endpush