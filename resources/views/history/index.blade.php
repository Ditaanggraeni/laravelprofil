@extends('layouts.app')

@section('title', 'History')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>History Pedidikan</h2>
            </div>
            <div class="float-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#createModal">Tambah History Pendidikan</button>
            </div>
        </div>
    </div>
 
    @include('shared.alert')

    <table class="table table-striped table-bordered">
        <tr>
        
            <th width="20px" class="text-center">NO</th>
            <th scope="col">JENJANG</th>
            <th scope="col">SEKOLAH</th>
            <th scope="col">TANGGAL MASUK</th>
            <th scope="col">TANGGAL LULUS</th>
            <th width="280px"class="text-center">AKSI</th>
        </tr>
        @foreach ($history as $data)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $data->jenjang }}</td>
            <td>{{ $data->sekolah }}</td>
            <td>{{ $data->tgl_masuk }}</td>
            <td>{{ $data->tgl_lulus }}</td>
            <td class="text-center">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#updateModal" 
                    data-id="{{ $data->id }}"
                    data-jenjang="{{ $data->jenjang }}"
                    data-sklh="{{ $data->sekolah }}"
                    data-tgl_m="{{ $data->tgl_masuk }}"
                    data-tgl_l="{{ $data->tgl_lulus }}"
                    onclick="updateData(this)">Edit</button>

                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" onclick="deleteData('{{ $data->id }}')">Delete</button>
            </td>
        </tr>
        @endforeach
    </table>
 
    {!! $history->links() !!}

@include('history.modal.create')
@include('history.modal.edit')
@include('shared.delete_confirmation.modal')

@endsection

@section('scripts')
@include('shared.delete_confirmation.script', ['routeName' => 'history.destroy'])

<script>
    function updateData(element) {
        var el = $(element);
        var id = el.data('id');
        var url = '{{ route("history.update", ":id") }}';
        url = url.replace(':id', id);
        $("#updateForm").attr('action', url);
        $("#updateForm input[name=jenjang]").val(el.data('jenjang'));
        $("#updateForm input[name=sekolah]").val(el.data('sklh'));
        $("#updateForm input[name=tgl_masuk]").val(el.data('tgl_m'));
        $("#updateForm input[name=tgl_lulus]").val(el.data('tgl_l'));
     }
     function submitUpdate() {
        $("#updateForm").submit();
     }
</script>
