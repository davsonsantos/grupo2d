<?php $this -> load -> view('site/layout/header'); ?>

<div class="itemdetails" id="itemdetails" style="display: block;">
	<div class="gridphoto">

		<!-- close button -->
		<a class="close" onclick="window.location.reload();" href="<?=SITE_RAIZ?>inicio/">×</a>

		<!-- pager -->
		<!-- <div class="itempaging">
			<div class="itempaginginner">
				<a class="next" href="ajax/gridphoto.php?item=2"><span class="iconfa-arrow-right"></span></a>
			</div>
		</div> -->

		<!-- image panel -->
		<div class="imageview">
			<div><img alt="" src="<?=SITE_RAIZ?>assets/upload/portifolio/<?=$detalhe[0]->por_img?>" id="" style="margin-top: 125px;">
			</div>
		</div>

		<!-- item details -->
		<div class="photodetails">
			<div class="photodetailsinner">
				<span class="categ"><?=$detalhe[0]->cat_projeto_descricao?></span>
				<h3><?=$detalhe[0]->por_nome?></h3>
				<p>
					<?=$detalhe[0]->por_descricao?>
				</p>

				<div class="projectdetails">
					<h4>Outros Detalhes</h4>
					<table>
						<tbody>
							 <tr>
								<td width="40%"><span class="iconfa-laptop"></span><strong>Publicado em:</strong></td>
								<td width="60%" style="text-align: right;"><?=formata_data($detalhe[0]->por_publicacao, 'br')?></td>
							</tr>
							<!--<tr>
								<td><span class="iconfa-thumbs-up"></span> &nbsp;<strong>Like</strong></td>
								<td style="text-align: right;">16</td>
							</tr>
							<tr>
								<td><span class="iconfa-download-alt"></span> &nbsp;<strong>Downloads</strong></td>
								<td style="text-align: right;">4,124</td>
							</tr>
							<tr>
								<td><span class="iconfa-eye-open"></span> &nbsp;<strong>Views</strong></td>
								<td style="text-align: right;">20,130</td>
							</tr> -->
							<?php if(!empty($detalhe[0]->por_link)){ ?>
							<tr>
								<td><span class="iconfa-link"></span> &nbsp;<strong>URL</strong></td>
								<td style="text-align: right;"><a href="<?=$detalhe[0]->por_link?>" target="_blank"><?=$detalhe[0]->por_link?></a></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div><!--projectdetails-->
			</div>
		</div>
	</div><!--gridphoto-->

</div>

<?php $this -> load -> view('site/layout/footer'); ?>