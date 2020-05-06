<div>
    @if (session()->has('message'))
      <div class="alert alert-success" role="alert">
        <strong>{{ session('message') }}</strong>
      </div>
    @endif
    <form wire:submit.prevent="save">
        <div class="form-group form-show-validation {{ $errors->has('isi') ? 'has-error' : '' }}">
          <label for="">Masukkan Pertanyaan</label>
          <textarea wire:model="isi" class="form-control" name="pertanyaan_isi" placeholder="masukkan pertanyaan" cols="30" rows="2"></textarea>
          {!! $errors->first('isi', '<label id="name-error" class="error" for="name">:message</label>') !!}
        </div>
        <div class="form-group">
            <label label for=""></label>
            <button class="btn btn-primary">Submit</button>
        </div>
    </form>
    <hr>
    <table class="table table-striped table-inverse table-responsive" width="100%">
        <thead class="thead-inverse">
            <tr>
                <th width="2%">#</th>
                <th width="80%">Pertanyaan</th>
                <th width="18%"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rows as $row)
                <tr>
                    <td scope="row">{{ $no++ }}</td>
                    <td>{{ $row->pertanyaan_isi }}</td>
                    <td>
                        <button wire:click="edit({{ $row->id }})" class="btn btn-primary btn-sm">Edit</button>
                        <button wire:click="destroy({{ $row->id }})" class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="float-right">
        {{ $rows->links() }}
    </div>
</div>
