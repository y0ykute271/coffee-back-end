@extends('layout.index')
@section('content')
<section class="panel">
                        <header class="panel-heading">
                            Thêm sản phẩm
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="name" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mô tả</label>
                                    <input type="name" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá</label>
                                    <input type="name" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div><div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng</label>
                                    <input type="name" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div><div class="form-group">
                                    <label for="exampleInputEmail1">Trạng thái</label>
                                    <input type="name" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Tải hình ảnh lên</label>
                                    <input type="file" id="exampleInputFile">                                  
                                </div>
                                <button type="submit" class="btn btn-info">Thêm</button>
                            </form>
                            </div>

                        </div>
                    </section>
@endsection
@section('script')
@endsection