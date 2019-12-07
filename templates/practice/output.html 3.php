<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Script Output</title>
</head>
<body>
    <?php if (isset($error)): ?>
    <p>
        <?=$error?> /* it has the same function as <?php echo $error; ?>*/
    </p>
    <?php else: ?>
    <?php foreach ($studentids as $studentid): ?>
    <blockquote>
        <p>
        <?=htmlspecialchars($studentid, ENT_QUOTES,'UTF-8')?>
        /* it has the same function as <?php echo htmlspecialchars($studentid, ENT_QUOTES, 'UTF-8') ?> */
        </p>
    </blockquote>
    <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
