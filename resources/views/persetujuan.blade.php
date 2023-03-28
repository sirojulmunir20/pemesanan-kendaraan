@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Persetujuan Kendaraan') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('approval.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="order_id" class="col-md-4 col-form-label text-md-right">{{ __('Nomor Pemesanan') }}</label>

                                <div class="col-md-6">
                                    <input id="order_id" type="text" class="form-control @error('order_id') is-invalid @enderror" name="order_id" value="{{ old('order_id') }}" required autofocus>

                                    @error('order_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="approved" class="col-md-4 col-form-label text-md-right">{{ __('Status Persetujuan') }}</label>

                                <div class="col-md-6">
                                    <select id="approved" class="form-control @error('approved') is-invalid @enderror" name="approved" value="{{ old('approved') }}" required>
                                        <option value="0">{{ __('Menunggu Persetujuan') }}</option>
                                        <option value="1">{{ __('Disetujui') }}</option>
                                        <option value="2">{{ __('Ditolak') }}</option>
                                    </select>

                                    @error('approved')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="reason" class="col-md-4 col-form-label text-md-right">{{ __('Alasan') }}</label>

                                <div class="col-md-6">
                                    <textarea id="reason" class="form-control @error('reason') is-invalid @enderror" name="reason" value="{{ old('reason') }}"></textarea>

                                    @error('reason')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
