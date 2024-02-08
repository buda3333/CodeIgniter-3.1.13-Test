<h2><?php echo $title; ?></h2>
<table class="table">
	<thead>
	<tr>
		<th>id</th>
		<th>ip_address</th>
		<th>visit_number</th>
		<th>Ответы</th>
		<th>Статус</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($results as $result): ?>
		<tr>
			<td><?php echo $result->id; ?></td>
			<td><?php echo $result->ip_address; ?></td>
			<td><?php echo $result->visit_number; ?></td>
			<td>
				<?php
				$answers = $result->answers;
				for ($i = 0; $i < count($answers); $i++) {
					echo 'Вопрос ' . ($i + 1) . ' = ' . $answers[$i] . '<br>';
				}
				?>
			</td>
			<td>
				<select class="status-select" data-result-id="<?php echo $result->id; ?>">
					<option value="Не обработано" <?php if ($result->status == "Не обработано") { echo "selected"; } ?>>Не обработано</option>
					<option value="Обработано" <?php if ($result->status == "Обработано") { echo "selected"; } ?>>Обработано</option>
					<option value="Отклонено" <?php if ($result->status == "Отклонено") { echo "selected"; } ?>>Отклонено</option>
				</select>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>
<script src="<?php echo base_url('public/js/update-status.js'); ?>"></script>

