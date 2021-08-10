<?php
if (isset($_POST['id']) && isset($_POST['pwd'])) {
   $ldap=ldap_connect('ldap://srvad.advt.lan') or die('Could not connect to LDAP server.');
   ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
   ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);
   ldap_set_option($ldap, LDAP_OPT_NETWORK_TIMEOUT, 10);
   $bind=ldap_bind($ldap, "administrateur@advt.lan", "P@ssw0rd") or die('Could not bind to AD.');

   $attributes = array('dn');
    $result = ldap_search($ldap, 'dc=advt,dc=lan',"(samaccountname=justin.ouompeba)", $attributes);
    print_r($result);
}
?>

<form action="" method="POST">
   <input type="text" name="id"><br>
   <input type="text" name="pwd"><br>
   <button type="submit">Envoie</button>
</form>