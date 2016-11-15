<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test</title>
    <link rel="stylesheet" type="text/css" href="source/style.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <header>
        <div class="container">
            <div class="col-md-10">
                <h1 id='pageName'>Page name here!</h1>
            </div>
            <div class="col-md-2">
                <button class='btn btn-lg btn-primary' id='editPN'>Edit</button>
            </div>
        </div>
    </header>
    <div class="wrapper">
        <div class="container">
            <div class="col-md-10">
                <p id="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, quidem, unde. Expedita totam nemo, soluta, exercitationem recusandae dolores illo repudiandae, iure, quibusdam perferendis illum aliquam sed. Esse, necessitatibus nisi a.</p>
            </div>
            <div class="col-md-2">
                <button class='btn btn-lg btn-primary' id='editWP'>Edit</button>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 feedback">
                    <form id='sendForm'>
                        <h3>Feedback</h3>
                        <div class="form-group">
                            <label for="fbName">Name: </label>
                            <input type="text" class="form-control" id='fbName' placeholder="Enter your name" required> 
                        </div>
                        <div class="form-group">
                            <label for="fbEmail">E-mail:</label>
                            <input type="email" class="form-control" id='fbEmail' placeholder="Enter your email" required> 
                        </div>
                        <div class="form-group">
                            <label for="fbMessage">Message</label>
                            <textarea class="form-control" id="fbMessage" rows="3" placeholder="Enter your message here" required></textarea>
                        </div>      
                        <div class="form-group">
                            <input type="submit" class="btn btn-info" id='submitBtn' value="Send!">
                        </div>   
                    </form>         
                </div>
            </div>
        </div>
    </footer>
    <div id='blackSquare' class="ui-widget-content ui-corner-all ui-state-error">
    </div>
    <!-- JS -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src='https://code.jquery.com/ui/1.12.1/jquery-ui.min.js'></script>
    <script src='js/script.js'></script>
</body>
</html>