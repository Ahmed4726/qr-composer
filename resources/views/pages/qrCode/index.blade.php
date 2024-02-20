@extends('layouts.menu')
@section('content')
<div class="container">
    @section('title', trans('locale.campaign.list'))
<head>
      <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <!-- jQuery -->

    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

</head>


@section('page-style')
	<style>

		.custom-select {
			height: auto;
		}

		.color-picker {
			padding-top: 2px;
			padding-bottom: 2px;
			padding-left: 4px;
			padding-right: 4px;
		}
	</style>
@endsection


	@if (session()->get('message'))
	<div class="alert alert-primary alert-dismissible fade show" role="alert">
		<p class="mb-0">
			{{ session()->get('message') }}
		</p>
        {{-- <span> --}}
		{{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
        </span> --}}
	</div>
	@endif

	<!-- Start Campaign -->
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Campaign Code Details</h4>
            {{-- @foreach ($campaigns as $campaign) --}}
            {{-- @dd(auth()->user()->qrCodes()->count()); --}}
            {{-- @dd(auth()->user()->qrCodes()->count() > auth()->user()->qr_code_limit); --}}
            <a href="/qr-create/{{ $campaign_id }}" class="btn btn-primary ml-auto" id="createQrCodeBtn">Create QR Code</a>
            {{-- @endforeach --}}


		</div>
		<div class="card-content">
			<div class="card-body">
				<div class="table-responsive">
					<table id="campaignTable" class="table table-striped">
						<thead>
							<tr>
								<th>Id</th>
								<th>Name</th>
								<th>Url</th>
								<th>Foreground</th>
								<th>Background</th>
								<th>Logo</th>
								<th>Created at</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach($campaigns as $campaign)
							<tr>
								<td>{{ $campaign->id }}</td>
								<td>{{ $campaign->qr_code_name }}</td>
								<td>{{ $campaign->qr_code_url }}</td>
								<td>
									<input type="color" class="form-control color-picker" disabled value="{{ $campaign->foreground }}">
								</td>
								<td>
									<input type="color" class="form-control color-picker" disabled value="{{ $campaign->background }}">
								</td>
								<td>
									@if($campaign->logo == null)
									<img src='{{ asset("images/download.png") }}' width="50">
									@else
									<img src='{{ asset("$campaign->logo") }}' width="50">
									@endif
								</td>
								<th>{{ $campaign->created_at }}</th>
								<td>
									<form id="deleteForm{{ $campaign->id }}" action="{{ route('qr.destroy', $campaign->id) }}" method="POST" style="display: none;">
										@csrf
										{{-- @method('DELETE') --}}
									</form>
									<a href="{{ route('qrCode.show', $campaign->id) }}" class="btn btn-icon rounded-circle btn-flat-success waves-effect waves-light">
										<i class="fas fa-eye"></i>
									</a>
									<button onclick="deleteqrcode({{ $campaign->id }})" class="btn btn-icon rounded-circle btn-flat-danger waves-effect waves-light">
										<i class="fas fa-trash"></i>

									</button>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!--/ Start Campaign -->




<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<script>

        document.getElementById('createQrCodeBtn').addEventListener('click', function(event) {
                event.preventDefault();

                if (authUserQrCodeLimitReached()) {
                    showQrCodeLimitError();
                } else {
                    // Proceed with creating QR code, e.g., redirect to the link
                    window.location.href = event.target.getAttribute('href');
                }
            });

    function authUserQrCodeLimitReached() {
        return {{ auth()->user()->qrCodes()->count() > auth()->user()->qr_code_limit ? 'false' : 'true' }};
    }

    function showQrCodeLimitError() {
        Swal.fire({
            icon: 'error',
            title: 'QR Code Limit Reached',
            text: 'Upgrade your plan to create more QR codes.',
        });
    }
		function deleteqrcode(campaignId) {
            // alert(campaignId)
			Swal.fire({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!',
				confirmButtonClass: 'btn btn-primary',
				cancelButtonClass: 'btn btn-danger ml-1',
				buttonsStyling: false,
			}).then(function (result) {
				if (result.value) {
					$('#deleteForm'+campaignId).submit();
				}
			})
		}
</script>
@endsection

