<html>
    <head>
        <script language="javascript" src="<?= base_url()?>public/js/jquery-1.3.2.min.js"></script>
        <script language="javascript" src="<?= base_url()?>public/js/ajax_post.js"></script>
        <title>Demo Page</title>
        <style type="text/css">
            body {background-color: #fff;margin: 40px;font-family: Lucida Grande, Verdana, Sans-serif;font-size: 14px;color: #4F5155;}
            a {color: #003399;background-color: transparent;font-weight: normal;}
            h1 {color: #444;background-color: transparent;border-bottom: 1px solid #D0D0D0;font-size: 16px;font-weight: bold;margin: 24px 0 2px 0;padding: 5px 0 6px 0;}
            code {font-family: Monaco, Verdana, Sans-serif;font-size: 12px;background-color: #f9f9f9;border: 1px solid #D0D0D0;color: #002166;display: block;margin: 14px 0 14px 0;padding: 12px 10px 12px 10px;}
            #box {text-align: right;width: 500px}
            #form_message{display:none;text-align:center;margin-bottom:5px;padding:10px;}
        </style>
    </head>
    <body>
        <h1>Tes ajax demo</h1>
        <p>Username : myusername | Password : mypassword</p>
        <div id="box">
            <div id="form_message"></div>
            <form name="ajax_form" id="ajax_form" method="post">
                username : * <input type="text" name="username" id="username" size="30"/><br/><br/>
                password : * <input type="password" name="password" id="password" size="30"/><br/><br/>
                <input type="submit" value="Login" name="login_submit" id="login_submit"/>
            </form>
        </div>
    </body>
</html>