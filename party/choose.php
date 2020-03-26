<?php

include '../include/config.php';

  if ($_POST['type'] == 1)
  {

    //partie privé --- toutes les listes de mot sont disponible

    $subjects = $db->prepare('SELECT name,id_sub FROM SUBJECTS where active = 1');
    $subjects->execute();
    $names = $subjects->fetchAll(PDO::FETCH_ASSOC);
    echo "<select name='wordlist'>";
    foreach ($names as $name)
    {
      echo '<option id="' . $name["id_sub"].'"  selected="selected"   value ="'. $name["name"] .'" > ' . $name["name"] .  '</option>';
    }
    echo "</select>";

  }

  else
  {

    //partie Publique (normal et ranked)

    $subjects = $db->prepare('SELECT name,id_sub FROM SUBJECTS where active = 1 AND R18 = 0');
    $subjects->execute();
    $names = $subjects->fetchAll(PDO::FETCH_ASSOC);
    echo "<select name='wordlist'>";
    foreach ($names as $name)
    {
      echo '<option id="' . $name['id_sub'].'"  selected="selected"   value ="'. $name['name'] .'" > ' . $name['name'] .  '</option>';
    }
        echo "</select>";
  }
