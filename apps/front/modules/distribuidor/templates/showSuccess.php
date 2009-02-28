<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $distribuidor->getid() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $distribuidor->getname() ?></td>
    </tr>
    <tr>
      <th>Level:</th>
      <td><?php echo $distribuidor->getlevel() ?></td>
    </tr>
    <tr>
      <th>City:</th>
      <td><?php echo $distribuidor->getcity() ?></td>
    </tr>
    <tr>
      <th>State:</th>
      <td><?php echo $distribuidor->getstate() ?></td>
    </tr>
    <tr>
      <th>Contact1:</th>
      <td><?php echo $distribuidor->getcontact1() ?></td>
    </tr>
    <tr>
      <th>Contact2:</th>
      <td><?php echo $distribuidor->getcontact2() ?></td>
    </tr>
    <tr>
      <th>Contact3:</th>
      <td><?php echo $distribuidor->getcontact3() ?></td>
    </tr>
    <tr>
      <th>Tally:</th>
      <td><?php echo $distribuidor->gettally() ?></td>
    </tr>
    <tr>
      <th>Performance:</th>
      <td><?php echo $distribuidor->getperformance() ?></td>
    </tr>
    <tr>
      <th>M1 vp:</th>
      <td><?php echo $distribuidor->getm1_vp() ?></td>
    </tr>
    <tr>
      <th>M1 ro:</th>
      <td><?php echo $distribuidor->getm1_ro() ?></td>
    </tr>
    <tr>
      <th>M2 vp:</th>
      <td><?php echo $distribuidor->getm2_vp() ?></td>
    </tr>
    <tr>
      <th>M2 ro:</th>
      <td><?php echo $distribuidor->getm2_ro() ?></td>
    </tr>
    <tr>
      <th>M3 vp:</th>
      <td><?php echo $distribuidor->getm3_vp() ?></td>
    </tr>
    <tr>
      <th>M3 ro:</th>
      <td><?php echo $distribuidor->getm3_ro() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('distribuidor_edit', $distribuidor) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('distribuidor') ?>">List</a>
