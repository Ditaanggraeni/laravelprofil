@extends('layouts.app')

@section('title', 'Pengalaman Kerja')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Pengalaman Kerja</h2>
            </div>
            <div class="float-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#createModal">Tambah Data Pengalaman Kerja</button>
            </div>
        </div>
    </div>
 
    @include('shared.alert')

    <table class="table table-striped table-bordered">
        <tr>
        
            <th width="20px" class="text-center">NO</th>
            <th scope="col">POSISI</th>
            <th scope="col">PERUSAHAAN</th>
            <th scope="col">DESKRIPSI</th>
            <th width="280px"class="text-center">AKSI</th>
        </tr>
        @foreach ($pengalaman as $data)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $data->posisi }}</td>
            <td>{{ $data->perusahaan }}</td>
            <td>{{ $data->deskripsi }}</td>
            <td class="text-center">

                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#updateModal" 
                    data-id="{{ $data->id }}"
                    data-posisi="{{ $data->posisi }}"
                    data-perusahaan="{{ $data->perusahaan }}"
                    data-deskripsi="{{ $data->deskripsi }}"
                    onclick="updateData(this)">Edit</button>

                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" onclick="deleteData('{{ $data->id }}')">Delete</button>
            </td>
        </tr>
        @endforeach
    </table>
 
    {!! $pengalaman->links() !!}

@include('pengalaman.modal.create')
@include('pengalaman.modal.edit')
@include('shared.delete_confirmation.modal')

@endsection

@section('scripts')
@include('shared.delete_confirmation.script', ['routeName' => 'pengalaman.destroy'])

<script>
    function updateData(element) {
        var el = $(element);
        var id = el.data('id');
        var url = '{{ route("pengalaman.update", ":id") }}';
        url = url.replace(':id', id);
        $("#updateForm").attr('action', url);
        $("#updateForm input[name=posisi]").val(el.data('posisi'));
        $("#updateForm input[name=perusahaan]").val(el.data('perusahaan'));
        $("#updateForm input[name=deskripsi]").val(el.data('deskripsi'));
     }
     function submitUpdate() {
        $("#updateForm").submit();
     }
</script>
