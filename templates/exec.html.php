<p><?=$totalExec?> Execs have been sumbitted to the CSSA EXEC Database.<p>

<?php foreach ($execs as $exec):?>
<blockquote>
    <p>
<?= htmlspecialchars($exec['firstname_CSSA_EXEC'], ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($exec['lastname_CSSA_EXEC'], ENT_QUOTES, 'UTF-8')?>

(<a href="mailto:<?php
         echo htmlspecialchars($exec['email_CSSA_EXEC'], ENT_QUOTES,'utf-8')?>">Email</a>)
        <a href="editexec.php?id=<?=$exec['id_CSSA_EXEC']?>">Edit</a>
        <form action="deleteexec.php" method="POST">
            <input type="hidden" name="id" value="<?=$exec['id_CSSA_EXEC']?>">
            <input type="submit" value="Delete">
        </form>
    </p>
</blockquote>
<?php endforeach;?>


