<? $this->displayView('components/header.php'); ?>
			<form action="<? echo $this->getConfiguration('baseUrl'); ?>" method="get">
				<table class="content">
					<thead class="head">
						<tr>
							<th class="field" colspan="2">
								<? echo $this->localize('Coaching Test'); ?>

							</td>
						</tr>
					</thead>
					<tbody class="body">
						<tr class="even">
							<td class="field">
								<? echo $this->localize('Key'); ?>

							</td>
							<td>
								<input type="text" name="CoachingKey" value="zieldefinition"/>
							</td>
						</tr>
					</tbody>
					<tfoot class="foot">
						<tr>
							<td class="field" colspan="2">
								<input class="submit" type="submit" name="" value="<? echo $this->localize('Submit'); ?>"/>
							</td>
						</tr>
					</tfoot>
				</table>
			</form>
<? $this->displayView('components/footer.php'); ?>