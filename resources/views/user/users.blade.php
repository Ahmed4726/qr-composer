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
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
          <div class="row g-4 mb-4">
            <div class="col-sm-6 col-xl-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-start justify-content-between">
                    <div class="content-left">
                      <span>Session</span>
                      <div class="d-flex align-items-end mt-2">
                        <h4 class="mb-0 me-2">21,459</h4>
                        <small class="text-success">(+29%)</small>
                      </div>
                      <p class="mb-0">Total Users</p>
                    </div>
                    <div class="avatar">
                      <span class="avatar-initial rounded bg-label-primary">
                        <i class="bx bx-user bx-sm"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-start justify-content-between">
                    <div class="content-left">
                      <span>Paid Users</span>
                      <div class="d-flex align-items-end mt-2">
                        <h4 class="mb-0 me-2">4,567</h4>
                        <small class="text-success">(+18%)</small>
                      </div>
                      <p class="mb-0">Last week analytics</p>
                    </div>
                    <div class="avatar">
                      <span class="avatar-initial rounded bg-label-danger">
                        <i class="bx bx-user-check bx-sm"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-start justify-content-between">
                    <div class="content-left">
                      <span>Active Users</span>
                      <div class="d-flex align-items-end mt-2">
                        <h4 class="mb-0 me-2">19,860</h4>
                        <small class="text-danger">(-14%)</small>
                      </div>
                      <p class="mb-0">Last week analytics</p>
                    </div>
                    <div class="avatar">
                      <span class="avatar-initial rounded bg-label-success">
                        <i class="bx bx-group bx-sm"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-start justify-content-between">
                    <div class="content-left">
                      <span>Pending Users</span>
                      <div class="d-flex align-items-end mt-2">
                        <h4 class="mb-0 me-2">237</h4>
                        <small class="text-success">(+42%)</small>
                      </div>
                      <p class="mb-0">Last week analytics</p>
                    </div>
                    <div class="avatar">
                      <span class="avatar-initial rounded bg-label-warning">
                        <i class="bx bx-user-voice bx-sm"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
</div>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">User Details</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <div class="table-responsive">
                <table id="campaignTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Created at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            {{-- <td>
                                <input type="color" class="form-control color-picker" disabled value="{{ $campaign->foreground }}">
                            </td>
                            <td>
                                <input type="color" class="form-control color-picker" disabled value="{{ $campaign->background }}">
                            </td> --}}
                            {{-- <td>
                                @if($campaign->logo == null)
                                <img src='{{ asset("images/default.png") }}' width="50">
                                @else
                                <img src='{{ asset("$campaign->logo") }}' width="50">
                                @endif
                            </td> --}}
                            <td>{{ $user->created_at }}</td>
                            {{-- <td>
                                <form id="deleteForm{{ $campaign->id }}" action="{{ route('campaigns.destroy', $campaign->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <a href="{{ route('campaigns.qrCode', $campaign->id) }}" class="btn btn-icon rounded-circle btn-flat-success waves-effect waves-light">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <button onclick="deleteCampaign({{ $campaign->id }})" class="btn btn-icon rounded-circle btn-flat-danger waves-effect waves-light">
                                    <i class="fas fa-trash"></i>

                                </button>
                            </td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
