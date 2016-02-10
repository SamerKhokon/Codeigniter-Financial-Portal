<div class="navbar navbar-default yamm">
			<div class="navbar-header">
				<button class="navbar-toggle" data-target="#navbar-collapse-1" data-toggle="collapse" type="button">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
			</div>

			<div class="navbar-collapse collapse navbar-header" id="navbar-collapse-grid">
				<ul class="nav navbar-nav">
					<!-- Grid 12 Menu -->
					
					
					<?php $menu_overview =  $this->load->get_var("menu_overview");?>
					<li class="dropdown yamm-fw">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">Company Fundamentals &amp; Quantitatives<b class="caret"></b></a>
						<ul class="dropdown-menu">
						<li>
							<div class="row">
								<div class="col-sm-8">
									<p class="yamm-content">
									<?php echo $menu_overview; ?>
									</p>
								</div>
								<div class="col-sm-2"><br>
									<ul class="remove-margin">
										  <li><a href="<?php echo site_url();?>/betaui"> Beta </a></li>
										  <li><a href="<?php echo site_url();?>/corellation_ui"> Correlation </a></li>
										  <li><a href="<?php echo site_url();?>/capital_gain_ui"> Capital Gain </a></li>
										  <li><a href="<?php echo site_url();?>/stock_vs_pe_ui"> Stock P/E Chart </a></li>
										  <li><a href="<?php echo site_url();?>/volatality_ui"> Volatility </a></li>
										  <li><a href="<?php echo site_url();?>/weekly_top_ui"> Weekly Top</a></li>                          
										  <li><a href="<?php echo site_url();?>/daily_top_ui"> Daily Top</a></li>                          
										  <li><a href="<?php echo site_url();?>/volatality_ui">Volatality</a></li>
									</ul>
								</div>
								<div class="col-sm-2"><br>
									<ul class="remove-margin">
										<li><a href="<?php echo site_url();?>/eps_npat_ui"> EPS &amp; NPAT Data</a></li>
										<li><a href="<?php echo site_url();?>/company_basic_info_ui"> Company Basic Info</a></li>
										<li><a href="<?php echo site_url();?>/divident_details_ui"> Dividend Details</a></li>
										<li><a href="<?php echo site_url();?>/moving_avg_band_ui"> Moving Average </a></li>
										<li><a href="javascript:void(0);"> Technical Screener</a></li>
									</ul>
								</div>
							</div>
						</li>
						</ul>
					</li>

				  
				</ul>
			</div>
        </div>