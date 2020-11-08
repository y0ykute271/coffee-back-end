@extends('layout.index')
@section('content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh dách danh mục
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
      <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button"><a href="#"><i class="fa fa-plus"></i>Thêm danh mục</a></button>
          </span>
      </div>
      <div class="col-sm-4">
      <div class="input-group">
          
        </div>
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button"><i class="fa fa-search"></i>Tìm kiếm</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>ID</th>
            <th>Tên danh mục</th>
            <!-- <th>Tên loại</th> -->
            <th>Ngày tạo</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>

        <?php foreach ($name as $key => $value) {?>
         <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td><?php echo $value->id; ?></td>
            <td><?php echo $value->name; ?></td>
             
            <td><?php echo $value->created_at; ?></td>
            <td>
              <a href="" ui-toggle-class=""><i class="fa fa-wrench"></i><i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
      <?php  } ?>
          
          <!-- <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>Avatar system</td>
            <td>15c</td>
            <td>Jul 15, 2013</td>
            <td>
              <a href="" class="active" ui-toggle-class=""><i class="fa fa-check text-success text-active"></i><i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>Throwdown</td>
            <td>4c</td>
            <td>Jul 11, 2013</td>
            <td>
              <a href="" class="active" ui-toggle-class=""><i class="fa fa-check text-success text-active"></i><i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>Idrawfast</td>
            <td>4c</td>
            <td>Jul 7, 2013</td>
            <td>
              <a href="" class="active" ui-toggle-class=""><i class="fa fa-check text-success text-active"></i><i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr> -->


        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">

        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
  @endsection
  @section('script')
  @endsection