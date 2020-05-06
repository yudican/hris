<?php

namespace App\Http\Livewire;

use App\Models\Pertanyaan as ModelsPertanyaan;
use Livewire\Component;

class Pertanyaan extends Component
{
    public $isi, $dataId, $update = false;

    public function render()
    {
        $data = [
            'title' =>  'Pertanyaan',
            'rows' => ModelsPertanyaan::paginate(15),
            'no' => 1
        ];
        return view('livewire.pertanyaan', $data);
    }

    public function save()
    {
        $this->validate(['isi' => 'required']);
        ModelsPertanyaan::updateOrCreate(['id' => $this->dataId], ['pertanyaan_isi' => $this->isi]);

        $msg = $this->update ? 'Di update' : 'Di input';
        $this->update = false;
        $this->isi = null;
        $this->dataId = null;
        session()->flash('message', 'Pertanyaan berhasil ' . $msg);
    }

    public function edit($id)
    {
        $row = ModelsPertanyaan::find($id);

        $this->dataId = $id;
        $this->update = true;
        $this->isi = $row->pertanyaan_isi;
    }

    public function destroy($id)
    {
        ModelsPertanyaan::find($id)->delete();

        session()->flash('message', 'Pertanyaan berhasil Di hapus');
    }
}
