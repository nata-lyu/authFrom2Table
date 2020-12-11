<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8">
  <title>Работа с БД</title>
  <link rel="stylesheet" href="style.css">
  <script type='text/javascript' src='VisibleScript.js'></script> 
  <script src="http://code.jquery.com/jquery-latest.js"></script>
 </head>
 <body>
    <h2>Перед вами данные таблицы MyAuth, загруженные с сервера</h2>
    <div id='myDiv' name='myDiv'>
    </div>

    <form>
        <input value="Добавить нового пользователя" type="button" onclick='Visible()' id="newUser" name="newUser">
    </form>

    <form name='addNewForm' id='addNewForm' method="POST">
        <fieldset name="userFields" id="userFields" style='display:none'>
          <legend>Введите данные нового пользователя</legend>
          <p><label for="name">Имя:  </label>
             <input type="text" id="name" name='name' autofocus required></p>
          <p><label for="tel">Телефон:</label>
             <input type="text" id="tel" name='tel' required></p>
          <p><label for="login">Логин:  </label>
             <input type="text" id="login" name='login' required></p>
          <p><label for="password">Пароль:</label>
             <input type="password" id="password" name='password' required></p>
          <p><input value="Записать данные нового пользователя в БД" type="button" id="addNewBtn" name="addNewBtn"></p>
        </fieldset>
    </form>

    <script>
        $(document).ready(function() {
           $('#myDiv').load('print.php');

           $('#addNewBtn').click(function () {  
            var name = $.trim($('#name').val());
            var tel = $.trim($('#tel').val());
            var login = $.trim($('#login').val());
            var pass = $.trim($('#password').val());

            $.ajax({  
                  type: "POST",  
                  url: "AddNewInDB.php",  
                  data: { name: name,
                          tel: tel,
                          login: login,
                          password: pass,
                  },          
                  success: function(data){  
                         $('#myDiv').empty();
                         $( "#myDiv" ).html(data);
                    }, 
                  error: function(req, text, error) {
                    alert('Ошибка AJAX: ' + text + ' | ' + error);
                    },
                });  
              return false;  
          });  
        });  
                
    </script>

    </body>
</html>