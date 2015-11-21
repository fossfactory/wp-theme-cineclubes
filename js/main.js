//Boostrap ToolTip
$(function () {
  $('[data-toggle="tooltip"]').tooltip();
})


//Campos Especiais Form
webshims.setOptions('forms-ext', {types: 'date'});
webshims.polyfill('forms forms-ext');

//Forms PostTypes Cineclubes
$(function () {
    
    //Show Filme
    $('.js-mostra-mais').on('click', function(e){
        e.preventDefault();
        for(var i = 1;  i <= 16 ; i++){
            var classe = 'js-filme'+i;
            if( $( this ).hasClass(classe) ){
                $('div.'+classe).show();
            }
        };
    });

    //Hide Filme
    $('.js-mostra-menos').on('click', function(e){
        e.preventDefault();
        for(var i = 1;  i <= 16 ; i++){
            var classe = 'js-filme'+i;
            if( $( this ).hasClass(classe) ){
                $('div.'+classe).hide();
            }
        };
    });


    //Show Debatedor
    $('.js-mostra-mais').on('click', function(e){
        e.preventDefault();
        for(var i = 1;  i <= 5 ; i++){
            var classe = 'js-debatedor'+i;
            if( $( this ).hasClass(classe) ){
                $('div.'+classe).show();
            }
        };
    });

    //Hide Debatedor
    $('.js-mostra-menos').on('click', function(e){
        e.preventDefault();
        for(var i = 1;  i <= 5 ; i++){
            var classe = 'js-debatedor'+i;
            if( $( this ).hasClass(classe) ){
                $('div.'+classe).hide();
            }
        };
    });
    
    //Sessao Dentro do CINECLUBE
    $('.sessao_local').on('click', function(){
        var logradouro = $('.js-logradouro').val();
        var numero = $('.js-numero').val();
        var complemento = $('.js-complemento').val();
        var bairro = $('.js-bairro').val();
        var cidade = $('.js-cidade').val();
        var estado = $('.js-estado').val();
        var cep = $('.js-cep').val();


        var sessao = $(this).val();
        if(sessao == "nao"){
            $('.logradouro').val(" ");
            $('.logradouro').attr('disabled', false);
            $('.numero').val(" ");
            $('.numero').attr('disabled', false);
            $('.complemento').val(" ");
            $('.complemento').attr('disabled', false);
            $('.bairro').val(" ");
            $('.bairro').attr('disabled', false);
            $('.cidade').val(" ");
            $('.cidade').attr('disabled', false);
            $('.estado').val(" ");
            $('.estado').attr('disabled', false);
            $('.cep').val(" ");
            $('.cep').attr('disabled', false);
        }else{
            $('.logradouro').val(logradouro);
           // $('.logradouro').attr('disabled', true);
            $('.numero').val(numero);
            $('.numero').attr('disabled', true);
            $('.complemento').val(complemento);
            $('.complemento').attr('disabled', true);
            $('.bairro').val(bairro);
            $('.bairro').attr('disabled', true);
            $('.cidade').val(cidade);
            $('.cidade').attr('disabled', true);
            $('.estado').val(estado);
            $('.estado').attr('disabled', true);
            $('.cep').val(cep);
            $('.cep').attr('disabled', true);
        }
    });

     //Sessao Dentro do CINECLUBE
    $('.havera_debate').on('click', function(){
        var debate = $(this).val();
        if(debate  == "sim"){
            $('.debate-content').show();
        }else{
            $('.debate-content').hide();
        }
    });

    //pegar value Nome, Id Sessao, Form relatorio
    $('select.js-title-sessao').on('change', function(){
        var id = $('select.js-title-sessao option:selected').attr('rel');
        var data = $('select.js-title-sessao option:selected').attr('date');
         $('.js-sessao-id').val( id );   
         $('.js-sessao-data').val( data  );      
    });

    //Validando Sessao Realizada??
    $('.js-sessaorealizada').on('change', function(){
        var resultado = $(this).val();
        if( resultado == "realizada"){
            $('.js-sessao-cancelada').hide(100);
            $('.js-sessao-realizada').show(100);
        }else{
            $('.js-sessao-realizada').hide(100);
            $('.js-sessao-cancelada').show(100);
        };
    });

    //LightBox Galeria
    // delegate calls to data-toggle="lightbox"
    $(document).delegate('*[data-toggle="lightbox"]:not([data-gallery="navigateTo"])', 'click', function(event) {
        event.preventDefault();
        return $(this).ekkoLightbox({
            onShown: function() {
                if (window.console) {
                    //return console.log('Checking our the events huh?');
                }
            },
            onNavigate: function(direction, itemIndex) {
                if (window.console) {
                    //return console.log('Navigating '+direction+'. Current item: '+itemIndex);
                }
            }
        });
    });

    // navigateTo
    // delegate calls to data-toggle="lightbox"
    $(document).delegate('*[data-gallery="navigateTo"]', 'click', function(event) {
        event.preventDefault();

        var lb;
        return $(this).ekkoLightbox({
            onShown: function() {

                lb = this;

                $(lb.modal_content).on('click', '.modal-footer a', function(e) {

                    e.preventDefault();
                    lb.navigateTo(2);

                });

            }
        });
    });



});








//AJAXs
$(function () {

    //AJAX CINECLUBE
    $('#form_cineclube').submit(function( ){

        var url_theme = theme.url;

        $('.loading').append("<img src='"+ url_theme +"/images/loading.gif'/>" );
       
        var postData =  $(this).serialize();
        var url_upload = theme.upload;
        url_form = url_theme + '/includes/actions/forms_frontend.php';


        
        var image_upload = $('.thumb-cineclube').val();
        if(image_upload.length > 0){
            image_upload = image_upload.split(',');
        }

        // setup the ajax request
        $.ajax({
            url: url_form,
            type: "POST",
            action: 'form_cineclube',
            enctype: 'multipart/form-data',
            data: postData,
            success: function( response ) { 
                $('.loading').empty();
                
                $('.message-success').show(200);
    
                setTimeout(function(){
                  $('.message-success').fadeOut('fast');
                }, 4000);
                
                if(image_upload.length > 0){
                    
                    var image = url_upload + '/cineclube/' + image_upload[0];
                    
                    if ($('div').hasClass('img-existe')) {

                        $('.img-existe img').attr('src', image ); 

                    }else{

                        var image_view = "<div class='img-existe'><img src='" + image  + "' ></div>";
                        $('.thumb_view').html( image_view );
                    }
                    
                }

                $("#msgBox").html(" ");
                $('.thumb-cineclube').val(" ");

            },  
            error: function(jqXHR, textStatus, errorThrown){                                        
                //console.log("The following error occured: " + textStatus, errorThrown);                                                       
            },
            
        });
        
        return false;
        
    });


    //AJAX SESSÃO
    $('#form_sessao').submit(function( ){
       
       var url_theme = theme.url;
       $('.loading').append("<img src='"+ url_theme +"/images/loading.gif'/>" );


        $('.logradouro').attr('disabled', false);
        $('.numero').attr('disabled', false);
        $('.complemento').attr('disabled', false);
        $('.bairro').attr('disabled', false);
        $('.cidade').attr('disabled', false);
        $('.estado').attr('disabled', false);
        $('.cep').attr('disabled', false);


        var postData =  $(this).serialize();
       
        var url_theme = theme.url;
        var url_upload = theme.upload;
        url_form = url_theme + '/includes/actions/forms_frontend.php';




        
        // setup the ajax request
        $.ajax({
            url: url_form,
            type: "POST",
            action: 'form_sessao',
            enctype: 'multipart/form-data',
            data: postData,
            success: function( response ) { 
                
                $('.message-success').show(200);
                $('.loading').empty();
    
                setTimeout(function(){
                  $('.message-success').fadeOut('fast');
                }, 4000);
                
                $("#msgBox").html(" ");
                $("#form_sessao").each(function(){
                   this.reset(); 
                });
                $('.preview-image').hide();
                $('.submit-hide').hide();
                

            },  
            error: function(jqXHR, textStatus, errorThrown){                                        
                //console.log("The following error occured: " + textStatus, errorThrown);                                                       
            },
            
        });
        
        return false;

    });

     //AJAX RELATORIOS
    $('#form_form_relatorio').submit(function( ){
        var url_theme = theme.url;
        $('.loading').append("<img src='"+ url_theme +"/images/loading.gif'/>" );
        
        var postData =  $(this).serialize();
       

        var url_upload = theme.upload;
        url_form = url_theme + '/includes/actions/forms_frontend.php';
        
        // setup the ajax request
        $.ajax({
            url: url_form,
            type: "POST",
            action: 'form_form_relatorio',
            enctype: 'multipart/form-data',
            data: postData,
            success: function( response ) { 
                
                $('.loading').empty();
                
                $('.message-success').show(200);
    
                setTimeout(function(){
                  $('.message-success').fadeOut('fast');
                }, 4000);
                
                $("#msgBox").html(" ");
                $("#form_form_relatorio").each(function(){
                   this.reset(); 
                });
                $('.preview-image').hide();

            },  
            error: function(jqXHR, textStatus, errorThrown){                                        
                //console.log("The following error occured: " + textStatus, errorThrown);                                                       
            },
            
        });
        
        return false;
        
    });


});


//AJAX FILES
$(function(){
    
    function escapeTags( str ) {
      return String( str )
               .replace( /&/g, '&amp;' )
               .replace( /"/g, '&quot;' )
               .replace( /'/g, '&#39;' )
               .replace( /</g, '&lt;' )
               .replace( />/g, '&gt;' );
    }

    $('.btn-upload').on('click', function(e){
        e.preventDefault();
        //Get Class Button Upload File
        var classNames = $(this).attr('class');
        classNames =  classNames.split(' ');
        var btn_class = "." + classNames[4];
        var btn_id = $(this).attr('id');
       
        //Funcao de Upload
        simple_upload( btn_id , btn_class );
    });

    function simple_upload( btn_id, btn_class ){
        
        var url_theme = theme.url;
        url_theme = theme.url +  '/includes/actions/file_upload.php';
        var url_upload = theme.upload;
        var images = ["jpg", "png", "gif"];

        var btn = btn_id,
            progressBar = document.getElementById('progressBar'),
            progressOuter = document.getElementById('progressOuter'),
            msgBox = document.getElementById('msgBox');

        var uploader = new ss.SimpleUpload({
            button: btn,
            url: url_theme,
            name: 'uploadfile',
            multipart: true,
            hoverClass: 'hover',
            focusClass: 'focus',
            responseType: 'json',
            startXHR: function() {
                progressOuter.style.display = 'block'; // make progress bar visible
                this.setProgressBar( progressBar );
            },
            onSubmit: function( filename, extension ) {
                msgBox.innerHTML = ''; // empty the message box
                btn.innerHTML = 'Uploading...'; // change button text to "Uploading..."
                
                var extension = extension;
                
            
                if($.inArray(extension, images) >= 0){
                    var type = "image/"+extension;
                    $('.thumb_type').val(type);
                }

                if($.inArray(extension == "pdf") >= 0){
                    var type = "application/pdf";
                    $('.thumb_type').val(type);
                }

                if(extension == "docx"){
                    var type = "application/vnd.openxmlformats-officedocument.wordprocessingml.document";
                    $('.thumb_type').val(type);
                }

                if(extension == "doc"){
                    var type = "application/msword";
                    $('.thumb_type').val(type);
                }

                if(extension == "txt"){
                    var type = "text/plain";
                    $('.thumb_type').val(type);
                }

                var info = filename + "," + type;
                $( btn_class ).val(info);

            },
            onComplete: function( filename, response, uploadBtn ) {
                btn.innerHTML = 'Choose Another File';
                progressOuter.style.display = 'none'; // hide progress bar when upload is completed

                if ( !response ) {
                    msgBox.innerHTML = 'Unable to upload file ' + response;
                    return;
                }

                if ( response.success === true ) {
                    msgBox.innerHTML = '<strong>' + escapeTags( filename ) + '</strong>';
                    
                    var url_image = url_upload + '/cineclube/' + filename;
                    $(btn_class).show(200);
                    
                    $(btn_class + ' img').attr('src', url_image );
                    
                    extension = filename.substr(filename.length - 3); 

                    if($.inArray(extension, images) >= 0){
                        $(btn_class + ' img').attr('src', url_image );
                    }else{
                        
                        url_image = url_upload + '/cineclube/documento.png';
                        $(btn_class + ' img').attr('src', url_image );
                    }
                    


                } else {
                    if ( response.msg )  {
                        msgBox.innerHTML = escapeTags( response.msg );

                    } else {
                        msgBox.innerHTML = 'An error occurred and the upload failed.';
                    }
                }
            },
            onError: function(jqXHR, textStatus, errorThrown) {
                progressOuter.style.display = 'none';
                msgBox.innerHTML = 'Unable to upload file' + textStatus;
            }
        });
    };//Function simple_upload();
});