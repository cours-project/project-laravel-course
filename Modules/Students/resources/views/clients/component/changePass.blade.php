<div class="col-lg-8">
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('account.updatePass') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Mật khẩu cũ</p>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="old-password">
                        @error('old-password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Mật khẩu mới</p>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="password">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Xác minh mật khẩu mơi</p>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="confirm-password">
                        @error('confirm-password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="con-btn">
                    <button type="submit" class="btn btn-submit2">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>
