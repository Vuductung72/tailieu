@extends('admin.layouts.master')
@section('page_og:url', request()->url())
@section('page_title', 'Danh sách liên hệ')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light portlet-datatable bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-list-ol" aria-hidden="true"></i>
                        <span class="caption-subject bold uppercase">@yield('page_title')</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:void(0);" title=""></a>
                    </div>
                </div>
                <div class="portlet-title">
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="admin-table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Ngày tạo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $key => $contact)
                            <tr>
                                <td >{{ $key+1 }}</td>
                                <td >{{ $contact->name}}</td>
                                <td >{{ $contact->email }}</td>
                                <td >{{ $contact->phone }}</td>
                                <td width='500'>{{ $contact->content }}</td>
                                <td >{{ \Carbon\Carbon::createFromDate($contact->created_at)->format('d/m/Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        {{ $contacts->withQueryString()->links('web.layouts.paginate') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="modal fade" id="payment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Cộng trừ tiền</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="count-money-form">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" class="form-control" id="id">
                    <div class="form-group">
                        <label for="name">Tên:</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="count-type">Phương thức:</label>
                        <select class="form-control" name="count-type">
                            <option value="1">Cộng (+)</option>
                            <option value="0">Trừ (-)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="count-money">Số tiền:</label>
                        <input type="numer" name="count-money" class="form-control input-money" placeholder="Nhập số tiền ..." id="count-money">
                        <div class="input-convert-amount">
                            <p>= <span>0</span> VND</p>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary" id="count-money">Nạp tiền</button>
                      </div>
                </form>
            </div>
          </div>
        </div>
    </div> --}}
@endsection

@push('css')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <!-- END PAGE LEVEL PLUGINS -->
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {

            var format = function(num){
                var str = num.toString().replace("", ""), parts = false, output = [], i = 1, formatted = null;
                if(str.indexOf(".") > 0) {
                parts = str.split(".");
                str = parts[0];
                }
                str = str.split("").reverse();
                for(var j = 0, len = str.length; j < len; j++) {
                if(str[j] != ",") {
                    output.push(str[j]);
                    if(i%3 == 0 && j < (len - 1)) {
                    output.push(",");
                    }
                    i++;
                }
                }
                formatted = output.reverse().join("");
                return("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
            };

            $('.btn-count').click(function (e) {
                let userId = $(this).data('id');
                let userName = $(this).data('name');
                let url = $(this).data('url');
                $('#payment #id').val(userId);
                $('#payment #name').val(userName);
                $('#count-money-form').attr('action', url);
            });

            $(".input-money").keyup(function () {
                var money = $(this).val();
                $('.input-convert-amount span').html(format(money));
                if(money == ''){
                    $('.input-convert-amount span').html('0');
                }
            });

            $(".input-money").keypress(function(event) {
                return /\d/.test(String.fromCharCode(event.keyCode));
            });
        })
    </script>
@endpush
