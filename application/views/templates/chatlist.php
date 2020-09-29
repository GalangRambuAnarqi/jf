<table>
<?php
foreach($chat as $res){
   ?>
<tr>
<td><?=$res->role=='user'? 'you' : "admin"?> : <?=$res->isi?></td>
</tr>

<?php
}
?>
</table>