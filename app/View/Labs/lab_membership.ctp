<div class="content-wrapper" style="min-height: 1066px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Dealer Membership Level</h1>
    
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            
            <div class="box box-info">
            
            <div class="box-body">
              <div class="" id="lab_table">
<table class="table table-bordered table-hover dataTable" id="example2" role="grid" aria-describedby="example2_info">
<thead>
					<tr role="row">
                        <th>ID</th>
                        <th>Name</th>
                        <th>SS Products (%)</th>
                        <th>Titanium Products (%)</th>
                        <th>Edit</th>
                    </tr>
</thead>
<tbody id="table_rows">
<?php if(isset($data) && !empty($data)){
foreach ($data as $list){ ?>
<tr>
	<td class="center gnTxt"><?php echo $list['DealerLevel']['id'];?></td>
    <td class="center gnTxt"><?php echo $list['DealerLevel']['title'];?></td>
    <td class="center gnTxt"><?php echo $list['DealerLevel']['offer_1'];?></td>
    <td class="center gnTxt"><?php echo $list['DealerLevel']['offer_2'];?></td>
    <td class="center gnTxt"><a href="<?php echo SITEURL."lab/labs/edit_level/".$list['DealerLevel']['id'];?>" title="">Edit</a></td>
</tr>
<?php }}?>
</tbody>
</table>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          </div><!-- /.box -->
        </section><!-- /.content -->
      </div>