<!DOCTYPE html>
<html lang="en">
<?php
include 'connection.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyber List</title>
    <link rel="stylesheet" type="text/css" href="./bootstrap-5.3.1-dist/css/bootstrap.css"> 
    <link rel="stylesheet" type="text/css" href="./design/base.css" >
    <link rel="icon" href="./image/david-chibi.png" type="image/x-icon">
</head>
<body>
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">Cyber List </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Archives</a>
                    </li class="nav-link">
    
                </ul>
        <div class="col-md-6 offset-md-3">
        <form class="form-inline">      
          
            <div class="input-group">
 
                <input type="text" class="form-control" placeholder="Search">
                <div class="input-group-append">
                    <button class="btn custom-btn" type="submit"><img class="search-btn" src="./image/icons/icons8-search-144.png">
                </button>
                     
                </div>
                    
            </div>
    
        </form>
        
    </div>
      
            </div>
            
        </div>  
    </nav>

    <div class="table-responsive">
        <table class="table table-bordered table-hover  table-responsive">
            <thead>
                <tr class="tr-title">
                    <th class="custom-table-head" scope="col">My Tasks</th>
                    <th class="custom-table-head" scope="col">Start Date</th>
                    <th class="custom-table-head" scope="col">Due Date</th>
                    <th class="custom-table-head" scope="col">Complete%</th>
                    <th class="custom-table-head" scope="col">Progress</th>
                    <th class="custom-table-head" scope="col">Notes</th>

                </tr>
            </thead>
            <tbody>
                <tr>
          <?php
          include'gettodolist.php';
          ?>
                </tr>
               
            </tbody>
            <tfoot>
                <td>
</td>
                <td>    
                </td>
                <td>   
                </td>
                <td>
                </td>
                <td>
                </td>
                <td>
                </td>
            </tfoot>
        </table>
  <div class ="container-chat mt-2">
    <div class="col-md-8 offset-md-2">
        <div class = "card">
            <div class = " card-body chat box" id ="chatBox"> 
                <span class = "span-title">Open AI</span>
                  <button class ="btn btn-prompt-action"><img class="send-icon"src="./image/icons/icons8-add-96.png" alt=""></button>
                  <button class ="btn btn-prompt-action"><img class="send-icon"src="./image/icons/icons8-edit-144.png" alt=""></button> 
                   <button class ="btn btn-prompt-action"><img class="send-icon"src="./image/icons/icons8-delete-144.png" alt=""></button> 
                     <button class ="btn btn-prompt-action"><img class="send-icon"src="./image/icons/icons8-archive-100.png" alt=""></button>   
                     <button class ="btn btn-prompt-action"><img class="send-icon"src="./image/icons/icons8-calendar-100.png" alt=""></button> 
                       
            </div>    
            <div class = "card-footer">         
                <button class ="btn custom-send-btn"><img class="send-icon"src="./image/icons/icons8-send-96.png" alt=""></button> 
<textarea  class = "form-control" placeholder="" id="messageInput"> </textarea>

        </div>
</div>
    </div>

</div>

  </div>

    </div>
    <script src="./bootstrap-5.3.1-dist/js/bootstrap.js">

    </script>
</body>

</html>