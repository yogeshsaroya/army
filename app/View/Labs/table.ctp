<!-- DATA TABLES -->
<link href="<?php echo SITEURL."lab_root/";?>plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<style>
@media only screen and (max-width: 760px),(min-device-width: 768px) and (max-device-width: 1024px) {
#lab_table td:nth-of-type(1):before{content:"Rendering engine"}
#lab_table td:nth-of-type(2):before{content:"Rendering engine"}
#lab_table td:nth-of-type(3):before{content:"Rendering engine"}
#lab_table td:nth-of-type(4):before{content:"Rendering engine"}
#lab_table td:nth-of-type(5):before{content:"Rendering engine"}
#lab_table td:nth-of-type(6):before{content:"Browser"}
#lab_table td:nth-of-type(7):before{content:"Platform(s)"}
#lab_table td:nth-of-type(8):before{content:"Engine version"}
#lab_table td:nth-of-type(9):before{content:"CSS grade"}
}


	</style>

<div class="content-wrapper" style="min-height: 916px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Data Tables <small>advanced tables</small>
		</h1>

	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Hover Data Table</h3>
					</div>
					<!-- /.box-header -->

					<div class="box">

						<div class="box-body">


							<div class="input-group margin">
								<input type="text" class="form-control"> <span
									class="input-group-btn">
									<button type="button" class="btn btn-info btn-flat">Go!</button>
								</span>
							</div>
						</div>


						<div class="box-body">
							<div id="example2_wrapper"
								class="dataTables_wrapper form-inline dt-bootstrap">
								<div class="row">
									<div class="col-sm-6"></div>
									<div class="col-sm-6"></div>
								</div>
								<div class="row">
									<div class="col-sm-12" id="lab_table">
										<table class="table table-bordered table-hover dataTable" id="example2" role="grid" aria-describedby="example2_info">
											<thead>
												<tr role="row">
													<th class="sorting">Rendering engine</th>
													<th class="sorting" tabindex="0" aria-controls="example2"
														rowspan="1" colspan="1"
														aria-label="Browser: activate to sort column ascending">Browser</th>
													<th class="sorting" tabindex="0" aria-controls="example2"
														rowspan="1" colspan="1"
														aria-label="Platform(s): activate to sort column ascending">Platform(s)</th>
													<th class="sorting" tabindex="0" aria-controls="example2"
														rowspan="1" colspan="1"
														aria-label="Engine version: activate to sort column ascending">Engine version</th>
													<th class="sorting_desc" tabindex="0"
														aria-controls="example2" rowspan="1" colspan="1"
														aria-label="CSS grade: activate to sort column ascending"
														aria-sort="descending">CSS grade</th>
												</tr>
											</thead>
											<tbody>

												<tr role="row" class="odd">
													<td class="">Trident</td>
													
													<td class="">Internet Explorer 4.0</td>
													<td class="">Win 95+</td>
													<td class="">4</td>
													<td class="sorting_1">X</td>
												</tr>
												
												<tr role="row" class="odd">
													<td class="">sdfsd</td>
													
													<td class="">Internet Explorer 4.0</td>
													<td class="">Win 95+</td>
													<td class="">4</td>
													<td class="sorting_1">X</td>
												</tr>
											</tbody>
											<tfoot>
												<tr>
													<th rowspan="1" colspan="1">Rendering engine</th>
													
													<th rowspan="1" colspan="1">Browser</th>
													<th rowspan="1" colspan="1">Platform(s)</th>
													<th rowspan="1" colspan="1">Engine version</th>
													<th rowspan="1" colspan="1">CSS grade</th>
												</tr>
											</tfoot>
										</table>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-5">
										<div class="dataTables_info" id="example2_info" role="status"
											aria-live="polite">Showing 1 to 10 of 57 entries</div>
									</div>
									<div class="col-sm-7">
										<div class="dataTables_paginate paging_simple_numbers"
											id="example2_paginate">
											<ul class="pagination">
												<li class="paginate_button previous disabled"
													id="example2_previous"><a href="#" aria-controls="example2"
													data-dt-idx="0" tabindex="0">Previous</a></li>
												<li class="paginate_button active"><a href="#"
													aria-controls="example2" data-dt-idx="1" tabindex="0">1</a></li>
												<li class="paginate_button "><a href="#"
													aria-controls="example2" data-dt-idx="2" tabindex="0">2</a></li>
												<li class="paginate_button "><a href="#"
													aria-controls="example2" data-dt-idx="3" tabindex="0">3</a></li>
												<li class="paginate_button "><a href="#"
													aria-controls="example2" data-dt-idx="4" tabindex="0">4</a></li>
												<li class="paginate_button "><a href="#"
													aria-controls="example2" data-dt-idx="5" tabindex="0">5</a></li>
												<li class="paginate_button "><a href="#"
													aria-controls="example2" data-dt-idx="6" tabindex="0">6</a></li>
												<li class="paginate_button next" id="example2_next"><a
													href="#" aria-controls="example2" data-dt-idx="7"
													tabindex="0">Next</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
	
	</section>
	<!-- /.content -->
</div>
<!-- DATA TABES SCRIPT -->
<!-- DATA TABES SCRIPT -->
<script
	src="<?php echo SITEURL."lab_root/";?>plugins/datatables/jquery.dataTables.min.js"
	type="text/javascript"></script>
<script
	src="<?php echo SITEURL."lab_root/";?>plugins/datatables/dataTables.bootstrap.min.js"
	type="text/javascript"></script>
<!-- SlimScroll -->
<script
	src="<?php echo SITEURL."lab_root/";?>plugins/slimScroll/jquery.slimscroll.min.js"
	type="text/javascript"></script>
<!-- FastClick -->
<script
	src='<?php echo SITEURL."lab_root/";?>plugins/fastclick/fastclick.min.js'></script>
<!-- AdminLTE App -->
<script src="<?php echo SITEURL."lab_root/";?>dist/js/app.min.js"
	type="text/javascript"></script>

<!-- page script -->
<script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>
