<div class="content-wrapper" style="min-height: 1066px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Our Dealer<small>  <?php echo $this->Html->link('Add New Dealer','/lab/labs/create_our_dealer/',array('class' => ''));?></small></h1>
          
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Our Dealers</h3>
              
            </div>
            <div class="box-body">
              <div class="row">
									<div class="col-sm-12" id="lab_table">
										<table class="table table-bordered table-hover dataTable" id="example2" role="grid" aria-describedby="example2_info">
											<thead>
											
					<tr role="row">
                        <th><?php echo $this->Paginator->sort('OurDealer.title', 'Title', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('OurDealer.email', 'email', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('OurDealer.address', 'Address', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('OurDealer.country', 'Country', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('OurDealer.created', 'Created', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('OurDealer.status', 'Status', array('escape' => false)); ?></th>
                        <th>Action</th>
                    </tr>
</thead>
<tbody id="table_rows">

 <?php
                    if (!empty($data)) {
                        foreach ($data as $list) { ?>
                            <tr class="odd gradeX">
                                <td class="center gnTxt"> <?php echo $list['OurDealer']['title']; ?></td>
                                <td class="center gnTxt"><?php echo $list['OurDealer']['email']; ?></td>
                                <td class="center gnTxt"> <?php echo substr($list['OurDealer']['address'], 0,100); ?> </td>
                                <td class="center"> <?php echo $list['OurDealer']['country']; ?> </td>
                                <td class="center"> <?php echo date('M d,y',strtotime($list['OurDealer']['created'])); ?> </td>
                                <td class="center"> <?php if($list['OurDealer']['status'] == 1){ echo $this->Html->link('Active','/lab/labs/our_dealer?st='.$list['OurDealer']['id'],array('class' => 'green')); }
                                else{  echo $this->Html->link('Deactive','/lab/labs/our_dealer?st='.$list['OurDealer']['id'],array('class' => 'red')); } ?> </td>
                                <td class="center"> <?php echo $this->Html->link('Edit', array('controller' => 'labs', 'action' => 'create_our_dealer', $list['OurDealer']['id'])); ?> </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
</tbody>
											
										</table>
									</div>
								</div>
            </div><!-- /.box-body -->
            <div class="box-footer">
              
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div>