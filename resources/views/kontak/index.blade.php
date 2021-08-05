@extends('layouts.app')

@section('title', 'Contact Me')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Contact Me </h2>
            </div>
            <div class="float-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#createModal">Tambah Contact</button>
            </div>
        </div>
    </div>
 
    @include('shared.alert')

    <table class="table table-striped table-bordered">
        <tr>
        
            <th width="20px" class="text-center">NO</th>
            <th scope="col">NOMOR TELEPON</th>
            <th scope="col">EMAIL</th>
            <th scope="col">INSTAGRAM</th>
            <th width="280px"class="text-center">AKSI</th>
        </tr>
        @foreach ($kontak as $data)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $data->no_tlp }}</td>
            <td>{{ $data->email }}</td>
            <td>{{ $data->ig }}</td>
            <td class="text-center">

                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#updateModal" 
                    data-id="{{ $data->id }}"
                    data-no_tlp="{{ $data->no_tlp }}"
                    data-email="{{ $data->email }}"
                    data-ig="{{ $data->ig }}"
                    onclick="updateData(this)">Edit</button>

                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" onclick="deleteData('{{ $data->id }}')">Delete</button>
            </td>
        </tr>
        @endforeach
    </table>
 
    {!! $kontak->links() !!}

@include('Kontak.modal.create')
@include('Kontak.modal.edit')
@include('shared.delete_confirmation.modal')

@endsection

@section('scripts')
@include('shared.delete_confirmation.script', ['routeName' => 'kontak.destroy'])

<script>
    function updateData(element) {
        var el = $(element);
        var id = el.data('id');
        var url = '{{ route("kontak.update", ":id") }}';
        url = url.replace(':id', id);
        $("#updateForm").attr('action', url);
        $("#updateForm input[name=no_tlp]").val(el.data('no_tlp'));
        $("#updateForm input[name=email]").val(el.data('email'));
        $("#updateForm input[name=ig]").val(el.data('ig'));
     }
     function submitUpdate() {
        $("#updateForm").submit();
     }
</script>
