/**
 * Created by es.sitnikov on 07.07.2016.
 */
$(document).ready(function(){
    $(".carphoto_del").click(function(){
        if(confirm('Удалить это фото?')){
            id = $(this).attr('data-car_id');
            file = $(this).attr('data-file');
            //console.log(file);
            $.ajax({
                url: '/carsite/delphoto',
                data: {
                    'id': id,
                    'file': file
                },
                type: 'POST',
                success: function(html){
                    if(html == '1'){
                        document.location = document.location;
                    }
                    else {
                        alert("Ошибка при удалении файла.");
                        console.log("Ошибка при удалении файла:" + html);
                    }
                },
                error: function(html){
                    alert("Ошибка: " + html.responseText);
                    console.log(html);
                }
            });
        };
    });


    $("#upload_image").click(function(){
        /*id = $(this).attr('data-car_id');

        var fd = new Array();
        fd['id'] = id;
       // fd['file'] = $('#newphoto')[0].files[0];
        //fd.append('img', $('#newphoto')[0].files[0]);

        console.log(fd);
        console.log('---1---');

        $.ajax({
            url: '/carsite/addphoto',
            data: $("#imgform").serialize(),
            type: 'POST',
            success: function(html){
                if(html == '1'){
                    document.location = document.location;
                }
                else {
                    alert("Ошибка при удалении файла.");
                    console.log("Ошибка при удалении файла:" + html);
                }
            },
            error: function(html){
                alert("Ошибка: " + html.responseText);
                console.log(html);
            }
        });*/
    });
});