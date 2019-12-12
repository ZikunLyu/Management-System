<?php foreach($firstnames as $firstname): ?>
<blockquote>
  <p>
  <?=htmlspecialchars($firstname, ENT_QUOTES, 'UTF-8')?>
  </p>
</blockquote>
<?php endforeach; ?>
