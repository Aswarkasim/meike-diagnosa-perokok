
<table border="1">
   <tr>
        <th>NO</th>
        <th>USERNAME</th>
        <th>PASSWORD</th>
        <th>AKSI</th>
   </tr>

   <?php foreach($dosen as $row){ ?>
   <tr>
        <td><?php echo $row->no ?></td>
        <td><?php echo $row->username ?></td>
        <td><?php echo $row->password ?></td>
        <td></td>
   </tr>
   <?php } ?>
</table>