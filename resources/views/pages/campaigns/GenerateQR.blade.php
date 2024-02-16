@extends('layouts.menu')
@section('content')
<style>
    .color-picker {
        padding-top: 2px;
        padding-bottom: 2px;
        padding-left: 4px;
        padding-right: 4px;
    }
</style>
<div class="container" class="mt-0">
@if (session()->get('message'))
<div class="alert alert-primary alert-dismissible fade show" role="alert">
    <p class="mb-0">
        {{ session()->get('message') }}
    </p>
    {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button> --}}
</div>
@endif

<!-- Start Campaign -->
<div class="row">
    <div class="col-lg-8 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
            <h4 class="card-title">Campaign Details</h4>
            </div>
            <div class="card-content">
            <div class="card-body">
                @foreach ($campaigns as $campaign)


                <fieldset class="form-group">
                    <label for="campaign_name">Name</label>
                    <input name="campaign_name" type="text" class="form-control" id="campaignName" readonly="readonly" value="{{ $campaign->qr_code_name }}">
                </fieldset>

                <fieldset class="form-group">
                    <label for="url">Url</label>
                    <input name="url" type="text" class="form-control" id="url" readonly="readonly" value="{{ $campaign->qr_code_url }}">
                </fieldset>

                <fieldset class="form-group">
                    <label for="foreground">Foreground</label>
                    <input type="color" id="foreground" name="foreground" class="form-control color-picker" disabled value="{{ $campaign->foreground }}">
                </fieldset>

                <fieldset class="form-group">
                    <label for="background">Background</label>
                    <input type="color" id="background" name="background" class="form-control color-picker" disabled value="{{ $campaign->background }}">
                </fieldset>

                <div class="form-group d-flex justify-content-between align-items-center">
                    <div class="text-left">
                        <a href="/campaigns" class="card-link">Previous</a>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
            <h4 class="card-title">QRCode</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <img src="{!! url('/qrcode/generate', $campaign->id) !!}" id="qrcode" width="100%" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>
<!--/ Start Campaign -->
@endsection
