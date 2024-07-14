<div class="col-lg-8">
    <div class="card mb-4">
        <div class="card-body">
            <div class="profileActive ">
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Full Name</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ $user->name }}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Email</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ $user->email }}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Phone</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ $user->phone }}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Address</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ $user->address }}</p>
                    </div>
                </div>
            </div>

            <form action="" class="profileActive active form-account ">
                <div class="row messages status-messages">
                    <h4 class="message-text"></h4>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Full Name</p>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="name" value="{{ $user->name }}">
                        <span class="error error-name text-danger"></span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Email</p>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="email" value="{{ $user->email }}">
                        <span class="error error-email text-danger"></span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Phone</p>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="phone" value="{{ $user->phone }}">
                        <span class="error error-phone text-danger"></span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Address</p>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="address" value="{{ $user->address }}">
                        <span class="error error-address text-danger"></span>
                    </div>
                    <div class="con-btn">
                        <button type="submit" class="btn btn-submit-prf">Cập nhật</button>
                    </div>
            </form>
        </div>
    </div>


</div>
<div class="row mb-3">
    <div class="col-sm-9"></div>
    <div class="col-sm-3"><span href="" class="btn btn-base js-profileBtn ">Chỉnh sửa thông tin</span></div>
</div>
</div>
<script>
    var accountUpdateUrl = "{{ route('account.update') }}";
</script>
