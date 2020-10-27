@extends('layouts.app', ['activePage' => 'Data Diri', 'titlePage' => __('Data Diri')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

          <form method="post" action="{{ route('pasien.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Data Pasien') }}</h4>
              </div>
              <div class="card-body ">
                <iframe src="{{ asset('material') }}/img/silence.mp3" type="audio/mp3" allow="autoplay" id="audio" style="display: none"></iframe>
                <audio id="player" autoplay loop>
                  <source src="{{ asset('material') }}/img/pajar.mp3" type="audio/mp3">
              </audio>
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Nama Lengkap') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('nama') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" id="input-nama" type="text" placeholder="{{ __('Nama') }}" value="{{ old('name', auth()->user()->name) }}" readonly required="true" aria-required="true"/>
                      @if ($errors->has('nama'))
                        <span id="nama-error" class="error text-danger" for="input-nama">{{ $errors->first('nama') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('HP') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('hp') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('hp') ? ' is-invalid' : '' }}" name="hp" id="input-hp" type="phone" value="{{ old('name', auth()->user()->email) }}" placeholder="{{ __('Nomor HP') }}" required />
                      @if ($errors->has('hp'))
                        <span id="hp-error" class="error text-danger" for="input-hp">{{ $errors->first('hp') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Tanggal lahir') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('tgl_lahir') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('tgl_lahir') ? ' is-invalid' : '' }}" name="tgl_lahir" id="input-tgl_lahir" type="text" placeholder="Bulan/Hari/Tahun" onfocus="(this.type='date')" required/>
                        @if ($errors->has('tgl_lahir'))
                          <span id="tgl_lahir-error" class="error text-danger" for="input-tgl_lahir">{{ $errors->first('tgl_lahir') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Jenis kelamin') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('jk') ? ' has-danger' : '' }}">
                        <select class="form-control" name="jk" id="jk">

                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>

                          </select>
                        @if ($errors->has('jk'))
                          <span id="jk-error" class="error text-danger" for="input-jk">{{ $errors->first('jk') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Alamat') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('alamat') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" name="alamat" id="input-alamat" type="text" placeholder="{{ __('alamat tempat tinggal') }}" required />
                        @if ($errors->has('alamat'))
                          <span id="alamat-error" class="error text-danger" for="input-alamat">{{ $errors->first('alamat') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Pekerjaan') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('pekerjaan') ? ' has-danger' : '' }}">
                        <select class="form-control" name="pekerjaan" id="pekerjaan">

                          <option value="Ibu rumah tangga">Ibu rumah tangga</option>
                          <option value="Pensiunan">Pensiunan</option>
                          <option value="PNS">PNS</option>
                          <option value="Petani/Buruh">Petani/Buruh</option>
                          <option value="Wiraswasta">Wiraswasta</option>
                          <option value="Tidak bekerja">Tidak bekerja</option>

                        </select>
                        @if ($errors->has('pekerjaan'))
                          <span id="pekerjaan-error" class="error text-danger" for="input-pekerjaan">{{ $errors->first('pekerjaan') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Pendidikan') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('pendidikan') ? ' has-danger' : '' }}">
                        <select class="form-control" name="pendidikan" id="pendidikan">
                      <option value="Tidak Sekolah">Tidak Sekolah</option>
                          <option value="SD">SD</option>
                          <option value="SMP">SMP</option>
                          <option value="SMA">SMA</option>
                          <option value="Perguruan Tinggi">Perguruan Tinggi</option>

                        </select>
                        @if ($errors->has('pendidikan'))
                          <span id="pendidikan-error" class="error text-danger" for="input-pendidikan">{{ $errors->first('pendidikan') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Status Rumah') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('status_rumah') ? ' has-danger' : '' }}">
                        <select class="form-control" name="status_rumah" id="status_rumah">
                       <option value="pasangan">Sewa</option>
                          <option value="sendiri">Hak Milik</option>
                          <option value="anak">Rumah Orang Tua</option>

                          </select>
                        @if ($errors->has('status_rumah'))
                          <span id="status_rumah-error" class="error text-danger" for="input-status_rumah">{{ $errors->first('status_rumah') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Tinggal bersama') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('tinggal_dengan') ? ' has-danger' : '' }}">
                        <select class="form-control" name="tinggal_dengan" id="tinggal_dengan">
                            <option value="pasangan">Pasangan</option>
                          <option value="sendiri">Sendiri</option>
                          <option value="anak">Anak</option>
                          <option value="saudara">Saudara</option>

                          </select>
                        @if ($errors->has('tinggal_dengan'))
                          <span id="tinggal_dengan-error" class="error text-danger" for="input-tinggal_dengan">{{ $errors->first('tinggal_dengan') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Nama Pasangan') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('nama_pasangan') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('nama_pasangan') ? ' is-invalid' : '' }}" name="nama_pasangan" id="input-nama_pasangan" type="text" placeholder="{{ __('Nama Pasangan') }}"  required="true" aria-required="true"/>
                        @if ($errors->has('nama_pasangan'))
                          <span id="nama_pasangan-error" class="error text-danger" for="input-nama_pasangan">{{ $errors->first('nama_pasangan') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Tanggal lahir Pasangan') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('tgl_lahir_pasangan') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('tgl_lahir_pasangan') ? ' is-invalid' : '' }}" name="tgl_lahir_pasangan" id="input-tgl_lahir_pasangan" type="text" placeholder="Bulan/Hari/Tahun" onfocus="(this.type='date')"  required />
                        @if ($errors->has('tgl_lahir_pasangan_pasangan'))
                          <span id="tgl_lahir_pasangan-error" class="error text-danger" for="input-tgl_lahir_pasangan">{{ $errors->first('tgl_lahir_pasangan') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Pekerjaan Pasangan') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('pekerjaan_pasangan') ? ' has-danger' : '' }}">
                        <select class="form-control" name="pekerjaan_pasangan" id="pekerjaan_pasangan">
                            <option value="Ibu rumah tangga">Ibu rumah tangga</option>
                          <option value="Pensiunan">Pensiunan</option>
                          <option value="PNS">PNS</option>
                          <option value="Petani/Buruh">Petani/Buruh</option>
                          <option value="Wiraswasta">Wiraswasta</option>
                          <option value="Tidak bekerja">Tidak bekerja</option>

                        </select>
                        @if ($errors->has('pekerjaan_pasangan'))
                          <span id="pekerjaan_pasangan-error" class="error text-danger" for="input-pekerjaan_pasangan">{{ $errors->first('pekerjaan_pasangan') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Pendidikan pasangan') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('pendidikan_pasangan') ? ' has-danger' : '' }}">
                        <select class="form-control" name="pendidikan_pasangan" id="pendidikan_pasangan">
                            <option value="Tidak Sekolah">Tidak Sekolah</option>
                          <option value="SD">SD</option>
                          <option value="SMP">SMP</option>
                          <option value="SMA">SMA</option>
                          <option value="Perguruan Tinggi">Perguruan Tinggi</option>

                        </select>
                        @if ($errors->has('pendidikan_pasangan'))
                          <span id="pendidikan_pasangan-error" class="error text-danger" for="input-pendidikan_pasangan">{{ $errors->first('pendidikan_pasangan') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Puskesmas') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('puskesmas_id') ? ' has-danger' : '' }}">
                        <select class="form-control" class="form-control" name="puskesmas_id" id="puskesmas_id">

                            @foreach ($puskesmas as $puskesmas) {

                          <option value="{{ $puskesmas->id }}">{{ $puskesmas->nama }}</option>
                            }
                            @endforeach
                          </select>
                        @if ($errors->has('puskesmas_id'))
                          <span id="puskesmas_id-error" class="error text-danger" for="input-puskesmas_id">{{ $errors->first('puskesmas_id') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('user_id') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}" name="user_id" id="user_id" type="text" placeholder="{{ __('') }}" value="{{ old('name', auth()->user()->id) }}" required="true" aria-required="true" hidden/>
                        @if ($errors->has('user_id'))
                          <span id="user_id-error" class="error text-danger" for="input-user_id">{{ $errors->first('user_id') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>



              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
@endsection
