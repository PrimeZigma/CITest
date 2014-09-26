<?php /*foreach ($posts as $post): ?>
<div class="row-fluid marketing">
	<div class="span12">
		<h4><?php echo $this->Html->link($post['Post']['title'], '/view/'.$post['Post']['id']); ?></h4>
		<span class="label">by: <?php echo $post['User']['username']; ?> on: <?php echo $this->Time->format('d/m/Y H:i:s', $post['Post']['modified']); ?></span>
		<p class="post">
			<?php echo $post['Post']['body']; ?>
		</p>
	</div>
</div>
<hr>
<?php endforeach; ?>
<?php echo $this->Paginator->pager(array(
	'prev' => '← Older',
	'next' => 'Newer →'
)); */?>
<table>
	<tr>
		<thead>
			<th>Title</th>
			<th>Category</th>
			<th>Posted By</th>
		</thead>
		<tbody>
			<?php 
				foreach ($posts as $post) {
					echo "<tr>
							<td>".$post['Post']['title']."</td>
							<td>".$post['Category']['name']."</td>
							<td>".$post['User']['username']."</td>
						</tr>";
				}
			?>
		</tbody>
	</tr>
</table>