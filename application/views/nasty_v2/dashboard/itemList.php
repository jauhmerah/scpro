<div class="row">
	<div class="col-md-12">
           <div class="tab-pane active" id="tab_1">
                        <div class="portlet box red-soft ribbon mt-element-ribbon" >
                            <div class="portlet-title">
                                <div class="caption">
                                    <img src="<?= base_url(); ?>/assets/cover/favicon2.png"> Item List                                   
                                </div>
                            
                            </div>
                           <div class="portlet-body form">


                           	<div class="table-responsive">
                           	<div class="col-md-12">
                           	<?php $us_lvl=$this->my_func->scpro_decrypt($this->session->userdata('us_lvl')); ?>
					<table class="table table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>Item</th>
								<!-- <th>Strength</th> -->
								<th>Total</th>
								<?php if($us_lvl != 8 && $us_lvl != 9 && $us_lvl != 10){ ?>
								<th>Action</th>
								<?php } ?>
							</tr>
						</thead>
						<tbody>
						<?php
						$n=0;
						
							foreach ($arr as $key) { 
								$n++;
								?>		
								<tr>
									<td><?= $n; ?></td>
									<td><?= $key->ty2_desc; ?> | <?= $key->ni_mg; ?> mg</td>
									
									<!-- <td></td> -->
								
									<td><strong><big><?= $key->sti_total; ?></big></strong></td>
									<?php if($us_lvl != 8 && $us_lvl != 9 && $us_lvl != 10){ ?>
									<td>
								 <button type="button" class="Lorder bg-green-jungle btn-circle btn-xs" id="L<?= $n; ?>" title="Check-In"><i class="fa fa-arrow-down"></i></button>
									</td>
									<?php } ?>
								</tr>
								<tr class="L<?= $n; ?>" style="display : none;">
									<td colspan="5" >
										<div class="row">
											<div class="col-md-10 col-md-offset-1">
											<div class="col-md-6">
											<label class="control-label pull-right">Quantity :</label>
											</div>
												 <div class="col-md-5">

		                                                <div class="form-group">
		                                                    <form action="<?= site_url('nasty_v2/dashboard/updateQty1'); ?>" method="POST">
		                                                    <input type="number" id="qty" name="qty" class="form-control input-circle">
		                                                    <div class="clearfix" style="height: 10px"></div>
		                                                    <input type="hidden" class="form-control" value ="<?= $key->sti_id ?>" name="sti_id">
		                                                     <button type="submit" class="btn blue pull-right">

					                                            <i class="fa fa-save"></i> Save
					                                        </button>
					                                        </form>
		                                                </div>
		                                            </div>											
											</div>										
										</div>
										
									</td>
								</tr>
					 <?php } ?>
						 
						</tbody>
					</table>
					</div>
				</div>


                            </div> 
                        </div>                       
                    </div>
        </div>
</div>
<script>


		


	$(document).ready(function() {


		$(".Lorder").click(function() {
			temp = $(this).prop('id');
			if ($("."+temp).is(':visible')) {
				$("."+temp).hide('slow');
			}else{
				$("."+temp).show('slow');
			}			
			//alert("jadi");
		});




		
	});

</script>