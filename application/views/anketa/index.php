<h2><?php echo $title; ?></h2>

<form class="form" action="<?php echo base_url('anketa/submit'); ?>" method="post">
	<div class="form-group">
		<label for="answer1">Вопрос 1:</label>
		<input type="text" name="answers[]" id="answer1" required>
	</div>

	<div class="form-group">
		<label for="answer2">Вопрос 2:</label>
		<input type="text" name="answers[]" id="answer2" required>
	</div>

	<div class="form-group">
		<label for="answer3">Вопрос 3:</label>
		<input type="text" name="answers[]" id="answer3" required>
	</div>

	<div class="form-group">
		<label for="answer4">Вопрос 4:</label>
		<input type="text" name="answers[]" id="answer4" required>
	</div>

	<div class="form-group">
		<label for="answer5">Вопрос 5:</label>
		<input type="text" name="answers[]" id="answer5" required>
	</div>

	<button type="submit" class="btn">Отправить</button>
</form>





<table class="table">
	<thead>
	<tr>
		<th>Ответы</th>
		<th>Статус</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($results as $result): ?>
		<tr>
			<td>
				<?php
				$answers = $result->answers;
				for ($i = 0; $i < count($answers); $i++) {
					echo 'Вопрос ' . ($i + 1) . ' = ' . $answers[$i] . '<br>';
				}
				?>
			</td>
			<td><?php echo $result->status; ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>

