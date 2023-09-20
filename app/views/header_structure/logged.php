<style>
    select {
      color: black;
      padding: 10px;
      font-size: 16px;
      border: 2px solid #007BFF;
      border-radius: 8px;
      background-color:var(--main-color);
    }

    select:hover {
      background-color:  var(--main-color);
    }

    select:focus {
      outline: none;
      box-shadow: 0 0 5px darkgreen;
    }

    option{
        color: black;
    }

    .user{
      color: black;
      padding: 3px;
      text-decoration: None;
      position: relative;
      border: solid black 1px;
      border-radius: 5px;
      background-color: violet;
      margin: 10px;
      
    }
</style>

<a href= "<?php echo PUBLIC_HTML ?>index.php/account" class="user">Account</a>
<a href= "<?php echo PUBLIC_HTML ?>index.php/logout" class="user">Logout</a>
