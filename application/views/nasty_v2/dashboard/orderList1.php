<script>
	function onDel() {
		return confirm('Are You Sure ?');
	}
	$(document).ready(function() {

		$("#sub").click(function() {
			if (searchFun()) {
				$("#formSearch").submit();
			} else {
				$("#inputFilter").focus();
			}
		});
		function searchFun() {
			filter = $("#inputFilter").val();
			if (filter == -1) {
				bootbox.alert("Please select Filter");
				return false;} else {return true;}
		}
	});	
</script>
<div class="row">
	<div class="col-md-12">	
	<pre><?php print_r($arr1); ?></pre>
		<div class="portlet box purple">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list"></i>Order List 2017
                </div>                
            </div>
            <div class="portlet-body flip-scroll">
	            <div class="row">
	            <form id="formSearch" action="<?= site_url('nasty_v2/dashboard/page/a1'); ?>" method="POST" role="form">
	            	<div class="col-md-12">
	            		<div class="col-md-2">
	            			<a href="<?= site_url('nasty_v2/dashboard/page/z1'); ?>"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add Order</button></a>
	            		</div>
	            		<div class="col-md-4">
	            			<div class="form-group">
	            				<label for="input" class="col-sm-2 control-label">Search</label>
	            				<div class="col-sm-10">
	            					<input type="search" disabled name="search" id="search" class="form-control input-circle" placeholder="Next Ver 2.3.1" required>
	            				</div>
	            			</div>
	            		</div>
	            		<div class="col-md-4">
	            			<div class="form-group">
	            				<label for="inputFilter" class="col-sm-2 control-label">Filter</label>
	            				<div class="col-sm-10">
	            					<select name="filter" id="inputFilter" class="form-control input-circle" disabled>
	            						<option value="-1">-- Next Ver 2.3.1 --</option>
	            						<option value="10">Client Name</option>
	            						<option value="1">Order Code</option>
	            						<option value="2">Sales Person</option>
	            						<option value="3">Order Status</option>
	            					</select>
	            				</div>
	            			</div>
	            		</div>
	            		<div class="col-md-2">
	            			<button type="button" class="btn btn-default disabled"><i class="fa fa-search"></i> Search</button><!-- id="sub" -->
	            		</div>
	            	</div>
	            </form>
	            </div>
	            <div class="clearfix">
	            	&nbsp;
	            </div>
	            <div class="row">
	            	<div class="col-md-12">
	            		<table class="table table-bordered table-striped flip-content">
		                    <thead class="flip-content">
		                        <tr>
		                            <th>#</th>
		                            <th>Client Name</th>
		                            <th>Order Code</th>
		                            <th>Order Date</th>
		                            <th>Sales Person</th>
		                            <th>Status</th>
		                            <th>Action</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                    <?php
		                    	$n = 0; 
		                    	if (sizeof($arr1) != 0) { 
		                    		foreach ($arr1 as $user) {
		                    			$n++;
		                    			?>
		                    	<tr>
		                            <td><?= $n; ?></td>
		                            <td><?php 
                                    $view = ($user->cl_name == null) ? "--Not Set--" : $user->cl_name ;
                                    echo $view;
                                    ?></td>
		                            <td><?php 
		                            if ($user->or_id) {
		                            	$id = '#'.(120000+$user->or_id);
		                            	echo '<span style = "color : #b706d6;"><strong>'.$id.'</strong></span>';
		                            } else {
		                            	echo "--Not Set--";
		                            }
                                    ?></td>
		                            <td><?php 
                                    $view = ( $user->or_date == null) ? "--Not Set--" :  date_format(date_create($user->or_date) , 'd-M-Y' ) ;
                                    echo $view ;
                                    ?></td>
		                            <td><?php 
                                    $view = ( $user->us_username == null) ? "--Not Set--" :  $user->us_username ;
                                    echo $view;
                                    ?></td>
                                    <td class="mt-element-ribbon">
                            			<span class="label" style="background-color: <?= $user->pr_color; ?>"><?= $user->pr_desc; ?></span>
                            			<div title="Paid" class="ribbon ribbon-right ribbon-vertical-right ribbon-shadow ribbon-border-dash-vert ribbon-color-success uppercase" >
                            				<div class="ribbon-sub ribbon-bookmark"><i class="fa fa-money"></i></div>
                            			</div>
                                    </td>
		                            <td align="center">
                                    <?php 
                                        $usid = $this->my_func->scpro_encrypt($user->or_id);
                                    ?>
		                            	<a href="<?= site_url('nasty_v2/dashboard/page/a111?v=2&view=').$usid; ?>" name="c4" title="Order Detail"><button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-eye"></i></button></a>&nbsp;-&nbsp;                            	
										<a href="<?= site_url('nasty_v2/dashboard/page/a121?v=2&edit=').$usid; ?>" name="c3" title="Edit Order"><button type="button" class="btn btn-warning btn-circle btn-xs"><i class="fa fa-pencil"></i></button></a>&nbsp;-&nbsp; 
										<button type="button" class="btn btn-circle purple-seance btn-xs"><i class="fa fa-upload"></i></button></a>
										<?php if($user->pr_id == 3){ ?>
                                    			&nbsp;- &nbsp;<button title = "Print Order" onclick = "window.open('<?= site_url('order/printO1?id='.$this->my_func->scpro_encrypt($user->or_id)); ?>');" type="button" class="btn btn-default btn-circle btn-info btn-xs"><i class="fa fa-print"></i></button>&nbsp;-&nbsp;
                                    			<button type="button" title = "D.O Form" onclick = "window.open('<?= site_url('order/printDO1?id='.$this->my_func->scpro_encrypt($user->or_id)); ?>');" class="btn btn-success btn-circle btn-xs"><i class="fa fa-truck"></i></button>
                                    		<?php } ?><br>
										<button type="button" class="btn blue-dark btn-circle btn-xs" title="Invoice">Inv</button></a>&nbsp;-&nbsp;    
										<button type="button" class="btn c-btn-border-1x c-btn-blue-dark btn-circle btn-xs" title="Dummy Invoice">DInv</button></a>&nbsp;-&nbsp;    
										<button type="button" class="btn bg-green-jungle btn-circle btn-xs" title="Confirm"><i class="fa fa-thumbs-up"></i></button><button type="button" class="btn bg-red-pink btn-circle btn-xs" title="Un Confirm"><i class="fa fa-thumbs-down"></i></button></a>&nbsp;-&nbsp;       										
										<button type="button" class="btn btn-default btn-circle btn-xs" title="Cancel Order"><i class="fa fa-close"></i></button><a onclick = "return onDel();" href="<?= site_url('nasty_v2/dashboard/page/a13?del=').$usid; ?>" name="c5" title="Delete Order"><button type="button" class="btn btn-danger btn-circle btn-xs"><i class="fa fa-trash"></i></button></a>
		                            </td>		                            
		                        </tr>		
		                    			<?php
		                    		}
		                    	}		                    ?>		                                               
		                    </tbody>
		                    <?php if (isset($page)) {?>
		                    <tfoot>
		                    	<td colspan="7">
			                	<div class="col-md-5 col-sm-5">
			                		<div class="dataTables_info" id="sample_1_info" role="status" aria-live="polite">Showing <?= ($page+1); ?> to <?= ($page+$row); ?> of <?= $total; ?> records</div>
			                	</div>
			                	<div class="col-md-7 col-sm-7" align="right">
			                		<div class="dataTables_paginate paging_bootstrap_full_number" id="sample_1_paginate">
			                			<ul class="pagination" style="visibility: visible;">
			                			<?php
			                			$prev = "";
			                			$next = "";
			                				if ($page == 0) {
			                					$prev = "disabled";
			                				}
			                				if ($total <= ($page + 10)) {
			                					$next = "disabled";
			                				}
			                			?>
			                				<li class="prev <?= $prev; ?>"><a <?php if($prev!="disabled"){ ?>href="<?= site_url('nasty_v2/dashboard/page/a1?page='.($page-10)); ?>"<?php } ?> title="Prev" ><i class="fa fa-angle-left"></i></a></li>			                				
			                				<li class="next <?= $next; ?>"><a <?php if($next!="disabled"){ ?>href="<?= site_url('nasty_v2/dashboard/page/a1?page='.($page+10)); ?>"<?php } ?> title="Next"><i class="fa fa-angle-right"></i></a></li>
			                			</ul>
			                		</div>
			                	</div>
				                </td>
		                    </tfoot> <?php 
		                    } ?>
		                </table>		                
	            	</div>
	            </div>	                         
            </div>
        </div>
	</div>
</div>