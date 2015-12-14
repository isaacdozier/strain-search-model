 <?php

 require('lib/Semantics3.php');

  $key = 'SEM3589E9DADF871493C83863579B429B060';
  $secret = 'YzY3YmVmODQzZjk0MGY3N2Q0M2U1N2QzYjUwOWI2NGI';
  $requestor = new Semantics3_Products($key,$secret);

  $requestor->products_field("search", $api_query_term);
      
  $requestor->products_field("offset", $offset);
  

  $results = $requestor->get_products();

  $json = json_decode($results);

  ?>