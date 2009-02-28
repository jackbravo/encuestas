<h1>Distribuidor List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Level</th>
      <th>City</th>
      <th>State</th>
      <th>Contact1</th>
      <th>Contact2</th>
      <th>Contact3</th>
      <th>Tally</th>
      <th>Performance</th>
      <th>M1 vp</th>
      <th>M1 ro</th>
      <th>M2 vp</th>
      <th>M2 ro</th>
      <th>M3 vp</th>
      <th>M3 ro</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($distribuidor_list as $distribuidor): ?>
    <tr>
      <td><a href="<?php echo url_for('distribuidor_show', $distribuidor) ?>"><?php echo $distribuidor->getid() ?></a></td>
      <td><?php echo $distribuidor->getname() ?></td>
      <td><?php echo $distribuidor->getlevel() ?></td>
      <td><?php echo $distribuidor->getcity() ?></td>
      <td><?php echo $distribuidor->getstate() ?></td>
      <td><?php echo $distribuidor->getcontact1() ?></td>
      <td><?php echo $distribuidor->getcontact2() ?></td>
      <td><?php echo $distribuidor->getcontact3() ?></td>
      <td><?php echo $distribuidor->gettally() ?></td>
      <td><?php echo $distribuidor->getperformance() ?></td>
      <td><?php echo $distribuidor->getm1_vp() ?></td>
      <td><?php echo $distribuidor->getm1_ro() ?></td>
      <td><?php echo $distribuidor->getm2_vp() ?></td>
      <td><?php echo $distribuidor->getm2_ro() ?></td>
      <td><?php echo $distribuidor->getm3_vp() ?></td>
      <td><?php echo $distribuidor->getm3_ro() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('distribuidor_new') ?>">New</a>
