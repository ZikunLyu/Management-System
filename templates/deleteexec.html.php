<p><?=$totalExec?> Execs have been sumbitted to the CSSA EXEC Database.<p>

<?php foreach ($students as $student): ?>
<blockquote>
    <p>
        <?=htmlspecialchars($student['firstname_CSSA_EXEC'], ENT_QUOTES, 'UTF-8')?>

        <form action="deleteexec.php" method="POST">
            
            <input type="hidden" name="id" value="<?=$student['id_CSSA_EXEC']?>">
            <input type="submit" value="Delete">
        </form>
    </p>
</blockquote>
<?php endforeach;?>


