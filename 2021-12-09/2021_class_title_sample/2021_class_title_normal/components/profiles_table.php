<?php

function userInfo($id,$name,$password,$email,$tel) {
  echo "
    <table class=\"user-info\" cellpadding=\"5\">
      <tr>
        <td>ID</td>
        <td>:</td>
        <td>{$id}</td>
      </tr>
      <tr>
        <td>Name</td>
        <td>:</td>
        <td>{$name}</td>
      </tr>
      <tr>
        <td>Password</td>
        <td>:</td>
        <td>{$password}</td>
      </tr>
      <tr>
        <td>Email</td>
        <td>:</td>
        <td>{$email}</td>
      </tr>
      <tr>
        <td>Tel</td>
        <td>:</td>
        <td>{$tel}</td>
      </tr>
    </table>";
}

?>