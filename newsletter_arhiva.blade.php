<!DOCTYPE html>
<html lang="hr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Newsletter Arhiva</title>
	<link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<style>
	.card {
		box-shadow: 0 4px 6px 0 rgba(22, 22, 26, 0.18);
		border-radius: 0;
		border: 0;
	}
	.one-column:hover
	{
		transform: scale(1.02);
	}
</style>
</head>
<body>
	<div class="container my-3">
		<h1>Newsletter Arhiva</h1>		
		
		<h3 class="mb-3">Lista poslanih newslettera</h3>
		<div class="col-sm-12 col-lg-9 mx-auto my-3" id="accordion">
			
			<?php $prvi = 1; $cnt = 0;?>
			@FOREACH ($nizNewslettera as $token=>$jedanIzNiza)
			
			<div class="card">
				<div class="card-header" id="heading">
					<h5 class="mb-0">
						<button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$token}}" aria-expanded="true" aria-controls="collapse{{$token}}" style="color: #e20074;">
							<?php 
							$datumi = \DB::select("SELECT `datum` FROM `newsletter_arhiva` WHERE `id` = $token");
							$datum = [];
							foreach ($datumi as $jedanDatum) {
								$datum[] = $jedanDatum->datum;
							}
							?>
							<h5><?php echo date('d.m.Y.', strtotime($datum[0]));?></h5>
						</button>
						@IF($prvi)
						<span class="badge badge-secondary">Novo</span>
						@ENDIF
					</h5>
				</div>
				<div id="collapse{{$token}}" class="collapse hide" aria-labelledby="heading" data-parent="#accordion">
					<div class="card-body" style="background-color: #e20074;">
						<!-- Creating an Outer Scaffold - Email Wrapper -->
						<table role="presentation" style="width: 100%; border: none; border-spacing: 0; background-color: #e5e5e5;">
							<tr>
								<td align="center" style="padding: 0;">
									<!-- Main Content Container -->
									<table role="presentation" style="width: 100%; max-width: 660px; border: none; border-spacing: 0; text-align: left; font-family: Helvetica, Arial, sans-serif; font-size: 16px; line-height: 22px;">
										<!-- Featured Story -->
										<tr>
											<td style="padding: 35px 30px 20px 30px; background-color: #e5e5e5">
												@IF($jedanIzNiza[0] != "")
												<h2 style="font-size: 24px; font-weight: bold; margin: 0 0 20px 0;">{{$jedanIzNiza[0]}}</h2>
												@ENDIF
												@IF($jedanIzNiza[2] != "")
												<p style="color: #000000;"><img src="http://wsat7782:82/tms/public/newsletter/{{$jedanIzNiza[2]}}" alt="" style="width: 100%; height: auto; border: none; color: #000000; font-size: 16px;"/></p>
												@ENDIF
												@IF($jedanIzNiza[1] != "")
												<p style="margin: 0 0 12px 0; font-size: 16px; line-height: 24px; text-align: justify;">{{$jedanIzNiza[1]}}</p>
												@ENDIF
												@IF($jedanIzNiza[3] != "")
												<p style="margin: 0; text-align: right;"><a href="{{$jedanIzNiza[3]}}" style="font-size: 16px; background: #e20074; text-decoration: none; padding: 10px 25px; color: #ffffff; display: inline-block; mso-padding-alt: 0; text-underline-color: #ff3884"><span style="mso-text-raise: 10pt; font-weight: bold;">Saznajte više</span></a></p>
												@ENDIF
											</td>
										</tr>
										<!-- Other Stories - Two Column Section -->
										<tr>
											<td style="padding: 35px 30px 35px 30px; font-size: 0; text-align: left; background-color: #e5e5e5;">
												
												<?php 
												$naslovi = array();
												$tekstovi = array();
												$slike = array();
												$linkovi = array();
												for ($i = 4; $i < count($nizNewslettera[$token]); $i += 4) {
													$naslovi[] = $jedanIzNiza[$i];
												}
												for ($i = 5; $i < count($nizNewslettera[$token]); $i += 4) {
													$tekstovi[] = $jedanIzNiza[$i];
												}
												for ($i = 6; $i < count($nizNewslettera[$token]); $i += 4) {
													$slike[] = $jedanIzNiza[$i];
												}
												for ($i = 7; $i < count($nizNewslettera[$token]); $i += 4) {
													$linkovi[] = $jedanIzNiza[$i];
												}
												?>

												@FOR($i = 0; $i < count($naslovi); $i++)

												<div class="col-news" style="display: inline-block; width: 100%; vertical-align: top; padding-bottom: 20px;">
													@IF($naslovi[$i] != "")
													<h3 style="margin: 0 0 25px 0; font-size: 16px; font-weight: bold; line-height: 24px;">{{$naslovi[$i]}}</h3>
													@ENDIF
													@IF($slike[$i] != "")
													<p style="color: #000000;"><img src="http://wsat7782:82/tms/public/newsletter/{{$slike[$i]}}" alt="" style="width: 100%; height: auto; border: none; color: #000000; font-size: 16px;"/></p>
													@ENDIF
													@IF($tekstovi[$i] != "")
													<p style="margin: 0 0 12px 0; font-size: 16px; line-height: 24px; text-align: justify;">{{$tekstovi[$i]}}</p>
													@ENDIF
													@IF($linkovi[$i] != "")
													<p style="margin: 0; text-align: right;"><a href="{{$linkovi[$i]}}" style="font-size: 16px; background: #e20074; text-decoration: none; padding: 10px 25px; color: #ffffff; display: inline-block; mso-padding-alt: 0; text-underline-color: #ff3884"><span style="mso-text-raise: 10pt; font-weight: bold;">Saznajte više</span></a></p>
													@ENDIF
												</div>

												@ENDFOR
												
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>

			<?php $prvi = 0; ?>
			@ENDFOREACH
			
		</div>

		<div class="row">
			<div class="col-6 mt-3">
				<h3 class="my-3">Prikaz poslanih newslettera</h3>
			</div>

			<!-- Carousel Buttons -->
			<div class="col-6 mt-3 text-right">
				<a class="btn btn-dark mb-3 mr-1" href="#carouselIndicators" role="button" data-slide="prev">
					<i class="bi bi-arrow-left"></i>
				</a>
				<a class="btn btn-dark mb-3 " href="#carouselIndicators" role="button" data-slide="next">
					<i class="bi bi-arrow-right"></i>
				</a>
			</div>

			
			<div class="col-12">
				<div id="carouselIndicators" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						
						<?php $prvi = 1; $cnt = 0;?>	
						@FOREACH ($nizNewslettera as $token=>$jedanIzNiza)

						@IF($prvi == 1)
						<div class="carousel-item active">
							@ELSEIF($cnt % 2 == 0)
							<div class="carousel-item">
								@ENDIF
								@IF($cnt % 2 == 0)
								<div class="row m-1">
									@ENDIF
									<div class="one-column col-lg-6 my-3">
										<div class="card" id="{{$token}}">
											<div class="card-body" style="background-color: #e20074;">
												<!-- Creating an Outer Scaffold - Email Wrapper -->
												<table role="presentation" style="width: 100%; border: none; border-spacing: 0; background-color: #e5e5e5;">
													<tr>
														<td align="center" style="padding: 0;">
															<!-- Main Content Container -->
															<table role="presentation" style="width: 100%; max-width: 660px; border: none; border-spacing: 0; text-align: left; font-family: Helvetica, Arial, sans-serif; font-size: 16px; line-height: 22px;">
																<!-- Featured Story -->
																<tr>
																	<td style="padding: 35px 30px 20px 30px; background-color: #e5e5e5">
																		@IF($jedanIzNiza[0] != "")
																		<h2 style="font-size: 24px; font-weight: bold; margin: 0 0 20px 0;">{{$jedanIzNiza[0]}}</h2>
																		@ENDIF
																		@IF($jedanIzNiza[2] != "")
																		<p style="color: #000000;"><img src="http://wsat7782:82/tms/public/newsletter/{{$jedanIzNiza[2]}}" alt="" style="width: 100%; height: auto; border: none; color: #000000; font-size: 16px;"/></p>
																		@ENDIF
																		@IF($jedanIzNiza[1] != "")
																		<p style="margin: 0 0 12px 0; font-size: 16px; line-height: 24px; text-align: justify;">{{$jedanIzNiza[1]}}</p>
																		@ENDIF
																		@IF($jedanIzNiza[3] != "")
																		<p style="margin: 0; text-align: right;"><a href="{{$jedanIzNiza[3]}}" style="font-size: 16px; background: #e20074; text-decoration: none; padding: 10px 25px; color: #ffffff; display: inline-block; mso-padding-alt: 0; text-underline-color: #ff3884"><span style="mso-text-raise: 10pt; font-weight: bold;">Saznajte više</span></a></p>
																		@ENDIF
																	</td>
																</tr>
																<!-- Other Stories - Two Column Section -->
																<tr>
																	<td style="padding: 35px 30px 35px 30px; font-size: 0; text-align: left; background-color: #e5e5e5;">
																		
																		<?php 
																		$naslovi = array();
																		$tekstovi = array();
																		$slike = array();
																		$linkovi = array();
																		for($i = 4; $i < count($nizNewslettera[$token]); $i += 4) {
																			$naslovi[] = $jedanIzNiza[$i];
																		}
																		for($i = 5; $i < count($nizNewslettera[$token]); $i += 4) {
																			$tekstovi[] = $jedanIzNiza[$i];
																		}
																		for($i = 6; $i < count($nizNewslettera[$token]); $i += 4) {
																			$slike[] = $jedanIzNiza[$i];
																		}
																		for($i = 7; $i < count($nizNewslettera[$token]); $i += 4) {
																			$linkovi[] = $jedanIzNiza[$i];
																		}
																		?>

																		@FOR($i = 0; $i < count($naslovi); $i++)

																		<div class="col-news" style="display: inline-block; width: 100%; vertical-align: top; padding-bottom: 20px;">
																			@IF($naslovi[$i] != "")
																			<h3 style="margin: 0 0 25px 0; font-size: 16px; font-weight: bold; line-height: 24px;">{{$naslovi[$i]}}</h3>
																			@ENDIF
																			@IF($slike[$i] != "")
																			<p style="color: #000000;"><img src="http://wsat7782:82/tms/public/newsletter/{{$slike[$i]}}" alt="" style="width: 100%; height: auto; border: none; color: #000000; font-size: 16px;"/></p>
																			@ENDIF
																			@IF($tekstovi[$i] != "")
																			<p style="margin: 0 0 12px 0; font-size: 16px; line-height: 24px; text-align: justify;">{{$tekstovi[$i]}}</p>
																			@ENDIF
																			@IF($linkovi[$i] != "")
																			<p style="margin: 0; text-align: right;"><a href="{{$linkovi[$i]}}" style="font-size: 16px; background: #e20074; text-decoration: none; padding: 10px 25px; color: #ffffff; display: inline-block; mso-padding-alt: 0; text-underline-color: #ff3884"><span style="mso-text-raise: 10pt; font-weight: bold;">Saznajte više</span></a></p>
																			@ENDIF
																		</div>

																		@ENDFOR
																		
																	</td>
																</tr>
															</table>
														</td>
													</tr>
												</table>
											</div>
											<div class="card-footer text-muted">
												<i class="bi bi-calendar-check"></i> 
												<?php 
												$datumi = \DB::select("SELECT `datum` FROM `newsletter_arhiva` WHERE `id` = $token");
												$datum = [];
												foreach ($datumi as $jedanDatum) {
													$datum[] = $jedanDatum->datum;
												}
												?>
												<?php echo date('d.m.Y.', strtotime($datum[0]));?> 
												@IF($prvi)
												<span class="badge badge-secondary">Novo</span>
												@ENDIF
											</div>
										</div>
									</div>
									<?php $cnt++; ?>
									@IF($cnt % 2 == 0)
								</div>
								@ENDIF
								@IF($cnt % 2 == 0)
							</div>
							@ENDIF
							
							<?php $prvi = 0; ?>
							@ENDFOREACH

						</div>
					</div>
				</div>
			</div>     
		</div>

		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	</body>
	</html>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>