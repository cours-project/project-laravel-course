<div class="col-lg-8">
    <div class="card mb-4">
        <div class="card-body">
            <form action="" class="mb-2">
                <div class="row">
                    <div class="col-3">
                        <select name="status_id" class="form-select">
                            <option value="">Tất cả trạng thái</option>
                            @foreach ($orderStatus as $status)
                            <option {{request()->status_id == $status->id ? 'selected': ''}} value="{{$status->id}}" {{request()->status_id == $status->id ? 'selected': ''}}>{{$status->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-2">
                        <input type="text" class="datepicker-1 form-control" value="{{request()->start_date}}" name="start_date" placeholder="Từ ngày..." />
                    </div>
                    <div class="col-2">
                        <input type="text" class="datepicker-2 form-control"  value="{{request()->end_date}}" name="end_date" placeholder="Đến ngày..." />
                    </div>
                    <div class="col-3">
                        <input type="number" class="form-control" name="total" value="{{request()->total}}" placeholder="Tổng tiền..."  />
                    </div>
                    <div class="col-2">
                        <div class="d-grid">
                            <button type="submit" class="filter-btn btn-primary">Tìm kiếm</button>
                        </div>
                    </div>
                </div>
            </form>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="5%">STT</th>
                        <th width="15%">Mã đơn hàng</th>
                        <th>Tổng tiền</th>
                        <th width="20%">Trạng thái</th>
                        <th width="25%">Thời gian</th>
                        <th width="15%">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $key => $order)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td><a href="#">#{{ $order->id }}</a></td>
                            <td>{{ formatPrice($order->total) }}</td>
                            <td>
                                <span class="badge bg-{{ $order->orderStatus->color }}">
                                    {{ $order->orderStatus->name }}
                                </span>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:i:s') }}</td>
                            <td class="d-grid">
                                <a href="#" class="btn btn-outline-primary btn-sm">Chi tiết</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col-lg-12 text-center">
                <nav aria-label="Page navigation example">
                    {{ $orders->links() }}
                  </nav>
                </div>
        </div>
    </div>
</div>
