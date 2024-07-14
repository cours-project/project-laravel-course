<div class="col-lg-4">
    <div class="card mb-4">
      <div class="card-body text-center">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
          class="rounded-circle img-fluid" style="width: 150px;">
        <h5 class="my-3">John Smith</h5>
        <p class="text-muted mb-1">Full Stack Developer</p>
        <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>
        <div class="d-flex justify-content-center mb-2">
          <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary">Follow</button>
          <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary ms-1">Message</button>
        </div>
      </div>
    </div>
    <div class="card mb-4 mb-lg-0">
      <div class="card-body p-0">
        <ul class="list-group list-group-flush rounded-3">
          <li class="list-group-item d-flex justify-content-between align-items-center p-3 {{ activeMenu('account.index') ? 'active' : '' }} ">
            <i class="fas fa-globe fa-lg text-warning"></i>
            <a href="{{ route('account.index') }}">Tổng quan </a>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center p-3 {{ activeMenu('account.myCourses') ? 'active' : '' }} "   >
            <i class="fab fa-github fa-lg text-body"></i>
            <a href="{{ route('account.myCourses') }}" class="mb-0">Khóa học của tôi</a>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center p-3 {{ activeMenu('account.myOrders') ? 'active' : '' }}  " >
            <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
            <a href="{{ route('account.myOrders') }}" class="mb-0">Đơn hàng</a>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center p-3 {{ activeMenu('account.changeMyPass') ? 'active' : '' }}  " >
            <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
            <a href={{ route('account.changeMyPass') }} class="mb-0">Đổi mật khẩu</a>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center p-3 " >
            <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
            <a href='' class="mb-0">Đăng xuất</a>
          </li>
        </ul>
      </div>
    </div>
  </div>