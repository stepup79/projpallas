@extends('backend.layouts.master')

@section('title')
Dashboard
@endsection

@section('custom-css')
<style>
  .img-hinhdaidien {
    width: 50px;
    height: 50px;
  }
  .notice {
        font-style: italic;
        font-size: 0.8em;
    }
</style>
@endsection

@section('content')
<!-- Info boxes -->
<div class="row" >
          <div class="col-12 col-sm-6 col-md-3" ng-controller="SanPhamController">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-bars"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Sản Phẩm</span>
                <span class="info-box-number" ng-repeat="sp in danhsach_sanpham"><% sp.soluong %></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3" ng-controller="KhachHangController">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Khách Hàng</span>
                <span class="info-box-number" ng-repeat="kh in danhsach_khachhang"><% kh.soluong %></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3" ng-controller="DonHangController">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Đơn Hàng</span>
                <span class="info-box-number" ng-repeat="dh in danhsach_donhang"><% dh.soluong %></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3" ng-controller="LoaiSanPhamController">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Loại Sản Phẩm</span>
                <span class="info-box-number" ng-repeat="lsp in danhsach_loaisanpham"><% lsp.soluong %></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            <div class="card mb-2" ng-controller="thongKeSanPhamController">
                <div class="card-header">Top 5 sản phẩm mới nhất</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>STT</td>
                                <td>Hình đại diện</td>
                                <td>Tên sản phẩm</td>
                                <td>Giá</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="sp in danhsach_top5_sanpham_moinhat">
                                <td><% $index + 1 %></td>
                                <td>
                                    <img ng-src="/storage/photos/<% sp.sp_hinh %>" class="img-hinhdaidien"/>
                                </td>
                                <td><% sp.sp_ten %></td>
                                <td><% sp.sp_gia | number:0 %></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- ./card-body -->
        <div class="card-footer">
          <div class="row">
            <div class="col-md-12">
                <form method="get" action="#" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="thoigianLapBaoCao">Thời gian lập báo cáo</label>
                        <input type="text" class="form-control" id="thoigianLapBaoCao">
                        <span id="thoigianLapBaoCaoText" class="notice"></span>
                    </div>
                    <div class="form-group" style="display: none;">
                        <label for="tuNgay">Từ ngày</label>
                        <input type="text" class="form-control" id="tuNgay" name="tuNgay">
                    </div>
                    <div class="form-group" style="display: none;">
                        <label for="denNgay">Đến ngày</label>
                        <input type="text" class="form-control" id="denNgay" name="denNgay">
                    </div>
                    <button type="submit" class="btn btn-primary" id="btnLapBaoCao">Lập báo cáo</button>
                </form>
            </div>
            <div class="col-md-12">
                <canvas id="chartOfobjChart" style="width: 100%;height: 400px;"></canvas>
            </div>
        </div>
          <!-- /.row -->
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

@endsection

@section('custom-scripts')

@endsection