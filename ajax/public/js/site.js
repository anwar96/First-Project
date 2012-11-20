$(function() {
    $('#upload_file').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url      : "http://localhost/belajar/ajax/index.php/upload/upload_file",
            secureuri      :false,
            fileElementId  :'userfile',
            dataType : "json",
            data     : {
                'title'           : $('#title').val()
            },
            cache    : false,
            success  : function (data, status)
            {
                if(data.status != 'error')
                {
                    $('#files').html('<p>Reloading files...</p>');
                    refresh_files();
                    $('#title').val('');
                }
                alert(data.message);
            }
        });
        return false;
    });
});

function refresh_files()
{
    $.get('./upload/files/')
        .success(function (data){
            $('#files').html(data);
        });
}