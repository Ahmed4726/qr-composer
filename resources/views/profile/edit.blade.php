@extends('layouts.menu')
@section('content')
<br>
<div class="container">
    <div class="card mb-4">
        <h5 class="card-header">Profile Details</h5>
        <!-- Account -->
        <div class="card-body">
            <form id="formAccountSettings" method="post" action="/profile" enctype="multipart/form-data">
                @csrf

                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img src="{{ asset($user->photo ?? 'assets/img/avatars/1.png') }}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                    <div class="button-wrapper">
                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="upload" name="photo" onchange="previewLogo()" hidden accept="image/png, image/jpeg">
                        </label>
                        <button type="button" class="btn btn-label-secondary account-image-reset mb-4" onclick="resetLogo()">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                        </button>
                        <p class="text-muted mb-0">Allowed JPG or PNG. Max size of 800KB</p>
                    </div>
                </div>
        </div>
        <hr class="my-0" />
        <div class="card-body">
            {{-- <form id="formAccountSettings" method="post" action="/profile">
                @csrf --}}
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="name" class="form-label">Name</label>
                        <input class="form-control" type="text" id="name" name="name" value={{ $user->name }} autofocus />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control" type="email" name="email" id="email" value={{ $user->email }} />
                    </div>
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2">Save changes</button>
                    <button type="reset" class="btn btn-label-secondary">Cancel</button>
                </div>
            </form>
        </div>
        <!-- /Account -->
    </div>
    <div class="card mb-4">
        <h5 class="card-header">Change Password</h5>
        <div class="card-body">
            <form id="formAccountSetts" method="post" action="/password">
                @csrf
                {{-- <div class="row">
                    <div class="mb-3 col-md-6 form-password-toggle">
                        <label class="form-label" for="currentPassword">Current Password</label>
                        <div class="input-group input-group-merge">
                            <input
                                class="form-control"
                                type="password"
                                name="current_password"
                                id="currentPassword"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                    </div>
                </div> --}}
                <div class="row">
                    <div class="mb-3 col-md-6 form-password-toggle">
                        <label class="form-label" for="newPassword">New Password</label>
                        <div class="input-group input-group-merge">
                            <input
                                class="form-control"
                                type="password"
                                id="newPassword"
                                name="password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                    </div>

                    <div class="mb-3 col-md-6 form-password-toggle">
                        <label class="form-label" for="confirmPassword">Confirm New Password</label>
                        <div class="input-group input-group-merge">
                            <input
                                class="form-control"
                                type="password"
                                name="password_confirmation"
                                id="confirmPassword"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <p class="fw-medium mt-2">Password Requirements:</p>
                        <ul class="ps-3 mb-0">
                            <li class="mb-1">Minimum 8 characters long - the more, the better</li>
                            <li class="mb-1">At least one lowercase character</li>
                            <li>At least one number, symbol, or whitespace character</li>
                        </ul>
                    </div>
                    <div class="col-12 mt-1">
                        <button type="submit" class="btn btn-primary me-2">Save changes</button>
                        <button type="reset" class="btn btn-label-secondary">Cancel</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <div class="card">
        <h5 class="card-header">Deactivate Account</h5>
        <div class="card-body">
            <div class="mb-3 col-12 mb-0">
                <div class="alert alert-warning">
                    <h6 class="alert-heading fw-medium mb-1">Are you sure you want to delete your account?</h6>
                    <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                </div>
            </div>
            <form id="formAccountDeactivation" action="{{ route('profile.destroy') }}" method="post">
                @csrf
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" />
                    <label class="form-check-label" for="accountActivation">I confirm my account deactivation</label>
                </div>
                <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
            </form>
        </div>
    </div>

</div>

<script>
    // var defaultLogo = "{{ asset('assets/img/avatars/1.png') }}";

// logo preview
function previewLogo() {
    var fileInput = $('#upload')[0];
    var file = fileInput.files[0];

    if (file) {
        $("#uploadedAvatar").attr("src", URL.createObjectURL(file));
    }
}


// logo remove and set default logo
function resetLogo() {
    $("#uploadedAvatar").attr("src", defaultLogo);
    // Reset the file input value to allow selecting the same file again
    $('#upload').val('');
}
</script>
@endsection
