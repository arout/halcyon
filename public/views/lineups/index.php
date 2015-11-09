<fieldset>
	<legend>Generate Lineup</legend>
	<p>
		Use this tool to generate a unique lineup
	</p>
	<?php $id = uniqid();?>
	<form action="<?=BASEURL . "lineups/generate/$id"?>" method="post" accept-charset="utf-8">

	<div class="input-group">
		<div class="row">
			<h5 style="padding-top: 15px">Quarterbacks</h5>
			<div class="col-md-6"><input type="text" name="qb1" class="form-control" placeholder="QB 1"></div><div class="col-md-6"><input type="text" name="qb1_salary" class="form-control" placeholder="QB1 Salary"></div>
			<div class="col-md-6"><input type="text" name="qb2" class="form-control" placeholder="QB 2"></div><div class="col-md-6"><input type="text" name="qb2_salary" class="form-control" placeholder="QB2 Salary"></div>
			<div class="col-md-6"><input type="text" name="qb3" class="form-control" placeholder="QB 3"></div><div class="col-md-6"><input type="text" name="qb3_salary" class="form-control" placeholder="QB3 Salary"></div>
			<div class="col-md-6"><input type="text" name="qb4" class="form-control" placeholder="QB 4"></div><div class="col-md-6"><input type="text" name="qb4_salary" class="form-control" placeholder="QB4 Salary"></div>
			<div class="col-md-6"><input type="text" name="qb5" class="form-control" placeholder="QB 5"></div><div class="col-md-6"><input type="text" name="qb5_salary" class="form-control" placeholder="QB5 Salary"></div>
		</div>

		<div class="row">
			<h5 style="padding-top: 15px">Running Backs</h5>
			<div class="col-md-6"><input type="text" name="rb1" class="form-control" placeholder="RB 1"></div><div class="col-md-6"><input type="text" name="rb1_salary" class="form-control" placeholder="RB1 Salary"></div>
			<div class="col-md-6"><input type="text" name="rb2" class="form-control" placeholder="RB 2"></div><div class="col-md-6"><input type="text" name="rb2_salary" class="form-control" placeholder="RB2 Salary"></div>
			<div class="col-md-6"><input type="text" name="rb3" class="form-control" placeholder="RB 3"></div><div class="col-md-6"><input type="text" name="rb3_salary" class="form-control" placeholder="RB3 Salary"></div>
			<div class="col-md-6"><input type="text" name="rb4" class="form-control" placeholder="RB 4"></div><div class="col-md-6"><input type="text" name="rb4_salary" class="form-control" placeholder="RB4 Salary"></div>
			<div class="col-md-6"><input type="text" name="rb5" class="form-control" placeholder="RB 5"></div><div class="col-md-6"><input type="text" name="rb5_salary" class="form-control" placeholder="RB5 Salary"></div>
			<div class="col-md-6"><input type="text" name="rb6" class="form-control" placeholder="RB 6"></div><div class="col-md-6"><input type="text" name="rb6_salary" class="form-control" placeholder="RB6 Salary"></div>
			<div class="col-md-6"><input type="text" name="rb7" class="form-control" placeholder="RB 7"></div><div class="col-md-6"><input type="text" name="rb7_salary" class="form-control" placeholder="RB7 Salary"></div>
			<div class="col-md-6"><input type="text" name="rb8" class="form-control" placeholder="RB 8"></div><div class="col-md-6"><input type="text" name="rb8_salary" class="form-control" placeholder="RB8 Salary"></div>
		</div>

		<div class="row">
			<h5 style="padding-top: 15px">Wide Receivers</h5>
			<div class="col-md-6"><input type="text" name="wr1" class="form-control" placeholder="WR 1"></div><div class="col-md-6"><input type="text" name="wr1_salary" class="form-control" placeholder="WR1 Salary"></div>
			<div class="col-md-6"><input type="text" name="wr2" class="form-control" placeholder="WR 2"></div><div class="col-md-6"><input type="text" name="wr2_salary" class="form-control" placeholder="WR2 Salary"></div>
			<div class="col-md-6"><input type="text" name="wr3" class="form-control" placeholder="WR 3"></div><div class="col-md-6"><input type="text" name="wr3_salary" class="form-control" placeholder="WR3 Salary"></div>
			<div class="col-md-6"><input type="text" name="wr4" class="form-control" placeholder="WR 4"></div><div class="col-md-6"><input type="text" name="wr4_salary" class="form-control" placeholder="WR4 Salary"></div>
			<div class="col-md-6"><input type="text" name="wr5" class="form-control" placeholder="WR 5"></div><div class="col-md-6"><input type="text" name="wr5_salary" class="form-control" placeholder="WR5 Salary"></div>
			<div class="col-md-6"><input type="text" name="wr6" class="form-control" placeholder="WR 6"></div><div class="col-md-6"><input type="text" name="wr6_salary" class="form-control" placeholder="WR6 Salary"></div>
			<div class="col-md-6"><input type="text" name="wr7" class="form-control" placeholder="WR 7"></div><div class="col-md-6"><input type="text" name="wr7_salary" class="form-control" placeholder="WR7 Salary"></div>
			<div class="col-md-6"><input type="text" name="wr8" class="form-control" placeholder="WR 8"></div><div class="col-md-6"><input type="text" name="wr8_salary" class="form-control" placeholder="WR8 Salary"></div>
			<div class="col-md-6"><input type="text" name="wr9" class="form-control" placeholder="WR 9"></div><div class="col-md-6"><input type="text" name="wr9_salary" class="form-control" placeholder="WR9 Salary"></div>
			<div class="col-md-6"><input type="text" name="wr10" class="form-control" placeholder="WR 10"></div><div class="col-md-6"><input type="text" name="wr10_salary" class="form-control" placeholder="WR10 Salary"></div>

		</div>

		<div class="row">
			<h5 style="padding-top: 15px">Tight End</h5>
			<div class="col-md-6"><input type="text" name="te1" class="form-control" placeholder="TE 1"></div><div class="col-md-6"><input type="text" name="te1_salary" class="form-control" placeholder="TE1 Salary"></div>
			<div class="col-md-6"><input type="text" name="te2" class="form-control" placeholder="TE 2"></div><div class="col-md-6"><input type="text" name="te2_salary" class="form-control" placeholder="TE2 Salary"></div>
			<div class="col-md-6"><input type="text" name="te3" class="form-control" placeholder="TE 3"></div><div class="col-md-6"><input type="text" name="te3_salary" class="form-control" placeholder="TE3 Salary"></div>
			<div class="col-md-6"><input type="text" name="te4" class="form-control" placeholder="TE 4"></div><div class="col-md-6"><input type="text" name="te4_salary" class="form-control" placeholder="TE4 Salary"></div>
			<div class="col-md-6"><input type="text" name="te5" class="form-control" placeholder="TE 5"></div><div class="col-md-6"><input type="text" name="te5_salary" class="form-control" placeholder="TE5 Salary"></div>
			<div class="col-md-6"><input type="text" name="te6" class="form-control" placeholder="TE 6"></div><div class="col-md-6"><input type="text" name="te6_salary" class="form-control" placeholder="TE6 Salary"></div>
		</div>

		<div class="row">
			<h5 style="padding-top: 15px">Defense</h5>
			<div class="col-md-6"><input type="text" name="def1" class="form-control" placeholder="DEF 1"></div><div class="col-md-6"><input type="text" name="def1_salary" class="form-control" placeholder="DEF1 Salary"></div>
			<div class="col-md-6"><input type="text" name="def2" class="form-control" placeholder="DEF 2"></div><div class="col-md-6"><input type="text" name="def2_salary" class="form-control" placeholder="DEF2 Salary"></div>
			<div class="col-md-6"><input type="text" name="def3" class="form-control" placeholder="DEF 3"></div><div class="col-md-6"><input type="text" name="def3_salary" class="form-control" placeholder="DEF3 Salary"></div>
			<div class="col-md-6"><input type="text" name="def4" class="form-control" placeholder="DEF 4"></div><div class="col-md-6"><input type="text" name="def4_salary" class="form-control" placeholder="DEF4 Salary"></div>
			<div class="col-md-6"><input type="text" name="def5" class="form-control" placeholder="DEF 5"></div><div class="col-md-6"><input type="text" name="def5_salary" class="form-control" placeholder="DEF5 Salary"></div>
		</div>
	</div>
			<br><br>
			<button type="submit" class="btn btn-block btn-primary" data-loading-text="Loading...">
				<i class="fa fa-dollar"></i><i class="fa fa-money"></i><i class="fa fa-dollar"></i>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				Make It Rain!!
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<i class="fa fa-dollar"></i><i class="fa fa-money"></i><i class="fa fa-dollar"></i>
			</button>
			<input type="hidden" name="lineup_id" value="<?=$id;?>">
	</form>

</fieldset>

<?php foreach ($data['getplayers'] as $p): ?>

<?=$p['name'];?>

<?php endforeach;?>