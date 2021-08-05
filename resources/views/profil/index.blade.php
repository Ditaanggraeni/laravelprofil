@extends('layouts.app')

@section('title', 'Profile')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Profile</h2>
            </div>
            <div class="float-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#createModal">Tambah Data Profile</button>
            </div>
        </div>
    </div>
 
    @include('shared.alert')

    <table class="table table-striped table-bordered">
        <tr>
        
            <th width="20px" class="text-center">NO</th>
            <th scope="col">NAMA</th>
            <th scope="col">TEMPAT LAHIR</th>
            <th scope="col">TANGGAL LAHIR</th>
            <th scope="col">ALAMAT</th>
            <th scope="col">CONTENT</th>
            <th width="280px"class="text-center">AKSI</th>
        </tr>
        @foreach ($profil as $data)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $data->nama }}</td>
            <td>{{ $data->tempat }}</td>
            <td>{{ $data->ttl }}</td>
            <td>{{ $data->alamat }}</td>
            <td>{{ $data->content }}</td>
            <td class="text-center">

                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#updateModal" 
                    data-id="{{ $data->id }}"
                    data-nama="{{ $data->nama }}"
                    data-tmpt="{{ $data->tempat }}"
                    data-ttl="{{ $data->ttl }}"
                    data-alamat="{{ $data->alamat }}"
                    data-content="{{ $data->content }}"
                    onclick="updateData(this)">Edit</button>

                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" onclick="deleteData('{{ $data->id }}')">Delete</button>
            </td>
        </tr>
        @endforeach
    </table>
 
    {!! $profil->links() !!}

@include('profil.modal.create')
@include('profil.modal.edit')
@include('shared.delete_confirmation.modal')

@endsection

@section('scripts')
@include('shared.delete_confirmation.script', ['routeName' => 'profil.destroy'])

<script>
    function updateData(element) {
        var el = $(element);
        var id = el.data('id');
        var url = '{{ route("profil.update", ":id") }}';
        url = url.replace(':id', id);
        $("#updateForm").attr('action', url);
        $("#updateForm input[name=nama]").val(el.data('nama'));
        $("#updateForm input[name=tempat]").val(el.data('tmpt'));
        $("#updateForm input[name=ttl]").val(el.data('ttl'));
        $("#updateForm input[name=alamat]").val(el.data('alamat'));
        $("#updateForm input[name=content]").val(el.data('content'));
     }
     function submitUpdate() {
        $("#updateForm").submit();
     }
</script>
